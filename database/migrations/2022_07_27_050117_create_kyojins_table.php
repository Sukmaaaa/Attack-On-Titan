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
        Schema::create('kyojins', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('species');
            $table->string('gender');
            $table->integer('height');
            $table->integer('weight');
            $table->date('birthday');
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
        Schema::dropIfExists('kyojins');
    }
};
