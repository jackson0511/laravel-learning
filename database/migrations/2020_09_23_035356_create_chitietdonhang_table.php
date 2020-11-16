<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->bigInteger('sp_id')->unsigned();
            $table->bigInteger('dh_id')->unsigned();
            $table->string('ctdh_giatien');
            $table->integer('ctdh_soluong');
            $table->primary(['sp_id','dh_id']);
            $table->foreign('sp_id')->references('sp_id')->on('sanpham');
            $table->foreign('dh_id')->references('dh_id')->on('donhang');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
