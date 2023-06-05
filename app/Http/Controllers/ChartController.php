<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\Property;
use App\Models\Business;
use App\Models\Reserve;

class ChartController extends Controller
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

    public function charts(){
      $properties = Property::latest()->take(5)->get();
      // return $properties;
      return view('pages.charts.chart', compact('properties'));
    }
    public function table(){
      $businesses = Business::latest()->take(5)->get();
      return view('pages.charts.table', compact('businesses'));
    }

}
