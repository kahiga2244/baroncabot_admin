<?php

namespace App\Http\Controllers;

use App\Helpers\Property as HelpersProperty;
use App\Models\Property;
use Illuminate\Http\Request;

class marketingController extends Controller
{
   //index
   public function index(){
      return view('marketing.index');
   }

   //unit
   public function unit($unitCode){
      $unit = Property::where('property_code',$unitCode)->first();
      return view('marketing.unit', compact('unit','unitCode'));
   }

   //iframe
   public function iframe($unitCode){
      $unit = Property::where('property_code',$unitCode)->first();
      $checkImages = HelpersProperty::unit_images('Photos',$unitCode)->getData();
      if($checkImages->check > 0){
         $images = $checkImages->images;
      }else{
         $images = HelpersProperty::property_image($unit->project_code);
      }
      $property = Property::where('property_code',$unit->parent)->first();
      return view('email.unit_campaign', compact('unit','images','property'));
   }
}
