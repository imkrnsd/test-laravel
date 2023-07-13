<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterDivisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_divisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_kerja_id')->references('id_unit_kerja')->on('tbl_master_unit_kerja');
            $table->string('nama_divisi');
            $table->smallInteger('status_data')->default(1);
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
        Schema::dropIfExists('tbl_master_divisi');
    }
}
