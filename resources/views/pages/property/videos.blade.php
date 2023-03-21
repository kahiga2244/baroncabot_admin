@extends('layouts.app')
@section('title','Video')
@section('content')
<nav class="mb-2" aria-label="breadcrumb">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Property</a></li>
      <li class="breadcrumb-item">{!! $property->title !!}</li>
      <li class="breadcrumb-item active">Property Video</li>
   </ol>
</nav>
@include('partials._messages')
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Property Video</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')
         <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
               <a href="#" data-bs-toggle="modal" data-bs-target="#addVideo" class="btn btn-sm btn-primary">Add Video</a>
            </div>
         </div>
         <div class="row mt-3">
            @foreach ($files as $file)
               <div class="col-md-4 mb-3">
                  <div class="card" style="max-width:20rem;">
                     {!! $file->file_name !!}
                     <div class="card-body">
                     <h5 class="card-title">{!! $file->title !!}</h5>
                        <a href="{!! route('property.video.delete',$file->file_code) !!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="addVideo" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{!! route('property.video.add') !!}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group mb-2">
                     <label for="">Video name</label>
                     {!! Form::text('title',null,['class'=>'form-control']) !!}
                     <input type="hidden" name="property_code" value="{!! $propertyCode !!}" required>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Video Embade Code</label>
                     {!! Form::textarea('video_link',null,['class'=>'form-control','size' => '3 x 3','required'=>'']) !!}
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-bs-label="Close">Close</button>
                  <button type="submit" class="btn btn-success">Add video</button>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
