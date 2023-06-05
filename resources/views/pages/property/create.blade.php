@extends('layouts.app')
@section('title','Dashboard')
@section('content')
   @include('partials._messages')
   <!-- Form -->
   <form class="mb-4" method="POST" action="{!! route('property.store') !!}" enctype="multipart/form-data">
      @csrf
      <div class="card mb-3">
         <div class="card-header">
            <h4 class="card-title">General Information</h4>
         </div>
         <div class="card-body">
            <div class="row">
                  <div class="col-md-4 mb-3">
                     <div class="form-group required">
                        {!! Form::label('Property Type', 'Property Type', array('class'=>'control-label text-danger')) !!}
                        {!! Form::select('property_type', ['Apartments'=>'Apartments'], null, array('class' => 'form-control select2', 'required' => '')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group required ">
                        {!! Form::label('Property Name', 'Property Name', array('class'=>'control-label text-danger')) !!}
                        {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter Property Name', 'required' => '')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group required">
                        {!! Form::label('Price From', 'Price From', array('class'=>'control-label text-danger')) !!}
                        {!! Form::number('price', null, array('class' => 'form-control', 'placeholder' => 'Enter amount')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Price From', 'Reservation fee', array('class'=>'control-label text-danger')) !!}
                        {!! Form::number('reservation_fee', null, array('class' => 'form-control', 'placeholder' => 'Enter amount')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('payment_plan', 'Payment plan', array('class'=>'control-label')) !!}
                        {!! Form::text('payment_plan',null, array('class' => 'form-control')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Unit Types', 'Price includes parking', array('class'=>'control-label')) !!}
                        {!! Form::select('include_parking',['Yes'=>'Yes','No'=>'No'],null, array('class' => 'form-control')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group required ">
                        {!! Form::label('Location', 'Location', array('class'=>'control-label text-danger')) !!}
                        {!! Form::text('location', null, array('class' => 'form-control', 'placeholder' => 'Enter location', 'required' => '')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Unit Types', 'Unit Types', array('class'=>'control-label')) !!}
                        {!! Form::text('unit_type', null, array('class' => 'form-control', 'placeholder' => 'ex 1 and 2 beds')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Parking', 'Parking Fee', array('class'=>'control-label')) !!}
                        {!! Form::number('parking_fee', null, array('class' => 'form-control', 'placeholder' => 'Enter fee')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Unit Types', 'Accept Mortgage', array('class'=>'control-label')) !!}
                        {!! Form::select('mortgage',['Yes'=>'Yes','No'=>'No'],null, array('class' => 'form-control')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('completion_period', 'Completion period', array('class'=>'control-label')) !!}
                        {!! Form::text('completion_period', null, array('class' => 'form-control')) !!}
                     </div>
                  </div>
                  <div class="col-md-4 mb-3">
                     <div class="form-group">
                        {!! Form::label('Image', 'Property Image', array('class'=>'control-label')) !!}
                        <input type="file" name="image" id="thumbnail" accept="image/*" class="form-control">
                     </div>
                  </div>
               </div>
            <div class="row office single">
               <div class="col-md-12">
                  <hr>
               </div>
               <div class="col-md-12">
                  <h5>Features</h5>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckAir" value="Air conditioning">
                     <label class="custom-control-label" for="customCheckAir">Air conditioning</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckBalcony" value="Balcony, deck, patio">
                     <label class="custom-control-label" for="customCheckBalcony">Balcony, deck, patio</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCable" value="Cable ready">
                     <label class="custom-control-label" for="customCheckCable">Cable ready</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCarpet" value="Carpet">
                     <label class="custom-control-label" for="customCheckCarpet">Carpet</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCeiling" value="Ceiling Fans">
                     <label class="custom-control-label" for="customCheckCeiling">Ceiling Fans</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCentral" value="Central Heating">
                     <label class="custom-control-label" for="customCheckCentral">Central Heating</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckDishwasher" value="Dishwasher">
                     <label class="custom-control-label" for="customCheckDishwasher">Dishwasher</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckFenced" value="Fenced yard">
                     <label class="custom-control-label" for="customCheckFenced">Fenced yard</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckFireplace" value="Fireplace">
                     <label class="custom-control-label" for="customCheckFireplace">Fireplace</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckGarbage" value="Garbage Disposal">
                     <label class="custom-control-label" for="customCheckGarbage">Garbage Disposal</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckHardwood" value="Hardwood floors">
                     <label class="custom-control-label" for="customCheckHardwood">Hardwood floors</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckInternet" value="Internet">
                     <label class="custom-control-label" for="customCheckInternet">Internet</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckMicrowave" value="Microwave">
                     <label class="custom-control-label" for="customCheckMicrowave">Microwave</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckOven" value="Oven/range">
                     <label class="custom-control-label" for="customCheckOven">Oven/range</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckRefrigerator" value="Refrigerator">
                     <label class="custom-control-label" for="customCheckRefrigerator">Refrigerator</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStainless" value="Stainless Steel Appliance">
                     <label class="custom-control-label" for="customCheckStainless">Stainless Steel Appliance</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStorage1" value="Storage">
                     <label class="custom-control-label" for="customCheckStorage1">Storage</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStove" value="Stove">
                     <label class="custom-control-label" for="customCheckStove">Stove</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTelephone" value="Telephone">
                     <label class="custom-control-label" for="customCheckTelephone">Telephone</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTile" value="Tile">
                     <label class="custom-control-label" for="customCheckTile">Tile</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTowels" value="Towels">
                     <label class="custom-control-label" for="customCheckTowels">Towels</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckVacuum" value="Vacuum Cleaner">
                     <label class="custom-control-label" for="customCheckVacuum">Vacuum Cleaner</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckclosets" value="Walk-in closets">
                     <label class="custom-control-label" for="customCheckclosets">Walk-in closets</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckDryer" value="Washer/Dryer">
                     <label class="custom-control-label" for="customCheckDryer">Washer/Dryer</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckWindow" value="Window Coverings">
                     <label class="custom-control-label" for="customCheckWindow">Window Coverings</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckYard" value="Yard">
                     <label class="custom-control-label" for="customCheckYard">Yard</label>
                  </div>
               </div>
               <div class="col-md-12">
                  <hr>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-3">
         <div class="card-header">
            <h4 class="card-title">Amenities</h4>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckClub" value="Club house">
                     <label class="custom-control-label" for="customCheckClub">Club house</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckElevator" value="Elevator">
                     <label class="custom-control-label" for="customCheckElevator">Elevator</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customChecklaundry" value="In unit laundry">
                     <label class="custom-control-label" for="customChecklaundry">In unit laundry</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheck4" value="Pool">
                     <label class="custom-control-label" for="customCheck4">Pool</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheck5" value="Tennis court">
                     <label class="custom-control-label" for="customCheck5">Tennis court</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckDoor" value="Door attendant">
                     <label class="custom-control-label" for="customCheckDoor">Door attendant</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckFitness" value="Fitness center">
                     <label class="custom-control-label" for="customCheckFitness">Fitness center</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckParking" value="Off-street Parking">
                     <label class="custom-control-label" for="customCheckParking">Off-street Parking</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckStorage" value="Storage">
                     <label class="custom-control-label" for="customCheckStorage">Storage</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckWheelchair" value="Wheelchair access">
                     <label class="custom-control-label" for="customCheckWheelchair">Wheelchair access</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckRooftop" value="Rooftop patio">
                     <label class="custom-control-label" for="customCheckRooftop">Rooftop patio</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckPlayground" value="Playground">
                     <label class="custom-control-label" for="customCheckPlayground">Playground</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckHot" value="Hot tub">
                     <label class="custom-control-label" for="customCheckHot">Hot tub</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckBbq" value="Bbq area">
                     <label class="custom-control-label" for="customCheckBbq">Bbq area</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckHOA" value="In an HOA">
                     <label class="custom-control-label" for="customCheckHOA">In an HOA</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckDog" value="Dog Park">
                     <label class="custom-control-label" for="customCheckDog">Dog Park</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckJogging" value="Jogging Trails">
                     <label class="custom-control-label" for="customCheckJogging">Jogging Trails</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card card-default mb-3">
         <div class="card-header">
            <h4 class="card-title font-weight-bold">Google Map Embade</h4>
         </div>
         <div class="card-body">
            {!! Form::textarea('map',null,['class'=>'form-control','size'=>' 4 x 4']) !!}
         </div>
      </div>
      <div class="card mb-3">
         <div class="card-header">
            <h4 class="card-title">Property Description</h4>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     {!! Form::textarea('description', null, array('class' => 'form-control tinymcy')) !!}
                  </div>
               </div>
               <div class="col-md-12 mt-3">
                  <button type="submit" class="btn btn-success submit"><i class="fas fa-save"></i> Add Property</button>
               </div>
            </div>
         </div>
      </div>
   </form>
@endsection
@section('scripts')
   <script>
      var latitude = -1.2806256;
      var longitude = 36.7994581;
      var setloc = new google.maps.LatLng(latitude,longitude);

      $('#location').geocomplete({
         map: '#map',
         details: "form",
         location: setloc,
         detailsAttribute:"data-geo",
         mapOptions: {
            zoom: 15
         },
         markerOptions: {
            draggable: true
         }
      });
      $("#location").bind("geocode:dragged", function(event, latLng){
         $("input[name=lat]").val(latLng.lat());
         $("input[name=lng]").val(latLng.lng());
      });
   </script>
@endsection
