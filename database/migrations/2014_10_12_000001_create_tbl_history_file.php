<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHistoryFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_history_file', function (Blueprint $table) {
            $table->id();
            $table->string('kode_file');
            $table->text('path_file');
            $table->text('keterangan');
            $table->smallInteger('status_upload')->default(0);
            // 0 = sedang upload
            // 1 = berhasil upload
            // 99 = gagal upload
            $table->foreignId('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_history_file');
    }
}
