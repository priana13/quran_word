<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyatSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayat_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ayat_id');
            $table->foreignId('surat_id');
            $table->foreign('ayat_id')->references('id')->on('ayat');
            $table->foreign('surat_id')->references('id')->on('surat');
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
        Schema::dropIfExists('ayat_surat');
    }
}
