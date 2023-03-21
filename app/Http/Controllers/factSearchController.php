<?php

namespace App\Http\Controllers;

use App\Models\Fact_search;
use Illuminate\Http\Request;

class factSearchController extends Controller
{
   //index
   public function index(){
      $searches = Fact_search::join('businesses','businesses.business_code','=','fact_search.business_code')->orderby('fact_search.id','desc')->get();
      return view('pages.fact_search', compact('searches'));
   }
}
