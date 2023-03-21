@extends('layouts.app')
@section('title','Files')
@section('content')
<nav class="mb-2" aria-label="breadcrumb">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Property</a></li>
      <li class="breadcrumb-item">{!! $property->title !!}</li>
      <li class="breadcrumb-item active">Edit</li>
   </ol>
</nav>
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Property Files</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')
         <div class="row">
            <div class="col-md-4">
               <h3 class="mb-5">Files</h3>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-2">
               <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addFile">Upload Files</a>
            </div>
         </div>
         <div class="row mb-3">
            @foreach ($files as $file)
               <div class="col-md-4 mb-3">
                  <div class="card" style="max-width:20rem;">
                     @if(stripos($file->file_mime, 'image') !== FALSE)
                        <img class="card-img-top" src="{!! asset('property/'.$property->property_code.'/media/'.$file->file_name) !!}" alt="{!! $file->title !!}" style="width:287px;height:215px;">
                     @elseif(stripos($file->file_mime, 'pdf') !== FALSE)
                        <center><i class="far fa-file-pdf fa-5x" style="width:287px;height:215px;"></i></center>
                     @elseif(stripos($file->file_mime, 'octet-stream') !== FALSE)
                        <center><i class="far fa-file-alt fa-5x" style="width:287px;height:215px;"></i></center>
                     @elseif(stripos($file->file_mime, 'officedocument') !== FALSE)
                        <center><i class="far fa-file-word fa-5x" style="width:287px;height:215px;"></i></center>
                     @else
                        <center><i class="far fa-file fa-5x" style="width:287px;height:215px;"></i></center>
                     @endif
                     <div class="card-body">
                        <h5 class="card-title">{!! $file->title !!} - ({!! $file->type !!})</h5>
                        <a class="badge badge-phoenix badge-phoenix-danger" href="{!! route('property.files.delete',$file->file_code) !!}">Delete</a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="addFile" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Upload Files</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{!! route('property.files.upload') !!}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group mb-2">
                     <label for="">File name</label>
                     {!! Form::text('title',null,['class'=>'form-control']) !!}
                     <input type="hidden" name="property_code" value="{!! $propertyCode !!}" required>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">File Type</label>
                     {!! Form::select('type',[''=>'Choose file type','Brochure'=>'Brochure','Floor Plans' => 'Floor Plans','Reservation Form' => 'Reservation Form','Photos'=>'Photos','Construction Updates' => 'Construction Updates','Due Diligence' => 'Due Diligence','Show Room' => 'Show Room','Cashflows' => 'Cashflows','Documents' => 'Documents'],null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                     <label for="customFile">File name</label>
                     <input class="form-control" name="files[]" id="customFile" type="file" multiple required/>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Link to unit</label>
                     <select name="unit[]" class="form-control" multiple>
                        @foreach ($units as $unit)
                           <option value="{!! $unit->property_code !!}">{!! $unit->title !!} | {!! $unit->bedrooms !!} bedrooms | {!! number_format($unit->size) !!} sf</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Upload files</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
