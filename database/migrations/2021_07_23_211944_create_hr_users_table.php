<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hr_company_id')->nullable()->comment('リレーションのキー');
            $table->bigInteger('hr_company_offices_id')->nullable()->comment('リレーションのキー');
            $table->string('last_name')->nullable()->comment('姓');
            $table->string('fast_name')->nullable()->comment('名');
            $table->string('last_name_kana')->nullable()->comment('姓(カナ)');
            $table->string('fast_name_kana')->nullable()->comment('名(カナ)');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('hr_users');
    }
}
