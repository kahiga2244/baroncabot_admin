@extends('layouts.app')
@section('title','Deals')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item active">Deals</li>
      </ol>
   </nav>
   <div class="row gx-6 gy-3 mb-4 align-items-center">
      <div class="col-auto">
        <h2 class="mb-0">Deals<span class="fw-normal text-700 ms-3">({!! $deals->count() !!})</span></h2>
      </div>
      <div class="col-auto"><a class="btn btn-primary px-5" href="#" data-bs-toggle="modal" data-bs-target="#chooseUnit"><i class="far fa-plus-circle me-2"></i>Add new Deal</a></div>
   </div>
   <div class="row">
      @foreach ($deals as $deal)
         <div class="col-md-3">
            <div class="card" style="max-width:20rem;">
               <img class="card-img-top" src="{!! asset('deals/'.$deal->cover_image) !!}" alt="{!! $deal->title !!}">
               <div class="card-body">
               <h5 class="card-title">{!! $deal->title !!}</h5>
               <p class="card-text">{!! date('F jS, Y', strtotime($deal->start_date)) !!} - {!! date('F jS, Y', strtotime($deal->end_date)) !!} </p>
               <a class="btn btn-primary" href="{!! route('property.deals.view',$deal->deal_code) !!}">View</a>
               </div>
            </div>
         </div>
      @endforeach
   </div>

   <!-- Modal -->
   <div class="modal fade" id="chooseUnit" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Create Deal</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{!! route('property.deals.store') !!}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group mb-2">
                     <label for="">Deal title</label>
                     {!! Form::text('title',null,['class'=>'form-control','required'=>'']) !!}
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Deal Cover</label>
                     <input type="file" class="form-control" name="cover">
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label for="">Start Date</label>
                           {!! Form::date('start_date',null,['class'=>'form-control','required'=>'']) !!}
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">End date</label>
                           {!! Form::date('end_date',null,['class'=>'form-control','required'=>'']) !!}
                        </div>
                     </div>
                  </div>
                  
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
