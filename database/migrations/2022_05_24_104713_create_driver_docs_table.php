<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            $table->string('number');
            $table->string('designation');
            $table->string('dl_file');
            $table->string('dl_no');
            $table->string('pan_file');
            $table->string('pan_no');
            $table->string('adhar_file');
            $table->string('adhar_no');
            $table->string('rc_file');
            $table->string('insurance_file');

            $table->enum('status', ['A', 'I']);
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
        Schema::dropIfExists('driver_docs');
    }
}
