<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentproofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentproofs', function (Blueprint $table) {
         $table->id();
         $table->string('first_name');
         $table->string('last_name');
         $table->string('email')->unique();;
         $table->tinyInteger('phone_number')->unique();
         $table->tinyInteger('passport')->unique();
         $table->string('title');
         $table->string('upload');
         $table->string('signature1', 500)->nullable();
         $table->string('method_of_payment');
         $table->string('city');
         $table->string('address_1');
         $table->string('address_2');
         $table->string('postcode');
         $table->string('state');
         $table->string('country');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentproofs');
    }
}
