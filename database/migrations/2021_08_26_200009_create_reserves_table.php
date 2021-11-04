<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('名前');
            $table->string('kana')->default('')->comment('カナ');
            $table->string('tel')->default('')->comment('電話番号');
            $table->string('email')->default('')->comment('メールアドレス');
            $table->dateTime('reserve_date')->comment('予約日時');
            $table->text('remarks')->default('')->comment('備考');
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
        Schema::dropIfExists('reserves');
    }
}
