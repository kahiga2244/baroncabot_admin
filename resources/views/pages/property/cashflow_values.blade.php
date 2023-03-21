@extends('layouts.app')
@section('title','Cashflow Values')
@section('content')
<nav class="mb-2" aria-label="breadcrumb">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Property</a></li>
      <li class="breadcrumb-item">{!! $property->title !!}</li>
      <li class="breadcrumb-item active">Cashflow Values</li>
   </ol>
</nav>
@include('partials._messages')
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Property Cashflow Values</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')

         <div class="card">
            <div class="card-header">Cashflow Values</div>
            <div class="card-body">
               {!! Form::model($property, ['route' => ['property.cashflow.values.update'],'class' =>'row','method'=>'post','enctype'=>'multipart/form-data']) !!}
                  @csrf
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Legal fees (Inc. VAT)</label>
                        {!! Form::text('legal_fees',null,['class'=>'form-control']) !!}
                        <input type="hidden" name="propertyCode" value="{!! $propertyCode !!}">
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for=""> Valuation fee</label>
                        {!! Form::text('valuation_fee',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for=""> Land registry fee</label>
                        {!! Form::text('land_registry_fee',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Estimated service charge (psf)</label>
                        {!! Form::text('estimated_service_charge',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Exchange deposit percentage</label>
                        {!! Form::text('exchange_deposit_percentage',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Mortgage Lending Value</label>
                        {!! Form::select('mortgage_lending_value',['75'=>'75','70'=>'70','65'=>'65','60'=>'60','55'=>'55','50'=>'50','45'=>'45','40'=>'40','35'=>'35','30'=>'30','25'=>'25','20'=>'20','15'=>'15','10'=>'10','5'=>'5'],null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Mortgage type</label>
                        {!! Form::select('mortgage_type',[''=>'Choose Mortgage Type','Interest Only'=>'Interest Only','Principle & Interest'=>'Principle & Interest','None'=>'None'],null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Mortgage broker fee</label>
                        {!! Form::text('mortgage_broker_fee',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Redstone management fee in %</label>
                        {!! Form::text('management_fee',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Ground rent</label>
                        {!! Form::text('ground_rent',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="">Include Listing Fees</label>
                        <input type="checkbox" name="include_listing_fee" value="Yes" @if($property->include_listing_fee == 'Yes')checked @endif>
                     </div>
                     <div class="form-group">
                        <label for="">Include MPH management fee</label>
                        <input type="checkbox" name="mph_management_fee" value="Yes" @if($property->mph_management_fee == 'Yes')checked @endif>
                     </div>

                  </div>
                  <div class="col-md-12 mt-3">
                     <center>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update Values</button>
                     </center>
                  </div>
               {!! Form::close() !!}
            </div>
         </div>

         <div class="card mt-3 mb-3">
            <div class="card-header">Forecasting</div>
            <div class="card-body">
               {!! Form::model($forecasts, ['route' => ['property.cashflow.forecasting.update'],'class' =>'row','method'=>'post','enctype'=>'multipart/form-data']) !!}
                  @csrf
                  <div class="col-md-6">
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 1</label>
                        {!! Form::text('rental_growth_year_1',null,['class'=>'form-control']) !!}
                        <input type="hidden" name="propertyCode" value="{!! $propertyCode !!}">
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 2</label>
                        {!! Form::text('rental_growth_year_2',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 3</label>
                        {!! Form::text('rental_growth_year_3',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 4</label>
                        {!! Form::text('rental_growth_year_4',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 5</label>
                        {!! Form::text('rental_growth_year_5',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 6</label>
                        {!! Form::text('rental_growth_year_6',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 7</label>
                        {!! Form::text('rental_growth_year_7',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 8</label>
                        {!! Form::text('rental_growth_year_8',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 9</label>
                        {!! Form::text('rental_growth_year_9',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental growth year 10</label>
                        {!! Form::text('rental_growth_year_10',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 1</label>
                        {!! Form::text('rental_capital_appreciation_1',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 2</label>
                        {!! Form::text('rental_capital_appreciation_2',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 3</label>
                        {!! Form::text('rental_capital_appreciation_3',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 4</label>
                        {!! Form::text('rental_capital_appreciation_4',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 5</label>
                        {!! Form::text('rental_capital_appreciation_5',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 6</label>
                        {!! Form::text('rental_capital_appreciation_6',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 7</label>
                        {!! Form::text('rental_capital_appreciation_7',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 8</label>
                        {!! Form::text('rental_capital_appreciation_8',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 9</label>
                        {!! Form::text('rental_capital_appreciation_9',null,['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group mb-2">
                        <label for="">Rental capital appreciation 10</label>
                        {!! Form::text('rental_capital_appreciation_10',null,['class'=>'form-control']) !!}
                     </div>
                  </div>
                  <center><button class="btn btn-success btn-sm mt-4" type="submit"><i class="fa fa-save"></i> Update Forecasting</button></center>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
@endsection
