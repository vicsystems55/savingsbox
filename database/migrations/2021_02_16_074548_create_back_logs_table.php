<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_logs', function (Blueprint $table) {
            $table->id();
            $table->string('backlog_amount');
            $table->string('custom_name');
            $table->string('package_name');
            $table->bigInteger('user_id')->unsigned();
            $table->string('status')->default('active');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('back_logs');
    }
}
