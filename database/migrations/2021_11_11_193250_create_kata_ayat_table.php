<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKataAyatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kata_ayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kata_id');
            $table->foreignId('ayat_id');
            $table->string('arti_kontek')->nullable();
            $table->foreign('kata_id')->references('id')->on('kata');
            $table->foreign('ayat_id')->references('id')->on('ayat');
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
        Schema::dropIfExists('kata_ayat');
    }
}
