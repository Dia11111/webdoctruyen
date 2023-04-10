<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->id();
            $table->string("tentruyen");
            $table->string("tomtat");
            $table->unsignedBigInteger("danhmuc_id");
            $table->string("hinhanh");
            $table->string("slug_truyen");
            $table->integer("kichhoat");
            $table->timestamps();

            $table->foreign('danhmuc_id')->references('id')->on('danhmuc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen');
    }
}
