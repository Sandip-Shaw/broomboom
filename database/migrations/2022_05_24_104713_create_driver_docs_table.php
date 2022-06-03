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
            
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            
            $table->string('dl_file_front');
            $table->string('dl_file_back');
            $table->string('dl_no');

            $table->string('rc_file_front');
            $table->string('rc_file_back');
            $table->string('rc_no');

            $table->string('others_file_front');
            $table->string('others_file_back');
            $table->string('others_no');

            $table->enum('status', ['A', 'I']);
          
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('api_user')->onDelete('cascade');
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
