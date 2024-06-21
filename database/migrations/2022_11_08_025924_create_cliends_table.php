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
        Schema::create('cllient', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ktp');
            $table->string('alamat');
            $table->string('no_tlpn');
            $table->string('sn_out');
            $table->string('odp');
            $table->string('kecepatan_jaringan');
            $table->string('teknisi');
            $table->string('ket');
            $table->string('interface');
            $table->string('lat');
            $table->string('long');
            $table->string('panjang_kabel');
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
        Schema::dropIfExists('infotanahs');
    }
};
