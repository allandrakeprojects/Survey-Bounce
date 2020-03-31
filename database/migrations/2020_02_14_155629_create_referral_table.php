<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('referral');
            $table->integer('referral_by');

            $table->integer('referral_amount');

            $table->string('status',25);
            $table->string('from_platform',25);

            $table->timestamps();
            $table->string('extra',255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral');
    }
}
