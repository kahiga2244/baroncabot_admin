@extends('layouts.app')
@section('title','Marketing unit')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Marketing</a></li>
         <li class="breadcrumb-item">Campaigns</li>
         <li class="breadcrumb-item active">UNit</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="container">
         <div class="row">
            <div class="col-md-7 offset-md-2">
               <div class="card">
                  <div class="card-header"><h2 class="mb-0">Unit Marketing Campaigns</h2></div>
                  <div class="card-body">
                     <div class="form-group">
                        <label for="">Choose Receipient</label>
                        <select name="" class="form-control">
                           <option value="">Send to all agents</option>
                           <option value="">Send to specific agents</option>
                           <option value="">Enter emails</option>
                        </select>
                     </div>

                     <iframe src="{!! route('marketing.iframe',$unitCode) !!}" frameborder="0" class="mt-4" style="width:100%;height:700px">

                     </iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
