<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackcontrolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('feedbackcontrol', function (Blueprint $table) {
            $table->increments('id');                    
            $table->string('user_document_evaluated');            
            $table->date('date');
            $table->string('notes',4000)->nullable();
            $table->string('status',20);
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
        Schema::dropIfExists('feedbackcontrol');
    }
}
