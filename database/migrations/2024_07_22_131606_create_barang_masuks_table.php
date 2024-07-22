<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->integer('stock');
            $table->date('tanggal');
            $table->string('penerima',255);
            $table->timestamps();
            $table->foreign('barang_id','barang_masuk_foreign')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropForeign('barang_masuk_foreign');
            $table->dropColumn('barang_id');
        });
        Schema::dropIfExists('barang_masuks');
    }
}
