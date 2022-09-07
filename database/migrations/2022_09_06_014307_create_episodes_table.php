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
        // 'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description'
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->integer('noInSeason');
            $table->string('titleCard');
            $table->string('title');
            $table->string('directedBy');
            $table->string('writenBy');
            $table->string('originalAirDate');
            $table->string('description', 5048);
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
        Schema::dropIfExists('episodes');
    }
};
