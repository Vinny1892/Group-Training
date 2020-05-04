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
            $collection->string('slug');
            $collection->string('title');
            $collection->text('description');
            $collection->string('id_rooms');
            $collection->string('id_tags');
            $collection->string('id_categories');
            $collection->string('image');
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
