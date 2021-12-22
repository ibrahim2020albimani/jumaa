<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhotbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khotbas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('hijri_day');
            $table->string('hijri_month');
            $table->string('hijri_year');
            $table->string('word_file_url');
            $table->string('pdf_file_url');
            $table->integer('cate_id')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('khotbas');
    }
}
