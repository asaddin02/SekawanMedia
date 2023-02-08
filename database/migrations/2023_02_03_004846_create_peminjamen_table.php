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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->foreignId('id_driver');
            $table->foreign('id_driver')->references('id')->on('drivers');
            $table->date('tanggal_peminjaman');
            $table->string('tujuan');
            $table->string('durasi_peminjaman');
            $table->enum('status',['menunggu persetujuan','disetujui','ditolak']);
            $table->string('keterangan');
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
        Schema::dropIfExists('peminjamen');
    }
};
