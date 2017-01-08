<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owncodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('program_language',50);
            $table->string('IDE',50);
            $table->text('description');
            $table->integer('userID')->unsigned();
            $table->date('creation_date');
            $table->binary('imagedata');
            $table->timestamps();
            $table->integer('likes');
            $table->integer('dislikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeimages');
    }
}
