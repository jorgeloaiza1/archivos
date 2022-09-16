<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {
            $table->string('document')->unique();            
            $table->string('job_title');
            $table->string('photo',500);
            $table->string('oauth',500)->nullable();
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::table('users', function($table) {
            $table->dropColumn('document');
            $table->dropColumn('job_title');
            $table->dropColumn('photo');
            $table->dropColumn('oauth');
            $table->dropColumn('is_admin');
            $table->dropColumn('is_active');
        });
    }
}
