<?php

namespace App\Imports;
use App\Models\Property;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Auth;

class available_units implements ToCollection,WithHeadingRow
{
   /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct($projectCode)
   {
      $this->projectCode  = $projectCode;
   }

   /**
    * @param Collection $collection
   */
   public function collection(Collection $rows){
      foreach ($rows as $row){
         $property = new Property;
         $property->parent          = $this->projectCode;
         $property->property_code   = Str::random(30);
         $property->title           = $row['unit'];
         $property->bedrooms        = $row['bedroom'];
         $property->floor           = $row['floor'];
         $property->size            = $row['unit_size'];
         //$property->bathrooms       = $row['bathrooms'];
         $property->price_per_sqf   = $row['unit_price'] / $row['unit_size'];
         $property->price           = $row['unit_price'];
         $property->rent_per_month  = $row['rent_per_month'];
         $property->furniture_pack  = $row['furniture_pack'];
         $property->plot            = $row['plot'];
         $property->upload_type     = 'Admin';
         $property->created_by      = Auth::user()->admin_code;
         $property->save();
      }
   }
}


