<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDepositWithdrawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_deposit_withdraw', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('phuong_thuc');
            $table->integer('number_momo')->nullable();
            $table->integer('number_money');
            $table->integer('status');
            $table->integer('active');
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
        Schema::dropIfExists('history_deposit_withdraw');
    }
}
