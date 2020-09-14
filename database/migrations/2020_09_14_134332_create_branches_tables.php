<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTables extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('name')->unique();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->integer('category_id')->nullable();
        });

        Schema::create('category_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'category');
        });

    }

    public function down()
    {

        Schema::dropIfExists('category_slugs');
        Schema::dropIfExists('category');
    }
}
