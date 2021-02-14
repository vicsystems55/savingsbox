<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('marital_status')->nullable();
            // $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('home_address')->nullable();

            $table->string('phone1')->nullable();

            $table->string('phone2')->nullable();

            $table->string('phone3')->nullable();

            $table->string('nature_of_business')->nullable();
            $table->string('office_address')->nullable();

            $table->string('nok_fullname')->nullable();
            $table->string('nok_gender')->nullable();
            $table->string('nok_phone')->nullable();
            $table->string('nok_relationship')->nullable();
            $table->string('nok_address')->nullable();

           
            $table->string('recipient_code')->nullable();
            $table->string('Auth_Code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();

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
        Schema::dropIfExists('user_profiles');
    }
}
