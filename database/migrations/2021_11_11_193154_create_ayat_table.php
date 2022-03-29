<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayat', function (Blueprint $table) {
            $table->id();
            $table->string('ayat');
            $table->text('deskripsi')->nullable();
            $table->string('arti',100);
            $table->integer('urutan');
            $table->integer('halaman');
            $table->integer('juz');
            $table->foreignId('surat_id');
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
        Schema::dropIfExists('ayat');
    }
}
