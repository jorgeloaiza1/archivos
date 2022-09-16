<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserevaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'user_id', 'user_document_evaluated','evaluation_id', 'avg_skills','avg_functions'
        Schema::create('evaluation_user', function (Blueprint $table) {
            $table->increments('id');        
            $table->integer('user_id');
            $table->string('user_document_evaluated');                        
            $table->integer('avg_skills')->default(0);
            $table->integer('avg_functions')->default(0);            
            $table->integer('evaluation_id');            
            $table->timestamps();
            $table->unique(['user_document_evaluated', 'evaluation_id']);
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
        Schema::dropIfExists('evaluation_user');
    }
}
