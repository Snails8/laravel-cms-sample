<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('店舗名');
            $table->string('address')->default('')->comment('住所');
            $table->string('tel')->default('')->comment('店舗番号');
            $table->string('manager')->default('')->comment('店舗代表者名');
            $table->string('post')->default('')->comment('代表者役職');
            $table->integer('company_id');
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
        Schema::dropIfExists('offices');
    }
}
