<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('about_section_image1')->nullable();
            $table->string('about_section_image2')->nullable();
            $table->string('about_section_video_link')->nullable();
            $table->string('about_section_title')->nullable();
            $table->text('about_section_description')->nullable();
            $table->string('fact_counter_image')->nullable();
            $table->string('fact_counter1')->nullable();
            $table->string('fact_counter1_title')->nullable();
            $table->string('fact_counter2')->nullable();
            $table->string('fact_counter2_title')->nullable();
            $table->string('fact_counter3')->nullable();
            $table->string('fact_counter3_title')->nullable();
            $table->string('legal_section_title')->nullable();
            $table->text('legal_section_description')->nullable();
            $table->string('legal_section_image')->nullable();
            $table->string('legal_section_image_title')->nullable();
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
        Schema::dropIfExists('organisations');
    }
}
