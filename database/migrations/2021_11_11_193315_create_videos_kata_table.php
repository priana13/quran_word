<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosKataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_kata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_id');
            $table->foreignId('kata_id');
            $table->foreignId('user_id');
            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('kata_id')->references('id')->on('kata');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('videos_kata');
    }
}
