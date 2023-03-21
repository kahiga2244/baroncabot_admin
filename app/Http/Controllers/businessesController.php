<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Reserve;
use Illuminate\Http\Request;

class businessesController extends Controller
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

   /**
 * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
   public function index()
   {
      $businesses = Business::get();

      return view('pages.businesses.index', compact('businesses'));
   }

    /**
    * Show business details.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function details($code){
      $account = Business::where('business_code',$code)->first();
      $reservations = Reserve::join('property','property.property_code','=','property_reserved.unit_code')
                        ->where('property_reserved.business_code',$code)
                        ->select('*','property_reserved.status as status','property_reserved.property_code as propertyCode')
                        ->orderby('property_reserved.id','desc')
                        ->get();
      return view('pages.businesses.details', compact('account','reservations'));
   }
}
