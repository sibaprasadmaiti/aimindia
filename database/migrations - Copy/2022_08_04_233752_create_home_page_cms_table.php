<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_cms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content1')->nullable();
            $table->string('content2')->nullable();
            $table->string('content3')->nullable();
            $table->string('content4')->nullable();
            $table->enum('status',['on','off'])->default('on');
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
        Schema::dropIfExists('home_page_cms');
    }
}
