<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPublishedColumnToArticlesTable extends Migration {

    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('published')->default(true);
        });
    }
    
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }

}