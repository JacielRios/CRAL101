<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_homework', function (Blueprint $table) {
            $table->id();
            $table->text('body');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('homework_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('homework_id')->references('id')->on('homework');
            $table->foreign('parent_id')->references('id')->on('comment_homework');

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
        Schema::dropIfExists('comment_homework');
    }
}
