<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 本契約情報
 *
 * TODO:: 住所がないオフィスは登記上バーチャルぽフィス等を使うらしいが現実問題どうなんだ?
 */
class CreateHrCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_companies', function (Blueprint $table) {
            $table->bigIncrements('id')     ->comment('会社ID');
            $table->string('name')          ->default('')->comment('会社名(商号)');
            $table->string('zipcode')       ->default('')->comment('郵便番号');
            $table->string('address')       ->default('')->comment('住所');
            $table->string('address_other') ->default('')->nullable()->comment('マンション名');
            $table->string('tel')           ->default('')->comment('電話番号');
            $table->string('email')         ->default('')->comment('メール');
            $table->string('representative')->default('')->comment('担当者名');
            $table->string('role')          ->default('')->comment('如家レベル');
            $table->boolean('is_contract')  ->default(false)->comment('契約中判定');
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
        Schema::dropIfExists('hr_companies');
    }
}
