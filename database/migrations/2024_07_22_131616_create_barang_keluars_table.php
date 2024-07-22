<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->integer('stock');
            $table->date('tanggal');
            $table->string('penerima',255);
            $table->timestamps();
            $table->foreign('barang_id','barang_keluar_foreign')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropForeign('barang_keluar_foreign');
            $table->dropColumn('barang_id');
        });
        Schema::dropIfExists('barang_keluars');
    }
}
