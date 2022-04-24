<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->string('grade')->nullable();
            $table->string('group')->nullable();
            $table->string('turn')->nullable();
            $table->string('course')->nullable();
            $table->string('partial_1')->nullable();
            $table->string('partial_2')->nullable();
            $table->string('partial_3')->nullable();
            $table->string('prom')->nullable();
            $table->string('carrer')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('lists');
    }
}
