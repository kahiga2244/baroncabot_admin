@extends('layouts.app')
@section('title'){!! $account->name !!} | Account @endsection
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#!">Accounts</a></li>
      <li class="breadcrumb-item"><a href="#!">Details</a></li>
      <li class="breadcrumb-item active">{!! $account->name !!}</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="row align-items-center justify-content-between g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">{!! $account->name !!} Account Details</h2>
         </div>
         <div class="col-auto">
            <div class="row g-3">
               <div class="col-auto"><button class="btn btn-phoenix-danger"><span class="fa-solid fa-trash-can me-2"></span>Delete Account</button></div>
               {{-- <div class="col-auto"><button class="btn btn-phoenix-secondary"><span class="fas fa-key me-2"></span>Reset password</button></div> --}}
            </div>
         </div>
      </div>
      <div class="row g-5">
         <div class="col-12 col-xxl-4">
            <div class="row g-3 g-xxl-0">
               <div class="col-12 col-md-7 col-xxl-12 mb-xxl-3">
                  <div class="card">
                     <div class="card-body d-flex flex-column justify-content-between pb-3">
                        <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                           <div class="col-12 col-sm-auto mb-sm-2">
                              <div class="avatar avatar-5xl">
                                 @if($account->logo)
                                    <img class="rounded-circle" src="#" alt="" />
                                 @else
                                    <img class="rounded-circle" src="{!! asset('assets/img/placeholder.png') !!}" alt="" />
                                 @endif
                              </div>
                           </div>
                           <div class="col-12 col-sm-auto flex-1">
                              <h3>{!! $account->name !!}</h3>
                              <p class="text-800">Joined 3 months ago</p>
                              <div>
                                 <a class="me-2" href="#!"><span class="fab fa-linkedin-in text-400 hover-primary"></span></a>
                                 <a class="me-2" href="#!"><span class="fab fa-facebook text-400 hover-primary"></span></a>
                                 <a href="#!"><span class="fab fa-twitter text-400 hover-primary"></span></a>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex flex-between-center border-top border-dashed border-300 pt-4">
                           <div>
                              <h6>Projects</h6>
                              <p class="fs-1 text-800 mb-0">297</p>
                           </div>
                           <div>
                              <h6>Reseved</h6>
                              <p class="fs-1 text-800 mb-0">{!! $reservations->count() !!}</p>
                           </div>
                           <div>
                              <h6>Sold</h6>
                              <p class="fs-1 text-800 mb-0">97</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-5 col-xxl-12 mb-xxl-3">
                  <div class="card">
                     <div class="card-body pb-3">
                        <div class="d-flex align-items-center mb-3">
                           <h3 class="me-1">Default Address</h3><button class="btn btn-link p-0"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                        </div>
                        <h5 class="text-800">Address</h5>
                        <p class="text-800">{!! $account->street !!}<br />{!! $account->city !!}<br />{!! $account->country !!}</p>
                        <div class="mb-3">
                           <h5 class="text-800">Email</h5><a href="mailto:{!! $account->email !!}">{!! $account->email !!}</a>
                        </div>
                        <h5 class="text-800">Phone</h5><a class="text-800" href="tel:{!! $account->phone_number !!}">{!! $account->phone_number !!}</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-xxl-8">
            <div class="mb-6">
               <h3 class="mb-4">Reserved Units <span class="text-700 fw-normal">({!! $reservations->count() !!})</span></h3>
               <div class="border-top border-bottom border-200" id="customerOrdersTable" data-list='{"valueNames":["order","total","payment_status","fulfilment_status","delivery_type","date"],"page":6,"pagination":true}'>
                  <div class="table-responsive scrollbar">
                     <table class="table table-sm fs--1 mb-0">
                        <thead>
                           <tr>
                              <th class="sort white-space-nowrap align-middle ps-0 pe-3" scope="col" data-sort="order" style="width:10%;">UNIT</th>
                              <th class="sort align-middle text-end pe-7" scope="col" data-sort="total">SIZE</th>
                              <th class="sort align-middle white-space-nowrap pe-3" scope="col" data-sort="payment_status">PROJECT</th>
                              <th class="sort align-middle white-space-nowrap text-end pe-7" scope="col" data-sort="date">DATE</th>
                              <th class="sort align-middle white-space-nowrap text-start pe-7" scope="col" data-sort="fulfilment_status">STATUS</th>
                              <th class="sort text-end align-middle pe-0 ps-5" scope="col">ACTION</th>
                           </tr>
                        </thead>
                        <tbody class="list" id="table-latest-review-body">
                           @foreach ($reservations as $reservation)
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                 <td class="order align-middle white-space-nowrap ps-0"><a class="fw-semi-bold" href="#!">#{!! $reservation->title !!}</a></td>
                                 <td class="total align-middle text-end fw-semi-bold pe-7 text-1000">£{!! number_format($reservation->price) !!}</td>
                                 @php
                                    $parent = Property::property_info($reservation->propertyCode)->getData();
                                 @endphp
                                 <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">{!! $parent->property->title !!}</td>
                                 <td class="date align-middle white-space-nowrap text-700 fs--1 pe-7 ps-4 text-end">{!! date('F jS, Y', strtotime($reservation->reservation_date)) !!}</td>
                                 <td class="fulfilment_status align-middle white-space-nowrap text-start pe-7 fw-bold text-700">
                                    @if($reservation->status == 'Reserved')
                                    <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                       <span class="badge badge-label">Reserved</span>
                                    </span>
                                    @else
                                    <span class="badge badge-phoenix fs--2 badge-phoenix-success">
                                       <span class="badge badge-label">Waiting Approval</span>
                                    </span>
                                    @endif
                                 </td>
                                 <td class="align-middle white-space-nowrap text-end pe-0 ps-5">
                                    <a href="{!! route('property.reserved.details',$reservation->reserve_code) !!}" class="btn btn-sm btn-primary">View</a>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                     <div class="col-auto d-flex">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                     </div>
                     <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
