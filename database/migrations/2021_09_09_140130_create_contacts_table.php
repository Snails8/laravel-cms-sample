<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company')->comment('会社名');
            $table->string('name')->default('')->comment('担当者名');
            $table->string('email')->default('')->comment('メールアドレス');
            $table->string('tel')->default('')->comment('電話番号');
            $table->integer('employee_count')->comment('従業員数');
            $table->integer('contact_type')->comment('お問い合わせ内容(タイプ)');
            $table->text('detail')->default('')->comment('内容詳細');
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
        Schema::dropIfExists('contacts');
    }
}
