<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('dh_id');
            $table->integer('dh_tongtien');
            $table->string('dh_nguoinhan');
            $table->string('dh_sdt');
            $table->text('dh_diachi');
            $table->integer('dh_trangthai');
            $table->timestamps();
            //Tao khoa ngoai
            // $table->bigInteger('nv_id')->unsigned();
            $table->bigInteger('kh_id')->unsigned();
            // $table->foreign('nv_id')->references('nv_id')->on('nhanvien');
            $table->foreign('kh_id')->references('kh_id')->on('khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
