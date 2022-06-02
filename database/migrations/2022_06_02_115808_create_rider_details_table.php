<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('vehical_type');
            $table->string('mobile');
            $table->date('license_validity');
            $table->string('vehical_no');
            $table->string('driver_license');
            $table->string('driver_image');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rider_details');
    }
}
