<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_schedules', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('package_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();

            $table->date('date');
            
            $table->string('custom_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('deduction_amount');
            $table->string('backlog_amount')->nullable();
            $table->string('frequency');
            $table->string('authorization_code');
            $table->string('deducted_amount')->default('0');
            $table->string('left_over')->default('0');
            $table->string('trial_times')->default('0');

            $table->string('status')->default('active');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('package_id')->references('id')->on('reliance_packages');
            $table->foreign('profile_id')->references('id')->on('user_profiles');
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
        Schema::dropIfExists('payment_schedules');
    }
}
