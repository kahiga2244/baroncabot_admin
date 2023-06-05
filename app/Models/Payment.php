<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Payment extends Model
// {
//     use HasFactory;

//     protected $table = 'paymentproofs';

//     public function buyers()
//     {
//         return $this->hasMany(Buyer::class);
//     }
// }
class Payment extends Model
{
    use HasFactory;

    protected $table = 'rerservations_form';

    protected $fillable = [
      'property_name',
      'address_property',
      'agent_name',
        'plot_no',
        'unit_no',
        'unit_size',
        'unit_price',
        'type',
        'total_price',
        'address_1',
        'state',
        'address_2',
        'postcode',
        'city',
        'country',
        'upload',
  ];

    public function buyers()
    {
        return $this->hasMany(Buyer::class);
    }
}
