<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvgToEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //        
        Schema::table('evaluations', function($table) {
            $table->integer('avg_skills')->default(0);
            $table->integer('avg_functions')->default(0);
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
        Schema::table('evaluations', function($table) {
            $table->dropColumn('avg_skills');
            $table->dropColumn('avg_functions');
        });
    }
}
