<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('evaluators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->index();
            $table->string('user_name');
            $table->string('user_job_title');
            $table->string('user_job_title_link')->nullable();
            $table->string('user_photo_link')->nullable();            
            $table->string('user_job_title_type');
            $table->string('evaluator_id')->index();
            $table->string('evaluator_name');
            $table->string('evaluation_type');
            $table->decimal('weight',3,2);
            $table->boolean('evaluate_functions');
            $table->boolean('evaluate_skills');
            $table->boolean('functions_done')->default(0);
            $table->boolean('skills_done')->default(0);
            $table->unique(['user_id', 'evaluator_id']);
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
        Schema::dropIfExists('evaluators');
    }
}
