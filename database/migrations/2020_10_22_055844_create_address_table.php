<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->comment('住址編號');
            $table->string('address')->comment('住址');
            $table->foreignId('B_ID')->comment('棟名(外部鍵)');
            $table->char('phone')->nullable()->comment('聯絡電話');
            $table->foreign('B_ID')->references('id')->on('building')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
