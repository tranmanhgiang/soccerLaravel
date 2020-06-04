<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindAmatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_amatch', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time',0);
            $table->string('lease');
            $table->string('stadium');
            $table->string('address');
            $table->tinyInteger('allow');	
            $table->tinyInteger('status');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('clubs');
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
        Schema::dropIfExists('findAmatch');
    }
}
