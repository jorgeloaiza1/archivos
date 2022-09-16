<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('functions', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('job_title')->index();
            $table->string('description',4000);
            $table->string('time')->nullable();
            $table->string('type')->nullable(); 
            $table->tinyInteger('order');           
            //$table->timestamps();                      
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('functions');
    }
}
