<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * サービス利用会社 本契約時
 */
class CreateHrCompanyContractsTable extends Migration
{
    /**
     * Run the migrations.
     * TODO::カード情報はどうする
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_company_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hr_company_id');

            $table->dateTime('contract_date')->comment('本契約日');
            $table->string('credit_card')->comment('クレジットカード情報');
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
        Schema::dropIfExists('hr_company_contracts');
    }
}
