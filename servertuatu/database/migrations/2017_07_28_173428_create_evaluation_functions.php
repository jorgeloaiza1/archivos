<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('evaluation_functions', function (Blueprint $table) {
            $table->increments('id');        
            $table->integer('user_id');
            $table->string('user_document_evaluated');            
            $table->integer('function_id');
            $table->integer('value')->default(0);
            $table->string('description',4000)->nullable();
            $table->integer('evaluation_id');            
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
        //
        Schema::dropIfExists('evaluation_functions');
    }
}
