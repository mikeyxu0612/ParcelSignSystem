<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id()->comment('住户編號');
            $table->string('T_name')->comment('住戶姓名');
            $table->char('phone')->comment('連絡電話');
            $table->foreignId('A_ID')->unsigned()->comment('住址(外部键');
            $table->string('city')->nullable()->comment('縣/市');
            $table->string('area')->nullable()->comment('區/鎮');
            $table->string('road')->nullable()->comment('路段');
            $table->timestamps();
            $table->foreign('A_ID')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
