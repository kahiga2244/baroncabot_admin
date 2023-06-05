<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
   protected $table = 'property';

   public function users(){
      return $this->belongsTo(User::class, 'business_code', 'business_code');
   }

}
