<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id',10);
            $table->integer('user_id')->unsigned();
            $table->integer('mobil_id')->unsigned();
            $table->string('kode_tran',20);
            $table->timestamp('tgl_order')->nullable();
            $table->string('total_harga',20)->nullable();
            $table->boolean('status_tr')->default(0);
            $table->string('transfer',30)->nullable();
            $table->string('bukti_tf',100)->nullable();
            $table->string('tgl_sewa',30)->nullable();
            $table->string('tgl_akhir_sewa',30)->nullable();
            $table->string('lama_sewa',20)->nullable();
            $table->integer('status_bayar')->default(0);
            $table->boolean('cancel')->default(0);
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
}
