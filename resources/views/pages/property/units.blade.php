@extends('layouts.app')
@section('title','Units')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item">{!! $property->title !!}</li>
         <li class="breadcrumb-item active">Units</li>
      </ol>
   </nav>
   @include('partials._messages')
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Property units</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3">
                  <div class="col-md-7">

                  </div>
                  <div class="col-md-5">
                     <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fas fa-upload"></i>   Upload available units
                        </button>
                     <a href="#" data-bs-toggle="modal" data-bs-target="#addUnit" class="btn btn-sm btn-warning"><i class="fas fa-plus-circle"></i> Add available units</a>
                  </div>
               </div>
               @livewire('property.units', ['propertyCode' => $propertyCode])
            </div>
         </div>
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Upload Unit</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{!! route('property.units.upload') !!}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="">Upload CSV</label>
                                 <input type="file" class="form-control" name="upload_import" required>
                                 <input type="hidden" value="{!! $propertyCode !!}" name="projectCode" class="form-control" required>
                              </div>
                           </div>
                        </div>
                        <a href="{!! route('unit.import.sample') !!}" target="_blank">Download CSV sample</a>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Upload Information</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <div class="modal fade" id="addUnit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Add Unit</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{!! route('property.unit.individual.add') !!}" method="POST" enctype="multipart/form-bata">
                     @csrf
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Unit</label>
                                 {!! Form::text('unit',null,['class'=>'form-control','required'=>'']) !!}
                                 <input type="hidden" value="{!! $propertyCode !!}" name="projectCode" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Bedroom(s)</label>
                                 {!! Form::number('bedroom',null,['class'=>'form-control','required'=>'']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Floor</label>
                                 {!! Form::text('floor',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Unit size</label>
                                 {!! Form::text('unit_size',null,['class'=>'form-control','required'=>'']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Bath room(s)</label>
                                 {!! Form::text('bathrooms',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Price per sqft</label>
                                 {!! Form::text('price_per_sqft',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Unit price</label>
                                 {!! Form::text('unit_price',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Rent per month</label>
                                 {!! Form::text('rent_per_month',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 mb-2">
                              <div class="form-group">
                                 <label for="">Furniture pack</label>
                                 {!! Form::text('furniture_pack',null,['class'=>'form-control']) !!}
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Add Unit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

      </div>
   </div>
@endsection
@section('scripts')
   <script type="text/javascript">
      window.livewire.on('popModal', () => {
         $('#unitModal').myModal.hide();
         $('#delete').modal.hide();
      });
   </script>
@endsection 
