<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('money');
            $table->integer('money_gt')->nullable();
            $table->integer('level');
            $table->integer('number_bank')->nullable();
            $table->string('brank_bank')->nullable();
            $table->string('name_bank')->nullable();
            $table->integer('invite_code_father')->nullable();
            $table->integer('invite_code');
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
        Schema::dropIfExists('profile');
    }
}
