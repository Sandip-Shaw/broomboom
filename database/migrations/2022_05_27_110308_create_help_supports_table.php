<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_supports', function (Blueprint $table) {
            $table->bigIncrements('query_id');
            $table->unsignedBigInteger('user_id');
           
            $table->foreign('user_id')->references('id')->on('api_user')->onDelete('cascade');
            $table->string('subject');
            $table->string('message');
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
        Schema::dropIfExists('help_supports');
    }
}
