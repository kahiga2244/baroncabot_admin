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
      $properties = Property::whereNull('parent')->orderby('created_at')->get();
      return $properties;
      // return view('pages.charts.chart', ['properties'=>$properties]);
    }
    public function table(){
      return view('pages.charts.table');
    }

}
