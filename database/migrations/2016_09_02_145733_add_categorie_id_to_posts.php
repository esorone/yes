<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategorieIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //unsigned betekent dat er geen - getal kan zijn in de id
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('categorie_id')->nullable()->after('slug')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('categorie_id');
        });
    }
}
