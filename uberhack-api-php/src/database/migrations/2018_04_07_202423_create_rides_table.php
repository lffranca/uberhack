<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('state');
            $table->string('start_coordinates');
            $table->timestamp('started_at')->nullable();
            $table->string('destination_coordinates');
            $table->timestamp('finished_at')->nullable();
            $table->json('path')->nullable();

            $table->unsignedInteger('partner_user_id');
            $table->unsignedInteger('user_id');
            $table->foreign('partner_user_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedTinyInteger('partner_rating')->nullable();
            $table->unsignedTinyInteger('user_rating')->nullable();

            $table->decimal('value', 12, 2);

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
        Schema::dropIfExists('rides');
    }
}
