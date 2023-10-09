<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_inventaris');
            $table->string('keterangan');
            $table->string('kondisi');
            $table->integer('jumlah');
                $table->integer('jenis_id')->unsigned();
                $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->date('tanggal_register');
                $table->integer('ruang_id')->unsigned();
                $table->foreign('ruang_id')->references('id')->on('ruang')->onDelete('cascade');
            $table->integer('kode_inventaris');
                $table->integer('users_id')->unsigned();
                $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('inventaris');
    }
}
