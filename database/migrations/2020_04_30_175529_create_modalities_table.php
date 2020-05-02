<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalities', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->string('title');
            $collection->string('slug');
            $collection->text('description');
            $collection->string('image');
            $collection->$array('id_room');/* verificar como armazena array*/
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
        Schema::dropIfExists('modalities');
    }
}
