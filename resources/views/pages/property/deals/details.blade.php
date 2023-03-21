@extends('layouts.app')
@section('title'){!! $deal->title !!} | Deals @endsection
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item">Deals</li>
         <li class="breadcrumb-item active">{!! $deal->title !!}</li>
      </ol>
   </nav>
   <div class="row gx-6 gy-3 mb-4 align-items-center">
      <div class="col-auto">
        <h2 class="mb-0">{!! $deal->title !!}</h2>
        <p class="text-700 lead mb-2 mt-3"><i class="fal fa-calendar-check"></i> {!! date('F jS, Y', strtotime($deal->start_date)) !!} <i class="fal fa-horizontal-rule"></i> <i class="fal fa-calendar-times"></i> {!! date('F jS, Y', strtotime($deal->end_date)) !!} </p>
      </div>
   </div>
   @include('partials._messages')
   <div class="row">
      @foreach ($projects as $project)
         <div class="col-md-3 mb-3">
            <div class="card" style="max-width:20rem;">
               @php
                  $cover = Property::unit_image($project->unit_code)->getData();
               @endphp
               @if($cover->check > 0)
                  <img class="card-img-top" src="{!! asset('property/'.$project->parentCode.'/media/'.$cover->cover->file_name) !!}" alt="{!! $deal->title !!}"/>
               @else
                  @php
                     $parent = Property::property_info($project->project_code)->getData();
                  @endphp
                  @if($parent->property->image)
                     <img class="card-img-top" src="{!! asset('property/'.$parent->property->property_code.'/'.$parent->property->image) !!}" alt="{!! $deal->title !!}"/>
                  @else
                     <img class="card-img-top" src="#" alt="{!! $deal->title !!}">
                  @endif
               @endif
               <div class="card-body">
                  <h5 class="card-title">
                     <b>Unit :</b> <a href="{!! route('property.edit',$project->property_code) !!}" class="" target="_blank">{!! $project->title !!}</a> <br><br>
                     <b>Price :</b> £{!! number_format($project->price) !!}<br><br>
                     <b>Size :</b> {!! number_format($project->size) !!} sf<br><br>
                     @php
                        $parent = Property::property_info($project->project_code)->getData();
                     @endphp
                     <b>Project :</b> {!! $parent->property->title !!}<br><br>
                  </h5>
                  <center><a href="{!! route('property.deals.remove',[$project->unit_code,$deal->deal_code]) !!}" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i>  Remove </a></center>
               </div>
            </div>
         </div>
      @endforeach
   </div>
@endsection
