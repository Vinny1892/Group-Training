<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenssageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menssage_contents', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->$integer('id_rooms');/* verificar como armazena int*/
            $collection->text('description');
            $collection->timestamps();
        });
    }
/*
        criar um nova migration para o objeto msg da cvs da sala
        id_room
        salvar o objeto msg
        let messageObject = {
        author: user.name,
        id: user._id,
        message: message.value,
        time: new Date().toLocaleTimeString()
    }
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menssage_contents');
    }
}
