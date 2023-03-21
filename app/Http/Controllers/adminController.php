<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Reserve;
use Illuminate\Http\Request;

class adminController extends Controller
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

   //dashboard
   public function dashboard(){
      $reserves = Reserve::join('property','property.property_code','=','property_reserved.unit_code')
                        ->join('businesses','businesses.business_code','=','property_reserved.business_code')
                        ->select('*','property_reserved.status as status','property_reserved.property_code as propertyCode')
                        ->orderby('property_reserved.id','desc')
                        ->get();
      $sold = Property::where('sales_status','Sold')->count();
      $units = Property::where('parent','!=',"")->count();
      $projects = Property::whereNull('parent')->count();

      return view('pages.dashboard', compact('reserves','sold','units','projects'));
   }
}
