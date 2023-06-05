<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $table = 'users';

   protected $fillable = [
        'id',
        'name',
        'business_code',
        'role',
   ];

   public function businesses(){
      return $this->belongsTo(Business::class, 'business_code', 'business_code');
   }
   public function properties(){
      return $this->hasMany(Property::class, 'business_code', 'business_code');
   }
}

