<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamps();
            $table->string('note')->nullable();
            $table->string('websites')->nullable();
            $table->string('tbd')->nullable();
            $table->binary('image1')->nullable();
            $table->binary('image2')->nullable();
            $table->binary('image3')->nullable();
            $table->binary('image4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notes');
    }
}
