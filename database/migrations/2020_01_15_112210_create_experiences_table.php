<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('from_month')->nullable();
            $table->string('from_year')->nullable();
            $table->string('to_month')->nullable();
            $table->string('to_year')->nullable();
            $table->string('specialization')->nullable();
            $table->string('role')->nullable();
            $table->string('industry')->nullable();
            $table->string('position_level')->nullable();
            $table->longText('description', 500)->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
