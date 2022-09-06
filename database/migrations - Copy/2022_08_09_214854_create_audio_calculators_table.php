<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_calculators', function (Blueprint $table) {
            $table->id();
            $table->integer('dbu')->nullable();
            $table->double('dbu_rms_voltage',8,5);
            $table->integer('dbv')->nullable();
            $table->double('dbv_rms_voltage',8,5);
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
        Schema::dropIfExists('audio_calculators');
    }
}
