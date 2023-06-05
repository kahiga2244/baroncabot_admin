<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
   protected $table = 'buyers';

   protected $fillable = [
      'signature',
      'payment_id',
      'first_name',
      'last_name',
      'email',
      'title',
      'phone_number',
      'passport',
      'payment_id',

   ];
}
