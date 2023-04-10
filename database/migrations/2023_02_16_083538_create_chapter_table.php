<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('truyen_id');
            $table->string('tieude');
            $table->string('tomtat');
            $table->text('noidung');
            $table->integer('kichhoat');
            $table->string('slug_chapter');
            $table->timestamps();

            $table->foreign('truyen_id')->references('id')->on('truyen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter');
    }
}
