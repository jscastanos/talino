<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTables extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('name')->unique();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->integer('branch_id')->nullable();
        });

        Schema::create('branch_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'branch');
        });

    }

    public function down()
    {

        Schema::dropIfExists('branch_slugs');
        Schema::dropIfExists('branches');
    }
}
