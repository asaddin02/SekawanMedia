<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peminjaman');
            $table->foreign('id_peminjaman')->references('id')->on('peminjamen');
            $table->integer('level');
            $table->date('tanggal');
            $table->enum('status',['disetujui','ditolak']);
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
        Schema::dropIfExists('persetujuans');
    }
};
