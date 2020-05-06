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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            /* imagem / logo */
            /* tag */
            /* categoria */
            /* modalidade */
            /* $table->boolean('public'); */
            $table->string('slug');
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /*
        array de id dos user[];
    */
    /*
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
        Schema::dropIfExists('rooms');
    }
}
