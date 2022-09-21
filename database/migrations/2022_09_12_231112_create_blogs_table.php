<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('blog_heading')->nullable();
            $table->string('blog_image')->nullable();
            $table->text('blog_title')->nullable();
            $table->text('blog_content')->nullable();
            $table->integer('blog_comment')->nullable();
            $table->string('blog_posted_by')->nullable();
            $table->string('blog_category')->nullable();
            $table->date('blog_posted_date')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
