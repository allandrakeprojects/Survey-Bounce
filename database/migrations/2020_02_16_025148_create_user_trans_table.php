<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');

            $table->enum('purpose', ['user_account_create', 'refer_user', 'share_post']);
            $table->enum('type', [null, 'send', 'receive']); // user_account_create, refer_user, share_post
            $table->string('status',25);

            $table->string('title',255);
            $table->string('description',255);


            $table->double('amount', 8, 2);
            $table->string('extra',25);

            // $table->integer('title');

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
        Schema::dropIfExists('user_trans');
    }
}
