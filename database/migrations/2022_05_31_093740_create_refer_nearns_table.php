<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferNearnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer_nearns', function (Blueprint $table) {
            $table->bigIncrements('code_id');
            $table->string('code');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('referedBy_id')->nullable();

            $table->timestamps();
            $table->unique(['driver_id','referedBy_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refer_nearns');
    }
}
