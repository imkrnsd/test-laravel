<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLogActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_log_activities', function (Blueprint $table) {
            $table->id();
            $table->string('ip_access');
            $table->foreignId('user_id')->constrained();
            $table->text('activity_content');
            $table->longText('url');
            $table->text('operating_system');
            $table->text('device_type');
            $table->text('browser_name');
            $table->string('method');
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
        Schema::dropIfExists('users_log_activities');
    }
}
