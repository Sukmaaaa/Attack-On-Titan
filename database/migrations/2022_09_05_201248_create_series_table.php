<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'cover', 'trailer', 'title', 'series' , 'article',  'countryOfOrigin', 'originalNetwork', 'originalRelease'
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('trailer');
            $table->string('title');
            $table->string('article', 5048);
            $table->string('countryOfOrigin');
            $table->date('originalRelease');
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
        Schema::dropIfExists('series');
    }
};