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
            /*$collection->bigIncrements('modality_id');*/
            $collection->string('name')->unique();
            $collection->string('slug')->unique();
            $collection->text('description');
            $collection->json('rooms_id');
            /*$collection->json('tags_id');
            $collection->json('categories_id');*/
            $collection->string('pathImage');
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
