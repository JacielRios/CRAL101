<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_sends', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('homework_id')->unsigned();
            $table->string('title');
            $table->string('name')->nullable();
            $table->text('body')->nullable();
            $table->string('grade')->nullable();
            $table->string('group')->nullable();
            $table->string('turn')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->integer('quali')->nullable();
            $table->foreign('homework_id')->references('id')->on('homework')->nullable();
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
        Schema::dropIfExists('homework_sends');
    }
}
