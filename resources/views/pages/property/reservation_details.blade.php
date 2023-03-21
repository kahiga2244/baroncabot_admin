@extends('layouts.app')
@section('title','Reserved Unit Details')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item active">Reserved</li>
         <li class="breadcrumb-item active">Details</li>
      </ol>
   </nav>
   <div class="mb-9">
      <div class="row align-items-center justify-content-between g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Reserved Unit Details</h2>
         </div>
         <div class="col-auto">
            <div class="row g-3">
               @if($reservation->status == 'Reserved')
                  <div class="col-auto"><a href="{!! route('property.reserved.stop',$reservation->reserve_code) !!}" class="btn btn-phoenix-danger"><span class="fas fa-trash-alt me-2"></span> Stop Reservation</a></div>
               @else
                  <div class="col-auto">
                     <a class="btn btn-phoenix-success" href="{!! route('property.approve.reserved.unit',$reservation->reserve_code) !!}">
                        <span class="fas fa-check-circle me-2"></span> Approve Request
                     </a>
                  </div>
                  <div class="col-auto">
                     <a class="btn btn-phoenix-warning" data-bs-toggle="modal" data-bs-target="#rejectRequest">
                        <span class="fas fa-stop-circle me-2"></span> Reject Request
                     </a>
                  </div>
               @endif
            </div>
         </div>
         <div class="col-md-12">
            @include('partials._messages')
         </div>
      </div>

      <div class="row">
         <div class="col-md-3">
            <div class="card">
               <div class="card-body">
                  @if($property->image)
                     <img src="{!! asset('property/'.$property->property_code.'/'.$property->image) !!}" alt="" style="width:100%"/>
                  @else
                     <img src="#" alt="">
                  @endif
                  <h3  class="me-1 mt-2">{!! $property->title !!}</h3>
                  <h4 class="mt-3">
                     <span class="text-800">Location :</span> {!! $property->location !!}<br>
                     <span class="text-800">Complition :</span> {!! $property->completion_period !!}<br>
                     <span class="text-800">Bedrooms :</span> {!! $property->bedrooms !!}
                  </h4>
               </div>
            </div>

            <div class="col-12 col-md-5 col-xxl-12 mb-xxl-3 mt-3">
               <div class="card h-100">
                  <div class="card-body pb-3">
                     <div class="d-flex align-items-center mb-3">
                        <h3 class="me-1">Agency Detais</h3>
                     </div>
                     <h5 class="text-800">{!! $business->name !!}</h5>
                     <p class="text-800">{!! $business->location !!}<br />{!! $business->city !!}<br/>{!! $business->street !!}</p>
                     <div class="mb-3">
                        <h5 class="text-800">Email</h5><a href="mailto:{!! $business->email !!}">{!! $business->email !!}</a>
                     </div>
                     <h5 class="text-800">Phone</h5><a class="text-800" href="tel:{!! $business->phone_number !!}">{!! $business->phone_number !!}</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="card mb-3">
               <div class="card-header">Plot & Reservation Details</div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <table class="table table-striped">
                           <tr>
                              <td>PLOT NO:</td>
                              <td></td>
                           </tr>
                           <tr>
                              <td>UNIT NO:</td>
                              <td>{!! $unit->title !!}</td>
                           </tr>
                           <tr>
                              <td>PARKING:</td>
                              <td></td>
                           </tr>
                           <tr>
                              <td>PARKING PLOT:</td>
                              <td>{!! $unit->title !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-4">
                        <table class="table table-striped">
                           <tr>
                              <td>EST. SERVICE CHARGE.</td>
                              <td>{!! $property->estimated_service_charge !!}</td>
                           </tr>
                           <tr>
                              <td>FLOOR #</td>
                              <td>{!! $unit->floor !!}</td>
                           </tr>
                           <tr>
                              <td>EST. GROUND RENT.</td>
                              <td>£{!! number_format($property->ground_rent) !!}</td>
                           </tr>
                           <tr>
                              <td>TOTAL PURCHASE PRICE:</td>
                              <td>{!! $reservation->purchase_type !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-4">
                        <table class="table table-striped">
                           <tr>
                              <td>UNIT TYPE:</td>
                              <td>{!! $unit->unit_type !!}</td>
                           </tr>
                           <tr>
                              <td>GIA.</td>
                              <td>{!! $unit->title !!}</td>
                           </tr>
                           <tr>
                              <td>UNIT PRICE:</td>
                              <td>£{!! number_format($unit->price) !!}</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-3">
               <div class="card-header">Buyer Details</div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Buyer 1 Details</h4>
                        <table class="table table-striped">
                           <tr>
                              <td>Title</td>
                              <td>{!! $reservation->buyer_title !!}</td>
                           </tr>
                           <tr>
                              <td>Gender</td>
                              <td>{!! $reservation->buyer_gender !!}</td>
                           </tr>
                           <tr>
                              <td>Full Names</td>
                              <td>{!! $reservation->buyer_name !!}</td>
                           </tr>
                           <tr>
                              <td>Address</td>
                              <td>{!! $reservation->buyer_address !!}</td>
                           </tr>
                           <tr>
                              <td>City</td>
                              <td>{!! $reservation->buyer_city !!}</td>
                           </tr>
                           <tr>
                              <td>Country</td>
                              <td>{!! $reservation->buyer_country !!}</td>
                           </tr>
                            <tr>
                              <td>Zip / Postal Code</td>
                              <td>{!! $reservation->buyer_zip_code !!}</td>
                           </tr>
                            <tr>
                              <td>Telephone</td>
                              <td>{!! $reservation->buyer_telephone !!}</td>
                           </tr>
                            <tr>
                              <td>Nationality</td>
                              <td>{!! $reservation->buyer_nationality !!}</td>
                           </tr>
                            <tr>
                              <td>Email Address</td>
                              <td>{!! $reservation->buyer_email !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <h4>Buyer 2 Details</h4>
                        <table class="table table-striped">
                           <tr>
                              <td>Title</td>
                              <td>{!! $reservation->buyer_2_title !!}</td>
                           </tr>
                           <tr>
                              <td>Gender</td>
                              <td>{!! $reservation->buyer_2_gender !!}</td>
                           </tr>
                           <tr>
                              <td>Full Names</td>
                              <td>{!! $reservation->buyer_2_name !!}</td>
                           </tr>
                           <tr>
                              <td>Address</td>
                              <td>{!! $reservation->buyer_2_address !!}</td>
                           </tr>
                           <tr>
                              <td>City</td>
                              <td>{!! $reservation->buyer_2_city !!}</td>
                           </tr>
                           <tr>
                              <td>Country</td>
                              <td>{!! $reservation->buyer_2_country !!}</td>
                           </tr>
                            <tr>
                              <td>Zip / Postal Code</td>
                              <td>{!! $reservation->buyer_2_zip_code !!}</td>
                           </tr>
                            <tr>
                              <td>Telephone</td>
                              <td>{!! $reservation->buyer_2_telephone !!}</td>
                           </tr>
                            <tr>
                              <td>Nationality</td>
                              <td>{!! $reservation->buyer_2_nationality !!}</td>
                           </tr>
                            <tr>
                              <td>Email Address</td>
                              <td>{!! $reservation->buyer_2_email !!}</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-3">
               <div class="card-header">Financing & Mortgage Details</div>
               <div class="card-body">
                  <h5>FINANCING TYPE: {!! $reservation->financing_type !!}</h5>

                  <h5 class="mt-4">Mortgage Provider Details</h5>
                  <div class="row">
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Company Name</td>
                              <td>{!! $reservation->mortgage_company_name !!}</td>
                           </tr>
                           <tr>
                              <td>Contact Name</td>
                              <td>{!! $reservation->mortgage_contact_name !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Telephone</td>
                              <td>{!! $reservation->mortgage_telephone !!}</td>
                           </tr>
                           <tr>
                              <td>Email</td>
                              <td>{!! $reservation->mortgage_email !!}</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mb-3">
               <div class="card-header">Conveyancing Details</div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Solicitor</td>
                              <td>{!! $reservation->solicitor !!}</td>
                           </tr>
                           <tr>
                              <td>Point of contact</td>
                              <td>{!! $reservation->solicitor_contacts !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Email</td>
                              <td>{!! $reservation->solicitor_email !!}</td>
                           </tr>
                           <tr>
                              <td>Telephone</td>
                              <td>{!! $reservation->solicitor_telephone !!}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-12">
                        <table class="table table-striped">
                           <tr>
                              <td>Note</td>
                              <td>{!! $reservation->solicitor_note !!}</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="rejectRequest" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <form action="{!! route('property.reserved.reject',$reservation->reserve_code) !!}" method="POST">
                  @csrf
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Rejection Reason</h5>
                     <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                  </div>
                  <div class="modal-body">
                     <textarea name="reason" class="form-control" cols="30" rows="10" required></textarea>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

   </div>


@endsection
