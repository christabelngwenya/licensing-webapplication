<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('receipt_number');
            $table->date('expiring_date');
            $table->decimal('license_fees');
            $table->decimal('penalty_fees');
            $table->decimal('other_fees');
         
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
