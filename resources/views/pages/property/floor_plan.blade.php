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
            <h2 class="mb-0">Property Floor Plans</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')
         <div class="row">
            <div class="col-md-4">
               <h3 class="mb-5">Floor Plans</h3>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
               <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addFile">Upload Floor Plan</a>
            </div>
         </div>
         <div class="row">
            @foreach ($files as $file)
               <div class="col-md-4 mb-4">
                  <div class="card" style="max-width:20rem;">
                     <img class="card-img-top" src="{!! asset('property/'.$property->property_code.'/media/'.$file->file_name) !!}" alt="{!! $file->title !!}" style="width:287px;height:215px;">
                     <div class="card-body">
                        <h5 class="card-title">{!! $file->title !!}</h5>
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
               <h5 class="modal-title" id="exampleModalLabel">Upload floor plan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{!! route('property.floor.plan.upload') !!}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group mb-2">
                     <label for="">Floor</label>
                     {!! Form::text('title',null,['class'=>'form-control']) !!}
                     <input type="hidden" name="property_code" value="{!! $propertyCode !!}" required>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Link to unit</label>
                     <select name="unit[]" class="form-control" multiple>
                        @foreach ($units as $unit)
                           <option value="{!! $unit->property_code !!}">{!! $unit->title !!} | {!! $unit->bedrooms !!} bedrooms | {!! number_format($unit->size) !!} sf</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="customFile">Upload Floor Plan</label>
                     <input class="form-control" name="files[]" id="customFile" type="file" multiple required/>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Upload Floor Plan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
