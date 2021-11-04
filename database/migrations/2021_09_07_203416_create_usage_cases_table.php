<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 導入事例 (マークダウンで保存して変換する必要がある)
 */
class CreateUsageCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')     ->default('')->comment('事例タイトル');
            $table->string('image')     ->default('')->nullable()->comment('メイン画像');
            $table->text('introduction')->default('')->comment('導入部');

//            $table->string('h1')        ->nullable()->comment('見出し1');
//            $table->string('q1')        ->nullable()->comment('質問1');
//            $table->text('detail1')     ->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');
//            $table->string('h1')        ->nullable()->default('')->comment('見出し1');
//            $table->text('detail1')->nullable()->default('')->comment('見出し1の内容');

            $table->integer('hr_company_id')->comment('リレーションのキー');
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
        Schema::dropIfExists('usage_cases');
    }
}
