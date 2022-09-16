<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');                    
            $table->string('user_document_evaluated');            
            $table->string('notes1',4000)->nullable();
            $table->string('notes2',4000)->nullable();
            $table->string('notes3',4000)->nullable();
            $table->integer('evaluation_id');
            $table->boolean('is_closed')->default(0);
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
        Schema::dropIfExists('feedback');
    }
}
