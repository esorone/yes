<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('comment');
            $table->integer('post_id')->unsigned();;
            $table->integer('user_id')->unsigned();;
            $table->boolean('aanwezig');
            $table->timestamps();
        });

        Schema::table('comments', function ($table){
           $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::table('comments', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('post_id');
        Schema::dropForeign('user_id');
        Schema::drop('comments');
    }
}
