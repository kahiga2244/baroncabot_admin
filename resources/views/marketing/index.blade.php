@extends('layouts.app')
@section('title','Marketing')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Marketing</a></li>
         <li class="breadcrumb-item active">Campaigns</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Marketing Campaigns</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <table class="table table-striped table-bordered">
                     <thead>
                        <th width="1%">#</th>
                        <th>Title</th>
                        <th>Sent out</th>
                        <th>Deliverd</th>
                        <th>Sent Date</th>
                     </thead>
                     <tbody>
                        <tr>

                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
