<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * お知らせとお知らせカテゴリの中間テーブル
 */
class CreateNewsNewsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_news_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->comment('リレーションのキー');
            $table->integer('news_category_id')->comment('リレーションのキー');
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
        Schema::dropIfExists('news_news_category');
    }
}
