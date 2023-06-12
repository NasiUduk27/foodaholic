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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_id_produk_foreign');
            $table->dropColumn('id_produk');
            $table->dropColumn('qty');
            $table->renameColumn('nominal', 'total');
            $table->integer('bayar')->default(0)->after('nominal');
            $table->string('bayar_type', 1)->nullable()->after('bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};