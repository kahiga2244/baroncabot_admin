<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
   public function join(){
         $users = DB::table('businesses')
                  ->join('users', 'businesses.business_code', '=', 'users.business_code')
                  ->select('*', 'users.name AS PersonsName', 'businesses.name AS CompanyName')
                  ->get(8);
      // return $users;
      return view('comparison.table', compact('users'));
   }

   public function count(){
      $businesses = DB::table('businesses')
      ->join('users', 'businesses.business_code', '=', 'users.business_code')
      ->select('users.name as PersonsName', 'businesses.name as CompanyName', 'users.role', 'users.introducer')
      ->groupBy('PersonsName', 'CompanyName', 'users.role', 'users.introducer')
      ->get();
   // return $businesses->count();
      $personCounts = DB::table('users')
         ->join('businesses', 'users.business_code', '=', 'businesses.business_code')
         ->select('businesses.name', DB::raw('count(users.id) as PersonCount'))
         ->groupBy('businesses.name')
         ->get();

      $companyCounts = DB::table('businesses')
         ->join('users', 'businesses.business_code', '=', 'users.business_code')
         ->select('businesses.name', DB::raw('count(businesses.id) as CompanyCount'))
         ->groupBy('businesses.name')
         ->get();
      $agents = User::where('role','agent')->count();
      return view('comparison.bizUser', compact('businesses','personCounts','companyCounts', 'agents'));


   }
   public function proBus()
    {
        $companies = Business::all();

        $employeesByCompany = [];

        foreach ($companies as $company) {
            $employees = User::where('business_code', $company->id)->get();
            $employeesByCompany[$company->name] = $employees;
        }

        return view('comparison.emploCom', compact('employeesByCompany'));
    }
    public function search(Request $req){
      $query = $req->input('query');
      $results = Business::query()
         ->where('name', 'LIKE', '%'.$query.'%')
         ->orWhere('email', 'LIKE', '%'.$query.'%')
         ->get();

      return view('pages.searchbusiness', compact('results'));

    }


}
