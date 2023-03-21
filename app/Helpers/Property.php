<?php

namespace App\Helpers;

use App\Models\Deals;
use App\Models\Media;
use App\Models\Property as ModelsProperty;

class Property
{
   //property info
   public static function property_info($code){
      $query = ModelsProperty::where('property_code',$code);

      return response()->json([
         'check' => $query->count(),
         'property' => $query->first()
      ]);
   }

   //total admin properties
   public static function total_admin_properties(){
      $total = ModelsProperty::where('status','!=', 'Sold out')->count();
      return $total;
   }

   //get deals
   public static function deals(){
      $deals = Deals::where('status','Active')->orderby('id','desc')->get();
      return $deals;
   }

   //get unit files
   public static function unit_image($code){
      $query =  Media::where('type','Photos')->where('unit_code','like', '%'.$code.'%');
      return response()->json([
         'check' => $query->count(),
         'cover' => $query->first()
      ]);
   }

   //get unit linked media
   public static function unit_images($media,$code){
      $query =  Media::where('type',$media)->where('unit_code','like', '%'.$code.'%');
      return response()->json([
         'check' => $query->count(),
         'cover' => $query->first(),
         'images' => $query->limit(3)->get()
      ]);
   }

   //get property images media
   public static function property_image($code){
      $images =  Media::where('type','Photos')->where('property_code','like', '%'.$code.'%')->limit(3)->get();
      return $images;
   }
}
