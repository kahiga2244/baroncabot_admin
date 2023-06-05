<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
   protected $table = 'businesses';
   // protected $fillable = [
   //    // 'id',
   //    'business_code'
   // ];

   // public function users(){
   //    return $this->hasMany(User::class, 'business_code', 'business_code');
   // }
}
