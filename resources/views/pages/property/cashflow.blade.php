@extends('layouts.app')
@section('title','Cashflow')
@section('content')
<nav class="mb-2" aria-label="breadcrumb">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Property</a></li>
      <li class="breadcrumb-item">{!! $property->title !!}</li>
      <li class="breadcrumb-item active">Cashflow</li>
   </ol>
</nav>
@include('partials._messages')
   <div class="row">
      <div class="row g-3 mb-4">
         <div class="col-auto">
            <h2 class="mb-0">Property Cashflow</h2>
         </div>
      </div>
      @include('pages.property._menu')
      <div class="col-md-9">
         @include('partials._messages')
         {{-- <nav class="nav nav-pills nav-justified">
            <a class="nav-link active" aria-current="page" href="#">Cash Statement</a>
            <a class="nav-link" href="#">5 & 10 Year</a>
         </nav> --}}

         @if(Session::has('unit'))
            @php
               //units
               $unitInfo = Property::property_info(session()->get('unit')['unit_code'])->getData();

               //exchange deposit
               $price = session()->get('unit')['price'];
               $percentage = $property->exchange_deposit_percentage/100;
               $exchangeDeposit = ($percentage * $price) - $property->reservation_fee;

               //balance forward
               $bf = ($unitInfo->property->price * ($property->mortgage_lending_value/100));

               // Financial payment for a loan or annuity with compound interest
               $rate          = (session()->get('unit')['rate']/100) / 12; // 3.5% interest paid at the end of every month
               $periods       = 25 * 12;    // 30-year mortgage
               $present_value = $bf;   // Mortgage note of $265,000.00
               $future_value  = 0;
               $beginning     = false; // Adjust the payment to the beginning or end of the period
               $period        = 1;     // First payment period

               if($property->mortgage_type == 'Interest Only'){
                  $ipmt = MathPHP\Finance::ipmt($rate, $period, $periods, $present_value, $future_value, $beginning);
               }else{
                  $ipmtValue = MathPHP\Finance::ipmt($rate, $period, $periods, $present_value, $future_value, $beginning);
                  $pmt       = MathPHP\Finance::pmt($rate, $periods, $present_value, $future_value, $beginning);

                  $ipmt = $ipmtValue + $pmt;
               }

               //Market rent escalation
               $initialEscalation   = $unitInfo->property->rent_per_month / $unitInfo->property->size;
               $initialEscalation2  = $initialEscalation  * ((100+$forecast->rental_growth_year_2)/100);
               $initialEscalation3  = $initialEscalation2 * ((100+$forecast->rental_growth_year_3)/100);
               $initialEscalation4  = $initialEscalation3 * ((100+$forecast->rental_growth_year_4)/100);
               $initialEscalation5  = $initialEscalation4 * ((100+$forecast->rental_growth_year_5)/100);
               $initialEscalation6  = $initialEscalation5 * ((100+$forecast->rental_growth_year_6)/100);
               $initialEscalation7  = $initialEscalation6 * ((100+$forecast->rental_growth_year_7)/100);
               $initialEscalation8  = $initialEscalation7 * ((100+$forecast->rental_growth_year_8)/100);
               $initialEscalation9  = $initialEscalation8 * ((100+$forecast->rental_growth_year_9)/100);
               $initialEscalation10 = $initialEscalation9 * ((100+$forecast->rental_growth_year_10)/100);

               //Rental Income
               $rent1  = $initialEscalation   * ($unitInfo->property->size * 12);
               $rent2  = $initialEscalation2  * ($unitInfo->property->size * 12);
               $rent3  = $initialEscalation3  * ($unitInfo->property->size * 12);
               $rent4  = $initialEscalation4  * ($unitInfo->property->size * 12);
               $rent5  = $initialEscalation5  * ($unitInfo->property->size * 12);
               $rent6  = $initialEscalation6  * ($unitInfo->property->size * 12);
               $rent7  = $initialEscalation7  * ($unitInfo->property->size * 12);
               $rent8  = $initialEscalation8  * ($unitInfo->property->size * 12);
               $rent9  = $initialEscalation9  * ($unitInfo->property->size * 12);
               $rent10 = $initialEscalation10 * ($unitInfo->property->size * 12);

               //Market capital escalation
               $psf1 = $unitInfo->property->price_per_sqf;
               $escalation1  = $psf1 * ((100+$forecast->rental_capital_appreciation_1)/100);
               $escalation2  = $escalation1 * ((100+$forecast->rental_capital_appreciation_2)/100);
               $escalation3  = $escalation2 * ((100+$forecast->rental_capital_appreciation_3)/100);
               $escalation4  = $escalation3 * ((100+$forecast->rental_capital_appreciation_4)/100);
               $escalation5  = $escalation4 * ((100+$forecast->rental_capital_appreciation_5)/100);
               $escalation6  = $escalation5 * ((100+$forecast->rental_capital_appreciation_6)/100);
               $escalation7  = $escalation6 * ((100+$forecast->rental_capital_appreciation_7)/100);
               $escalation8  = $escalation7 * ((100+$forecast->rental_capital_appreciation_8)/100);
               $escalation9  = $escalation8 * ((100+$forecast->rental_capital_appreciation_9)/100);
               $escalation10 = $escalation9 * ((100+$forecast->rental_capital_appreciation_10)/100);

               //Property Value - Year End
               $capValue1 = ($escalation1 * $unitInfo->property->size) - $unitInfo->property->price;
               $yearEnd1 = $capValue1 + $unitInfo->property->price;

               $capValue2 = ($escalation2 * $unitInfo->property->size) - $yearEnd1;
               $yearEnd2 = $capValue2 + $yearEnd1;

               $capValue3 = ($escalation3 * $unitInfo->property->size) - $yearEnd2;
               $yearEnd3 = $capValue3 + $yearEnd2;

               $capValue4 = ($escalation4 * $unitInfo->property->size) - $yearEnd3;
               $yearEnd4 = $capValue4 + $yearEnd3;

               $capValue5 = ($escalation5 * $unitInfo->property->size) - $yearEnd4;
               $yearEnd5 = $capValue5 + $yearEnd4;

               $capValue6 = ($escalation6 * $unitInfo->property->size) - $yearEnd5;
               $yearEnd6 = $capValue6 + $yearEnd5;

               $capValue7 = ($escalation7 * $unitInfo->property->size) - $yearEnd6;
               $yearEnd7 = $capValue7 + $yearEnd6;

               $capValue8 = ($escalation8 * $unitInfo->property->size) - $yearEnd7;
               $yearEnd8 = $capValue8 + $yearEnd7;

               $capValue9 = ($escalation9 * $unitInfo->property->size) - $yearEnd8;
               $yearEnd9 = $capValue9 + $yearEnd8;

               $capValue10 = ($escalation10 * $unitInfo->property->size) - $yearEnd9;
               $yearEnd10 = $capValue10 + $yearEnd9;

               $serviceCharge = ($property->estimated_service_charge * $unitInfo->property->size) / 12;

               //GetGround admin fee
               if(session()->get('unit')['get_ground'] == 0){
                  $groundAdminFee = 0;
               }else{
                  $groundAdminFee = 20;
               }

               $estimatedGrossRentalIncome =  $rent1/12;

               //Redstone management fee
               $fee = ($property->management_fee/100) * $estimatedGrossRentalIncome;

               if($property->include_listing_fee == 'Yes'){
                  $listingFee = $estimatedGrossRentalIncome * 0.15;
               }else{
                  $listingFee = 0;
               }

               //mphfee
               if($property->mph_management_fee == 'Yes'){
                  $mphFee = ($estimatedGrossRentalIncome * 0.18) * 1.2;
               }else{
                  $mphFee = 0;
               }
               //

               $mphFee = 0;

               $expense = $groundAdminFee + $serviceCharge + $fee + $property->ground_rent + $listingFee + $mphFee;

               //
               $grossYield = (($estimatedGrossRentalIncome * 12) / $unitInfo->property->price) * 100;


               //net monthly cash position year 1
               $year1 = abs($ipmt) - (($rent1/12) - $expense );
               $year2 = abs($ipmt) - (($rent2/12) - $expense );
               $year3 = abs($ipmt) - (($rent3/12) - $expense );
               $year4 = abs($ipmt) - (($rent4/12) - $expense );
               $year5 = abs($ipmt) - (($rent5/12) - $expense );
               $year6 = abs($ipmt) - (($rent6/12) - $expense );
               $year7 = abs($ipmt) - (($rent7/12) - $expense );
               $year8 = abs($ipmt) - (($rent8/12) - $expense );
               $year9 = abs($ipmt) - (($rent9/12) - $expense );
               $year10 = abs($ipmt) - (($rent10/12) - $expense );


               //ANNUAL NET CAPITAL APPRECIATION
               $value1  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_1/100)) + $unitInfo->property->price;
               $value2  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_2/100)) + $value1;
               $value3  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_3/100)) + $value2;
               $value4  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_4/100)) + $value3;
               $value5  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_5/100)) + $value4;
               $value6  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_6/100)) + $value5;
               $value7  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_7/100)) + $value6;
               $value8  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_8/100)) + $value7;
               $value9  = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_9/100)) + $value8;
               $value10 = ($unitInfo->property->price * ($forecast->rental_capital_appreciation_10/100)) + $value9;

               //Monthly Income
               $monthlyIncome = $estimatedGrossRentalIncome - $expense;

               //Payment On Reservation And Exchange
               $PaymentOnReservationAndExchange = $property->reservation_fee + $property->legal_fees + $exchangeDeposit;

               //capitalPayment
               $capitalPayment = (100 - $property->mortgage_lending_value) - $property->exchange_deposit_percentage;
               $finalCapitalPayment = ($capitalPayment/100) * $unitInfo->property->price;

               if($property->mortgage_type == 'None'){
                  $mortgageAmount = 0;
                  $mortgageCosts = 0;
               }else{
                  $amount = ($unitInfo->property->price * ($property->mortgage_lending_value/100));
                  $mortgageAmount = $amount;
                  $mortgageCosts = ($amount * (1.5/100));
               }
               $stampDuty = 0;

               //Payment On Completion
               $PaymentOnCompletion =  $finalCapitalPayment +  $stampDuty + $mortgageCosts + $property->mortgage_broker_fee + $property->valuation_fee + $unitInfo->property->furniture_pack + $property->land_registry_fee;


            @endphp
            <div class="row">
               <div class="col-md-10"></div>
               <div class="col-md-2"><a href="#" class="btn btn-sm btn-warning btn-block mt-4" data-bs-toggle="modal" data-bs-target="#chooseUnit" >Update Unit</a></div>
            </div>
            <div class="mb-3">
               <h4>
                  <b>Unit :</b> {!! $unitInfo->property->title !!} <br>
                  <b>Unit size :</b> {!! $unitInfo->property->size !!} sqf<br>
                  <b>Unit Price :</b> £{!! number_format($unitInfo->property->price) !!}<br>
                  <b>Rent Per Month :</b> £{!! session()->get('unit')['rent']; !!}<br>
                  <b>Mortgage Rate :</b> {!! session()->get('unit')['rate']; !!}%
               </h4>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  <h5>SNAPSHOT</h5>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Payment on Exchange</td>
                              <td>£{!! number_format($PaymentOnReservationAndExchange) !!}</td>
                           </tr>
                           <tr>
                              <td>Further deposit</td>
                              <td>£0</td>
                           </tr>
                           <tr>
                              <td>Payment on property completion</td>
                              <td>£{!! number_format($PaymentOnCompletion) !!}</td>
                           </tr>
                           <tr>
                              <td>Total Equity Required</td>
                              <td>£{{ number_format($PaymentOnCompletion + $PaymentOnReservationAndExchange) }}</td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <table class="table table-striped">
                           <tr>
                              <td>Mortgage principle</td>
                              <td>£{{ number_format($mortgageAmount) }}</td>
                           </tr>
                           <tr>
                              <td>Monthly income</td>
                              <td>£{!! number_format($monthlyIncome) !!}</td>
                           </tr>
                           <tr>
                              <td>Mortgage - {{ $property->mortgage_type }}</td>
                              <td>£@if($property->mortgage_type == 'Interest Only'){!! number_format(abs($ipmt)) !!}@else 0 @endif</td>
                           </tr>
                           <tr>
                              <td>Projected monthly cash pos.</td>
                              <td>£{!! number_format(abs(abs($ipmt) - $monthlyIncome )) !!}</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  <h5>INITIAL COSTS</h5>
               </div>
               <div class="card-body">
                  <table class="table table-striped">
                     <thead>
                        <th width="1%">#</th>
                        <th>Item</th>
                        <th>Amount</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Client Reservation fee</td>
                           <td>£{!! number_format($property->reservation_fee) !!} per Unit</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Exchange deposit</td>
                           <td> {!! $property->exchange_deposit_percentage !!}% of purchase price (£{!! number_format($exchangeDeposit) !!})</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Legal fees  (Inc. VAT)</td>
                           <td>£{!! number_format($property->legal_fees) !!} based on TBC</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Get Ground</td>
                           <td>£{!! session()->get('unit')['get_ground'] !!} company set up fee</td>
                        </tr>
                        <tr class="table-info">
                           <td></td>
                           <td><b>Payment on Reservation and Exchange</b></td>
                           <td><b>£{!! number_format($PaymentOnReservationAndExchange) !!}</b></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  <h5>FINAL COSTS AT COMPLETION</h5>
               </div>
               <div class="card-body">
                  <table class="table table-striped">
                     <thead>
                        <th width="1%">#</th>
                        <th>Item</th>
                        <th></th>
                        <th>Total</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Final capital payment</td>
                           <td>{{ $capitalPayment }}% of the purchase price </td>
                           <td>£{{ number_format($finalCapitalPayment) }}</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Stamp duty</td>
                           <td>£{!! number_format($stampDuty) !!} based on the purchase price</td>
                           <td>£{!! number_format($stampDuty) !!}</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Mortgage costs</td>
                           <td>{{ number_format($mortgageCosts) }} <i>1.5%</i> of the loan amount</td>
                           <td>£{{ number_format($mortgageCosts) }}</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Mortgage broker fee</td>
                           <td>£{{ number_format($property->mortgage_broker_fee) }} based on TBC</td>
                           <td>£{{ number_format($property->mortgage_broker_fee) }}</td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>Valuation fee </td>
                           <td>£{{ number_format($property->valuation_fee) }} based on the purchase price</td>
                           <td>£{{ number_format($property->valuation_fee) }}</td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>Furniture pack (Exc. VAT)</td>
                           <td>£{{ number_format($unitInfo->property->furniture_pack) }} based on unit type</td>
                           <td>£{{ number_format($unitInfo->property->furniture_pack) }}</td>
                        </tr>
                        <tr>
                           <td>7</td>
                           <td>Land registry fees</td>
                           <td>£{!! number_format($property->land_registry_fee) !!} based on UK Dpt. Of Land Reg. Req.</td>
                           <td>£{!! number_format($property->land_registry_fee) !!} </td>
                        </tr>
                        <tr class="table-info">
                           <td></td>
                           <td></td>
                           <td><b>Payment On Completion</b></td>
                           <td><b>£{{ number_format($PaymentOnCompletion) }}</b></td>
                        </tr>
                        <tr class="table-primary">
                           <td></td>
                           <td></td>
                           <td><b>Total Equity Required</b></td>
                           <td><b>£{{ number_format($PaymentOnCompletion + $PaymentOnReservationAndExchange) }}</b></td>
                        </tr>
                        <tr class="table-warning">
                           <td></td>
                           <td></td>
                           <td><b>Mortgage Amount({{$property->mortgage_lending_value}}%)</b></td>
                           <td><b>£{{ number_format($mortgageAmount) }}</b></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  PROJECT MONTHLY NET INCOME(PRE MORTGAGE)
               </div>
               <div class="card-body">
                  <table class="table table-striped">
                     <thead>
                        <th width="1%">#</th>
                        <th>Item</th>
                        <th></th>
                        <th>Total</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td><b>Estimated Gross Rental Income</b></td>
                           <td></td>
                           <td>£{!! number_format($estimatedGrossRentalIncome) !!}</td>
                        </tr>
                        <tr class="table-info">
                           <td></td>
                           <td><b>Gross Yield </b></td>
                           <td></td>
                           <td>{!! number_format($grossYield,2) !!}%</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>Get Ground admin fee</td>
                           <td>{!! $property->get_ground !!} per Month</td>
                           <td>£{!! $property->get_ground !!}</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Estimated service charge</td>
                           <td>{!! $property->estimated_service_charge !!} psf</td>
                           <td>£{!! number_format($serviceCharge) !!}</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Redstone management fee (Exc. VAT)</td>
                           <td>{!! number_format($property->management_fee) !!} of rental income </td>
                           <td>£{!! number_format($fee ) !!}</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Ground rent</td>
                           <td>{!! number_format($property->ground_rent) !!} per month </td>
                           <td>£{!! number_format($property->ground_rent) !!}</td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td> Listing platform fee </td>
                           <td>£{!! number_format($listingFee) !!} <b><small>15%</small></b> of revenue</td>
                           <td>£{!! number_format($listingFee) !!}</td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>MPH management fee</td>
                           <td>£{!! number_format($mphFee) !!} <b><small>18%</small></b>+VAT of revenue</td>
                           <td>£{!! number_format($mphFee) !!}</td>
                        </tr>
                        <tr class="table-warning">
                           <td></td>
                           <td></td>
                           <td><b><i>Net Monthly Expenses</i></b></td>
                           <td>£{!! number_format($expense) !!}</td>
                        </tr>
                        <tr class="table-success">
                           <td></td>
                           <td></td>
                           <td><b><i>Monthly Income</i></b></td>
                           <td>£{!! number_format($monthlyIncome) !!}</td>
                        </tr>
                        <tr class="table-primary">
                           <td></td>
                           <td></td>
                           <td><b><i>Net Yield</i></b></td>
                           <td>{!! number_format((($monthlyIncome * 12) / $unitInfo->property->price) * 100, 2) !!}%</td>
                        </tr>
                        <tr class="table-primary">
                           <td></td>
                           <td></td>
                           <td><b><i>Mortgage type - {{ $property->mortgage_type }}</i></b></td>
                           <td>£@if($property->mortgage_type == 'Interest Only'){!! number_format(abs($ipmt)) !!}@else 0 @endif
                           </td>
                           <tr class="table-info">
                              <td></td>
                              <td></td>
                              <td><b><i>Projected Net Monthly Cash Position in Year 1</i></b></td>
                              <td>£{!! number_format(abs(abs($ipmt) - $monthlyIncome )) !!}</td>
                           </tr>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  ANNUAL NET MONTHLY CASH POSITION
               </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <th>Year 1</th>
                        <th>Year 2</th>
                        <th>Year 3</th>
                        <th>Year 4</th>
                        <th>Year 5</th>
                        <th>Year 6</th>
                        <th>Year 7</th>
                        <th>Year 8</th>
                        <th>Year 9</th>
                        <th>Year 10</th>
                     </thead>
                     <tbody>
                        <td>£{!! number_format(abs($year1)) !!}</td>
                        <td>£{!! number_format(abs($year2)) !!}</td>
                        <td>£{!! number_format(abs($year3)) !!}</td>
                        <td>£{!!  number_format(abs($year4)) !!}</td>
                        <td>£{!!  number_format(abs($year5)) !!}</td>
                        <td>£{!!  number_format(abs($year6)) !!}</td>
                        <td>£{!!  number_format(abs($year7)) !!}</td>
                        <td>£{!!  number_format(abs($year8)) !!}</td>
                        <td>£{!!  number_format(abs($year9)) !!}</td>
                        <td>£{!!  number_format(abs($year10)) !!}</td>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card mt-3 mb-3">
               <div class="card-header">
                  ANNUAL NET CAPITAL APPRECIATION
               </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <th>Year 1</th>
                        <th>Year 2</th>
                        <th>Year 3</th>
                        <th>Year 4</th>
                        <th>Year 5</th>
                        <th>Year 6</th>
                        <th>Year 7</th>
                        <th>Year 8</th>
                        <th>Year 9</th>
                        <th>Year 10</th>
                     </thead>
                     <tbody>
                        <td>£{!! number_format(abs($value1)) !!}</td>
                        <td>£{!! number_format(abs($value2)) !!}</td>
                        <td>£{!! number_format(abs($value3)) !!}</td>
                        <td>£{!! number_format(abs($value4)) !!}</td>
                        <td>£{!! number_format(abs($value5)) !!}</td>
                        <td>£{!! number_format(abs($value6)) !!}</td>
                        <td>£{!! number_format(abs($value7)) !!}</td>
                        <td>£{!! number_format(abs($value8)) !!}</td>
                        <td>£{!! number_format(abs($value9)) !!}</td>
                        <td>£{!! number_format(abs($value10)) !!}</td>
                     </tbody>
                  </table>
               </div>
            </div>
         @else
            <center><a href="" class="btn btn-sm btn-warning mt-4" data-bs-toggle="modal" data-bs-target="#chooseUnit" >Choose a unit first</a></center>
         @endif
      </div>
   </div>

    <!-- Modal -->
    <div class="modal fade" id="chooseUnit" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Choose unit</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            </div>
            <form action="{!! route('property.cashflow.unit') !!}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group mb-2">
                     <label for="">Unit</label>
                     <select name="propertyCode" class="form-control" required>
                        <option value="">Choose unit</option>
                        @foreach($units as $units)
                           <option value="{!! $units->property_code !!}">{!! $units->title !!} | {!! number_format($units->size) !!} psf | £{!! number_format($units->price) !!}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Mortgage Rate </label>
                     <select name="rate" class="form-control" required>
                        <option value="">Choose Rate</option>
                        @foreach($rates as $rate)
                           <option value="{!! $rate->total !!}">{!! $rate->country !!} | {!! $rate->total !!}%</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group mb-2">
                     <label for="">Get ground</label>
                     <select name="get_ground" class="form-control">
                        <option value="0">Non-uk</option>
                        <option value="149">UK</option>
                     </select>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
