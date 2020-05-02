<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->string('title');
            $collection->string('slug');
            $collection->text('description');
            $collection->string('image');
            $collection->boolean('public'); /* verificar como armazena boolean*/
            $collection->$array('id_rooms');/* verificar como armazena array*/
            $collection->$array('id_categories');/* verificar como armazena array*/
            $collection->$array('id_users');/* verificar como armazena array*/
            $collection->$array('id_tags');/* verificar como armazena array*/
            $collection->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
