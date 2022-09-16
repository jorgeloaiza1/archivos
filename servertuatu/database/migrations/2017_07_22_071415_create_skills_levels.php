<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('skills_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('description');            
            $table->string('job_title_type');
            $table->integer('goal'); 
            $table->unique(['type', 'job_title_type']);             
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
        Schema::dropIfExists('skills_levels');
    }
}
