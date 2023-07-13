<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nrik')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('id_file_foto')->nullable();
            $table->foreignId('id_unit_kerja')->references('id_unit_kerja')->on('tbl_master_unit_kerja');
            $table->smallInteger('status_data')->default(1);
            $table->smallInteger('is_blokir')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('session_id')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->dateTime('last_activity')->nullable();
            $table->date('expired_password')->default('1970-01-01');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
