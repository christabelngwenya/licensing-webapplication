<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('tin_number');
            $table->string('class_type_goods');
            $table->string('vending_details');
            $table->integer('floor_area');
            $table->string('range_number');
            $table->string('address_premises');
            $table->string('license_name');
            $table->string('trading_as');
            $table->string('owner_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
