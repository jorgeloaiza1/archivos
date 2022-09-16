<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowedAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('allowed_accounts', function (Blueprint $table) {
            $table->string('id');
            $table->string('email')->index();
            $table->string('names');
            $table->string('city');
            $table->string('job_title')->nullable();
            $table->primary('id');
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
        Schema::dropIfExists('allowed_accounts');
    }
}
