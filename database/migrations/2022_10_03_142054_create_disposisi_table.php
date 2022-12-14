<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->index();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('pusat_id')->unsigned()->index();
            $table->foreign('pusat_id')->references('id')->on('pusat')->onDelete('cascade');
            $table->bigInteger('karyawan_id')->unsigned()->index();
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->bigInteger('transportasi_id')->unsigned()->index();
            $table->foreign('transportasi_id')->references('id')->on('transportasi')->onDelete('cascade');
            $table->bigInteger('penginapan_id')->unsigned()->index();
            $table->foreign('penginapan_id')->references('id')->on('penginapan')->onDelete('cascade');
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
        Schema::dropIfExists('disposisi');
    }
}
