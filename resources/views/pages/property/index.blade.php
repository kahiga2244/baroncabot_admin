@extends('layouts.app')
@section('title','Properties')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item active">List</li>
      </ol>
   </nav>
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

               </div>
               <div class="col-auto">
                  {{-- <button class="mdi mdi-link-variant text-900 me-4 px-0"><span class="mdi mdi-border-right fs--1 me-2"></span>Export</button> --}}
                  <a class="btn btn-primary" href="{!! route('property.create') !!}"><span class="mdi mdi-cart-plus m"></span>&nbsp; Add Property</a>
               </div>
            </div>
         </div>
         <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
               <table class="table fs--1 mb-0">
                  <thead>
                     <tr>
                        <th class="white-space-nowrap fs--1 align-middle" style="max-width:20px; width:18px;">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:70px;"></th>
                        <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Property</th>
                        <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">Price</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">Location</th>
                        <th class="sort align-middle fs-0 text-center ps-4" scope="col" style="width:125px;">Status</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="vendor" style="width:200px;">Owner</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">Published On</th>
                        <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                     </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
                     @foreach ($properties as $property)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                           <td class="fs--1 align-middle">
                              <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                           </td>
                           <td class="align-middle white-space-nowrap py-0">
                              <div class="border rounded-2">
                                 @if($property->image)
                                    <img src="{!! asset('property/'.$property->property_code.'/'.$property->image) !!}" alt="" width="53" />
                                 @else
                                    <img src="#" alt="">
                                 @endif
                              </div>
                           </td>
                           <td class="product align-middle ps-4">
                              <a class="fw-semi-bold line-clamp-3 mb-0" href="{!! route('property.edit',$property->property_code) !!}">{!! $property->title !!}</a>
                           </td>
                           <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">£{!! $property->price !!}</td>
                           <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{!! $property->location !!}</td>

                           <td class="align-middle review fs-0 text-center ps-4">
                              <span class="badge badge-success">On Sale</span>
                           </td>
                           <td class="vendor align-middle text-start fw-semi-bold ps-4">
                              @if($property->upload_type == 'Admin')
                                 <a href="#">Admin</a>
                              @else

                              @endif
                           </td>
                           <td class="time align-middle white-space-nowrap text-600 ps-4">{!! date('F jS, Y', strtotime($property->created_at)) !!}</td>
                           <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                           <div class="position-relative">
                              <div class="hover-actions">
                                 <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button>
                                 <button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                           </div>
                           <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2">
                                 <a class="dropdown-item" href="{!! route('property.edit',$property->property_code) !!}">Edit</a>
                                 {{-- <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a> --}}
                              </div>
                           </div>
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
