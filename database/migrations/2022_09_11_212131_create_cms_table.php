<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('menu_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('content')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('sequence')->nullable();
            $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');
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
        Schema::dropIfExists('cms');
    }
}
