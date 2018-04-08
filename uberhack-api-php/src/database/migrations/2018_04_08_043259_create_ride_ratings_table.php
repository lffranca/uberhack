<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ride_id');
            $table->foreign('ride_id')->references('id')->on('rides');

            /*
             * Rating related fields
             */

            $table->unsignedTinyInteger('overall_rating');
            $table->unsignedInteger('modal_problem_id');
            $table->foreign('modal_problem_id')->references('id')->on('modal_problems');
            $table->text('observations')->nullable();

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
        Schema::dropIfExists('ride_ratings');
    }
}
