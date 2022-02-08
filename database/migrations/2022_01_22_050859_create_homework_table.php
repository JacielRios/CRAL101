<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->string('grade')->nullable();
            $table->date('date')->nullable();
            $table->string('group')->nullable();
            $table->string('turn')->nullable();
            $table->string('course')->nullable();
            $table->string('carrer')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('homework');

        // Schema::dropIfExists('users');

    }
}
