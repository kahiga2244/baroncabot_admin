@extends('layouts.app')
@section('title','Edit Property')
@section('content')
   <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
         <li class="breadcrumb-item"><a href="#">Property</a></li>
         <li class="breadcrumb-item">{!! $property->title !!}</li>
         <li class="breadcrumb-item active">Edit</li>
      </ol>
   </nav>
   @include('partials._messages')
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Edit Property</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')
         <!-- Form -->
         {!! Form::model($property, ['route' => ['property.update',$propertyCode], 'method'=>'post','enctype'=>'multipart/form-data']) !!}
            @csrf
            <div class="card card-default mb-3">
               <div class="card-header">
                  <h4 class="card-title font-weight-bold">Property Information</h4>
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
                     <hr>
                     <div class="row">
                        <div class="col-md-12">
                           <h4>Features</h4>
                        </div>
                        <div class="col-md-3">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckAir" value="Air conditioning" @if(strpos($property->features, 'Air conditioning') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckAir">Air conditioning</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckBalcony" value="Balcony, deck, patio" @if(strpos($property->features, 'Balcony, deck, patio') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckBalcony">Balcony, deck, patio</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCable" value="Cable ready" @if(strpos($property->features, 'Cable ready') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckCable">Cable ready</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCarpet" value="Carpet" @if(strpos($property->features, 'Cable ready') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckCarpet">Carpet</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCeiling" value="Ceiling Fans" @if(strpos($property->features, 'Ceiling Fans') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckCeiling">Ceiling Fans</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckCentral" value="Central Heating" @if(strpos($property->features, 'Central Heating') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckCentral">Central Heating</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckDishwasher" value="Dishwasher" @if(strpos($property->features, 'Dishwasher') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckDishwasher">Dishwasher</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckFenced" value="Fenced yard" @if(strpos($property->features, 'Fenced yard') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckFenced">Fenced yard</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckFireplace" value="Fireplace" @if(strpos($property->features, 'Fireplace') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckFireplace">Fireplace</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckGarbage" value="Garbage Disposal" @if(strpos($property->features, 'Garbage Disposal') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckGarbage">Garbage Disposal</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckHardwood" value="Hardwood floors" @if(strpos($property->features, 'Hardwood floors') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckHardwood">Hardwood floors</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckInternet" value="Internet" @if(strpos($property->features, 'Internet') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckInternet">Internet</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckMicrowave" value="Microwave" @if(strpos($property->features, 'Microwave') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckMicrowave">Microwave</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckOven" value="Oven/range" @if(strpos($property->features, 'Oven/range') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckOven">Oven/range</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckRefrigerator" value="Refrigerator" @if(strpos($property->features, 'Refrigerator') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckRefrigerator">Refrigerator</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStainless" value="Stainless Steel Appliance" @if(strpos($property->features, 'Stainless Steel Appliance') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckStainless">Stainless Steel Appliance</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStorage1" value="Storage" @if(strpos($property->features, 'Storage') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckStorage1">Storage</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckStove" value="Stove" @if(strpos($property->features, 'Stove') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckStove">Stove</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTelephone" value="Telephone" @if(strpos($property->features, 'Telephone') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckTelephone">Telephone</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTile" value="Tile" @if(strpos($property->features, 'Tile') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckTile">Tile</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckTowels" value="Towels" @if(strpos($property->features, 'Towels') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckTowels">Towels</label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckVacuum" value="Vacuum Cleaner" @if(strpos($property->features, 'Vacuum Cleaner') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckVacuum">Vacuum Cleaner</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckclosets" value="Walk-in closets" @if(strpos($property->features, 'Walk-in closets') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckclosets">Walk-in closets</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckDryer" value="Washer/Dryer" @if(strpos($property->features, 'Washer/Dryer') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckDryer">Washer/Dryer</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckWindow" value="Window Coverings" @if(strpos($property->features, 'Window Coverings') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckWindow">Window Coverings</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="features[]" id="customCheckYard" value="Yard" @if(strpos($property->features, 'Yard') !== false) checked @endif>
                              <label class="custom-control-label" for="customCheckYard">Yard</label>
                           </div>
                        </div>
                     </div>
                     <hr>
                     {{-- <div class="row">
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              {!! Form::label('Furnished', 'Furnished', array('class'=>'control-label')) !!}
                              {!! Form::select('funished', ['' => 'Choose', 'Yes' => 'Yes', 'No' => 'No'], null, array('class' => 'form-control')) !!}
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              {!! Form::label('Smoking', 'Smoking', array('class'=>'control-label')) !!}
                              {!! Form::select('smoking', ['' => 'Choose', 'Yes' => 'Yes', 'No' => 'No'], null, array('class' => 'form-control')) !!}
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              {!! Form::label('Laundry', 'Laundry', array('class'=>'control-label')) !!}
                              {!! Form::select('laundry', ['' => 'Choose', 'None' => 'None', 'In unit' => 'In unit', 'Shared' => 'Shared'], null, array('class' => 'form-control')) !!}
                           </div>
                        </div>
                     </div> --}}
               </div>
            </div>

            <div class="card card-default mb-3">
               <div class="card-header">
                  <h4 class="card-title font-weight-bold">Property Amenities</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="custom-control custom-checkbox none">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckClub1" value="Club house2"  @if(strpos($property->amenities, 'Club house') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckClub1">Club house</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckClub" value="Club house"  @if(strpos($property->amenities, 'Club house') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckClub">Club house</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckElevator" value="Elevator" @if(strpos($property->amenities, 'Elevator') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckElevator">Elevator</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customChecklaundry" value="In unit laundry" @if(strpos($property->amenities, 'In unit laundry') !== false) checked @endif>
                           <label class="custom-control-label" for="customChecklaundry">In unit laundry</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customPool" value="Pool" @if(strpos($property->amenities, 'Pool') !== false) checked @endif>
                           <label class="custom-control-label" for="customPool">Pool</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customTennis" value="Tennis court" @if(strpos($property->amenities, 'Tennis court') !== false) checked @endif>
                           <label class="custom-control-label" for="customTennis">Tennis court</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customDoor" value="Door attendant" @if(strpos($property->amenities, 'Door attendant') !== false) checked @endif>
                           <label class="custom-control-label" for="customDoor">Door attendant</label>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckFitness" value="Fitness center" @if(strpos($property->amenities, 'Fitness center') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckFitness">Fitness center</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckParking" value="Off-street Parking" @if(strpos($property->amenities, 'Off-street Parking') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckParking">Off-street Parking</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckStorage" value="Storage" @if(strpos($property->amenities, 'Off-street Parking') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckStorage">Storage</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckWheelchair" value="Wheelchair access" @if(strpos($property->amenities, 'Wheelchair access') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckWheelchair">Wheelchair access</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckRooftop" value="Rooftop patio" @if(strpos($property->amenities, 'Rooftop patio') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckRooftop">Rooftop patio</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckPlayground" value="Playground" @if(strpos($property->amenities, 'Playground') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckPlayground">Playground</label>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckHot" value="Hot tub" @if(strpos($property->amenities, 'Hot tub') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckHot">Hot tub</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckBbq" value="Bbq area" @if(strpos($property->amenities, 'Bbq area') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckBbq">Bbq area</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckHOA" value="In an HOA" @if(strpos($property->amenities, 'In an HOA') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckHOA">In an HOA</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckDog" value="Dog Park" @if(strpos($property->amenities, 'Dog Park') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckDog">Dog Park</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="amenities[]" class="custom-control-input" id="customCheckJogging" value="Jogging Trails" @if(strpos($property->amenities, 'Jogging Trails') !== false) checked @endif>
                           <label class="custom-control-label" for="customCheckJogging">Jogging Trails</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- <div class="card card-default mb-3">
               <div class="card-header">
                  <h4 class="card-title font-weight-bold">Property Location</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row" id="mapform">
                           <div class="col-md-6">
                              <div class="map_canvas" id="map" ></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="address-autocomplete">Google map location</label>
                                 {!! Form::text('geolocation', null, array('class' => 'form-control', 'id' => 'location', 'placeholder' => 'Nairobi, Kenya')) !!}
                              </div>
                              <div class="form-group">
                                 <label for="">Latitude</label>
                                 <input type="text" value="{!! $property->latitude !!}" class="form-control" name="lat" data-geo="lat" readonly>
                              </div>
                              <div class="form-group">
                                 <label for="">Longitude</label>
                                 <input type="text" value="{!! $property->longitude !!}" class="form-control" name="lng" data-geo="lng" readonly>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> --}}

            <div class="card card-default mb-3">
               <div class="card-header">
                  <h4 class="card-title font-weight-bold">Google Map Embade</h4>
               </div>
               <div class="card-body">
                  <textarea name="map" class="form-control" rows="5">{!! $property->map !!}</textarea>
               </div>
            </div>

            <h5>Property Description</h5>
            {!! Form::textarea('description', null, array('class' => 'form-control tinymcy')) !!}

            <div class="col-md-12">
               <button type="submit" class="btn btn-success submit mb-3 mt-3"><i class="fas fa-save"></i> Update Property</button>
               {{-- <img src="{!! asset('assets/img/btn-loader.gif') !!}" class="submit-load none" alt="Loader" width="15%"> --}}
            </div>
         {!! Form::close() !!}
      </div>
   </div>
@endsection
@section('scripts')
   <script>
      var latitude = "{!! $property->latitude !!}";
      var longitude = "{!! $property->longitude !!}";
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
