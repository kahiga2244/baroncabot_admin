<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class ChartController extends Controller
{
    //
    public function charts(){
      return view('pages.charts.chart');
    }
    public function table(){
      return view('pages.charts.table');
    }

}
