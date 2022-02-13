<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->bigIncrements('id',10);
            $table->string('model',20)->nullable();
            $table->string('tahun',20)->nullable();
            $table->string('transmisi',20)->nullable();
            $table->string('kapasitas',20)->nullable();
            $table->string('merk',20)->nullable();
            $table->string('harga',20)->nullable();
            $table->string('no_kendaraan',10)->nullable();
            $table->integer('status')->default(0);
            $table->string('image',100)->nullable();
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
        Schema::dropIfExists('mobils');
    }
}
