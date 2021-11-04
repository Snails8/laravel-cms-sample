<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hr_company_id');
            $table->string('name')   ->default('')->comment('部署・店舗名');
            $table->string('address')->default('')->comment('住所');
            $table->string('tel')    ->nullable()->default('')->comment('店舗番号');
            $table->string('manager')->default('')->comment('部署、店舗代表者名');
            $table->string('post')   ->default('')->comment('代表者役職');
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
        Schema::dropIfExists('hr_offices');
    }
}
