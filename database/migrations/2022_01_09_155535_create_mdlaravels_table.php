<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdlaravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdlaravels', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("email")->nullable();
            $table->string("jenis_pembayaran")->nullable();
            $table->decimal("nominal")->nullable();
            $table->string("status")->default("pending");
            $table->string("snap_token")->nullable();
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
        Schema::dropIfExists('mdlaravels');
    }
}
