<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_wallet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('waiting_money')->default('0')->nullable();
            $table->string('available_money')->default('0')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_date')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('card_address')->nullable();
            $table->string('card_city')->nullable();
            $table->string('card_country')->nullable();
            $table->string('card_state')->nullable();
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
        Schema::dropIfExists('account_wallet');
    }
}
