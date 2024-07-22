<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuans', function (Blueprint $table) {
            $table->id();
            $table->string('satuan',255);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('barangs', function (Blueprint $table) {
            $table->foreignId('satuan_id')->after('id');
            $table->foreign('satuan_id','satuan_id_barangs_foreign')->references('id')->on('satuans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign('satuan_id_barangs_foreign');
            $table->dropColumn('satuan_id');
        });
        Schema::dropIfExists('satuans');
    }
}
