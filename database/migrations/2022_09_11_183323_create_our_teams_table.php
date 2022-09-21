<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->text('team_section_title')->nullable();
            $table->string('team_image')->nullable();
            $table->string('team_name')->nullable();
            $table->string('team_position')->nullable();
            $table->string('team_email')->nullable();
            $table->string('team_phone')->nullable();
            $table->string('team_pinterest_link')->nullable();
            $table->string('team_twitter_link')->nullable();
            $table->string('team_facebook_link')->nullable();
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
        Schema::dropIfExists('our_teams');
    }
}
