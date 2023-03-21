@extends('layouts.app')
@section('title','Dashboard')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Fact Search</a></li>
         <li class="breadcrumb-item active">List</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Fact Sheet Search</h2>
         </div>
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <table class="table table-striped">
                     <thead>
                        <td>#</td>
                        <td>Customer</td>
                        <td>Agent</td>
                        <td>Location</td>
                        <td>Experience</td>
                        <td>Project Type</td>
                        <td>Amount</td>
                        <td>Ownership</td>
                     </thead>
                     <tbody>
                        @foreach ($searches as $count=>$search)
                        <tr>
                           <td>{!! $count+1 !!}</td>
                           <td>
                              <p>
                                 {!! $search->names !!}<br>
                                 {!! $search->email !!}<br>
                                 {!! $search->phone_number !!}
                              </p>
                           </td>
                           <td>{!! $search->name !!}</td>
                           <td>
                              <p>
                                 {!! $search->country !!}<br>
                                 {!! $search->location !!}
                              </p>
                           </td>
                           <td><p>{!! $search->property_experience !!}</p></td>
                           <td>{!! $search->project_type !!}</td>
                           <td>
                              <p>
                                 <b>Max deposit</b> £{!! $search->max_deposit !!}<br>
                                 <b>Max property price</b> £{!! $search->max_property_price !!}
                              </p>
                           </td>
                           <td>{!! $search->owner !!}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection
