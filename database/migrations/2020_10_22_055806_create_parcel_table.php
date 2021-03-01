<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id()->comment('包裹編號');
            $table->foreignId('A_ID')->unsigned()->comment('住址(外部键)');
            $table->boolean('sign')->comment('簽收與否');
            $table->date('sign_date')->default('2018-01-01')->comment('管理員簽收時間');
            $table->char('phone')->comment('聯絡電話');
            $table->date('sign_time')->default('2019-01-01')->nullable()->comment('用戶簽收时间');
            $table->string('Sign_proof')->comment('簽收憑證');
            $table->mediumText('Image')->nullable()->comment('包裹照片');
            $table->string('Qrcode')->nullable()->comment('QRcode');
            $table->foreign('A_ID')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('parcels');
    }
}
