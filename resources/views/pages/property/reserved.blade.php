@extends('layouts.app')
@section('title','Reserved')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item active">List</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Reserved</h2>
         </div>
      </div>
      {{-- <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
         <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">All <span class="text-700 fw-semi-bold">(68817)</span></a></li>
         <li class="nav-item"><a class="nav-link" href="#">By Admin <span class="text-700 fw-semi-bold">(70348)</span></a></li>
         <li class="nav-item"><a class="nav-link" href="#">By Agents <span class="text-700 fw-semi-bold">(17)</span></a></li>
      </ul> --}}
      <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
         <div class="mb-4">
            <div class="row g-3">
               <div class="col-auto">
                  <div class="search-box">
                     <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search by property name" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                     </form>
                  </div>
               </div>
               <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
                  {{-- <div class="btn-group position-static" role="group">
                     <div class="btn-group position-static text-nowrap"><button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Category<span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                           <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                     </div>
                     <div class="btn-group position-static text-nowrap"><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Vendor<span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                           <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                     </div><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0">More filters</button>
                  </div> --}}
               </div>
               <div class="col-auto">
                  {{-- <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button> --}}
                  {{-- <a class="btn btn-primary" href="{!! route('property.create') !!}"><span class="fas fa-plus me-2"></span>Add Property</a> --}}
               </div>
            </div>
         </div>
         <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
               <table class="table table-sm table-nowrap table-hover card-table">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-product">
                              unit
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-product">
                              Client
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-product">
                              Floor
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-price">
                              Price From
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-price">
                              Reserved Date
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-price">
                              Due Date
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-price">
                              Reserved By
                           </a>
                        </th>
                        <th>
                           <a href="#" class="text-muted list-sort" data-sort="products-stock">
                              Status
                           </a>
                        </th>
                        <th>

                        </th>
                     </tr>
                  </thead>
                  <tbody class="list">
                     @foreach($reserves as $count=>$reserv)
                        <tr>
                           <td>{!! $count+1 !!}</td>
                           <td>
                              <a href="{!! route('property.reserved.details',$reserv->reserve_code) !!}">
                                 <h5 class="">{!! $reserv->title !!}</h5>
                                 @php
                                    $parent = Property::property_info($reserv->propertyCode)->getData();
                                 @endphp
                                 <small class="text-muted">{!! $parent->property->title !!}</small>
                              </a>
                           </td>
                           <td>
                              {!! $reserv->buyer_name !!}<br>
                              {!! $reserv->buyer_telephone !!}<br>
                              {!! $reserv->buyer_email !!}
                           </td>
                           <td>
                              {!! $reserv->floor !!}
                           </td>
                           <td>
                              {!! $reserv->price !!}
                           </td>
                           <td>
                              {!! date('F jS, Y', strtotime($reserv->reservation_date)) !!}
                           </td>
                           <td>
                              {!! date('F jS, Y', strtotime($reserv->reservation_due_date)) !!}
                           </td>
                           <td>
                              {!! $reserv->name !!}
                           </td>
                           <td>
                              @if($reserv->status == 'Reserved')
                                 <span class="badge badge-phoenix badge-phoenix-success">Reserved</span>
                              @else
                                 <span class="badge badge-phoenix badge-phoenix-warning">Waiting Approval</span>
                              @endif
                           </td>
                           <td>
                              <a href="{!! route('property.reserved.details',$reserv->reserve_code) !!}" class="btn btn-phoenix-primary me-1 mb-1">View</a>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
               <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                  <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                  <a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
               </div>
               <div class="col-auto d-flex">
                  <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="mb-0 pagination"></ul>
                  <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
