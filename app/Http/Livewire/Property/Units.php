<?php

namespace App\Http\Livewire\Property;

use App\Models\Property;
use Livewire\Component;

class Units extends Component
{
	public $propertyCode,$unitCode;
   public $unit,$bedrooms,$floor,$size,$bathrooms,$unit_price,$rent_per_month,$furniture_pack,$sales_status,$plot;
	public function render()
	{
		$units = Property::where('parent',$this->propertyCode)->orderby('id','desc')->get();

		return view('livewire.property.units', compact('units'));
	}

	//edit
	public function edit($code){
      $unit = Property::where('property_code',$code)->first();
      $this->unitCode       = $code;
      $this->unit           = $unit->title;
      $this->bedrooms       = $unit->bedrooms;
      $this->floor          = $unit->floor;
      $this->size           = $unit->size;
      $this->bathrooms      = $unit->bathrooms;
      $this->price          = $unit->price;
      $this->plot           = $unit->plot;
      $this->rent_per_month = $unit->rent_per_month;
      $this->sales_status   = $unit->sales_status;
      $this->furniture_pack = $unit->furniture_pack;
	}

   //update
   public function update(){
      // $this->validate([
      //    'unit'           => 'required',
      //    'unit_size'      => 'required',
      //    'price_per_sqft' => 'required'
      // ]);

      $property = Property::where('property_code',$this->unitCode)->first();
      $property->title           = $this->unit;
      $property->bedrooms        = $this->bedrooms;
      $property->floor           = $this->floor;
      $property->size            = $this->size;
      $property->plot            = $this->plot;
      $property->bathrooms       = $this->bathrooms;
      $property->price_per_sqf   = $this->price / $this->size;
      $property->price           = $this->price;
      $property->rent_per_month  = $this->rent_per_month;
      $property->furniture_pack  = $this->furniture_pack;
      $property->sales_status    = $this->sales_status;
      $property->save();

      $this->emit('popModal');
   }


   //confirm
   public function confirm($code){
      $this->unitCode       = $code;
   }

   //delete
   public function delete(){
      Property::where('property_code',$this->unitCode)->delete();
      $this->unitCode = "";
      $this->emit('popModal');
   }


   //delete
   public function close(){
      $this->unitCode = "";
      $this->emit('popModal');
   }

}
