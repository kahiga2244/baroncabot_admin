<?php

namespace App\Http\Controllers;

use App\Models\Forecasts;
use App\Models\Mortgage_rate;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Auth;

class cashflowController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }

   //cashflow
   public function cashflow_values($propertyCode){
      $query = Forecasts::where('property_code',$propertyCode);
      if($query->count() != 1){
         $cast = new Forecasts;
         $cast->property_code = $propertyCode;
         $cast->save();
      }
      $forecasts = $query->first();
      $property = Property::where('property_code',$propertyCode)->first();

      return view('pages.property.cashflow_values', compact('property','propertyCode','forecasts'));
   }

   //cashflow update
   public function cashflow_values_update(Request $request){
      $property = Property::where('property_code',$request->propertyCode)->first();
      $property->legal_fees                    = $request->legal_fees;
      $property->valuation_fee                 = $request->valuation_fee;
      $property->land_registry_fee             = $request->land_registry_fee;
      $property->estimated_service_charge      = $request->estimated_service_charge;
      $property->exchange_deposit_percentage   = $request->exchange_deposit_percentage;
      $property->mortgage_lending_value        = $request->mortgage_lending_value;
      $property->mortgage_type                 = $request->mortgage_type;
      $property->mortgage_broker_fee           = $request->mortgage_broker_fee;
      $property->management_fee                = $request->management_fee;
      $property->mph_management_fee            = $request->mph_management_fee;
      $property->include_listing_fee           = $request->include_listing_fee;
      $property->ground_rent                   = $request->ground_rent;
      $property->updated_by                    = Auth::user()->admin_code;
      $property->save();

      Session::flash('success','Cash flow values updated');

      return redirect()->back();
   }

   //cashflow
   public function cashflow($propertyCode){
      $property = Property::where('property_code',$propertyCode)->first();
      $units = Property::where('parent',$propertyCode)->orderby('id','desc')->get();
      $forecast = Forecasts::where('property_code',$propertyCode)->first();
      $rates = Mortgage_rate::get();

      return view('pages.property.cashflow', compact('property','propertyCode','units','rates','forecast'));
   }

   //cashflow unit
   public function cashflow_unit(Request $request){
      $unit = Property::where('property_code',$request->propertyCode)->first();
      Session()->put('unit',[
         'price'   => $unit->price,
         'size'    => $unit->size,
         'rate'    => $request->rate,
         'rent'    => $unit->rent_per_month,
         'parking' => $unit->parking_fee,
         'get_ground' => $request->get_ground,
         'unit_code' => $request->propertyCode,
      ]);

      return redirect()->back();

   }

   //cashflow forecasting
   public function cashflow_forecasting(Request $request){
      $forecast = Forecasts::where('property_code',$request->propertyCode)->first();
      $forecast->rental_growth_year_1 = $request->rental_growth_year_1;
      $forecast->rental_growth_year_2 = $request->rental_growth_year_2;
      $forecast->rental_growth_year_3 = $request->rental_growth_year_3;
      $forecast->rental_growth_year_4 = $request->rental_growth_year_4;
      $forecast->rental_growth_year_5 = $request->rental_growth_year_5;
      $forecast->rental_growth_year_6 = $request->rental_growth_year_6;
      $forecast->rental_growth_year_7 = $request->rental_growth_year_7;
      $forecast->rental_growth_year_8 = $request->rental_growth_year_8;
      $forecast->rental_growth_year_9 = $request->rental_growth_year_9;
      $forecast->rental_growth_year_10 = $request->rental_growth_year_10;
      $forecast->rental_capital_appreciation_1 = $request->rental_capital_appreciation_1;
      $forecast->rental_capital_appreciation_2 = $request->rental_capital_appreciation_2;
      $forecast->rental_capital_appreciation_3 = $request->rental_capital_appreciation_3;
      $forecast->rental_capital_appreciation_4 = $request->rental_capital_appreciation_4;
      $forecast->rental_capital_appreciation_5 = $request->rental_capital_appreciation_5;
      $forecast->rental_capital_appreciation_6 = $request->rental_capital_appreciation_6;
      $forecast->rental_capital_appreciation_7 = $request->rental_capital_appreciation_7;
      $forecast->rental_capital_appreciation_8 = $request->rental_capital_appreciation_8;
      $forecast->rental_capital_appreciation_9 = $request->rental_capital_appreciation_9;
      $forecast->rental_capital_appreciation_10 = $request->rental_capital_appreciation_10;
      $forecast->save();

      return redirect()->back();
   }

}
