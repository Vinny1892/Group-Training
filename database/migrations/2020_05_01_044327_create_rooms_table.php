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
     * title: titulo, nome
     * description: descricao
     * public: sala plublica ou privada
     * key: senha da sala privada
     * standard_time: horario padrao do evento
     * id_categories: array de id de categorias
     * modality: modalidade, tipo do esporte, volei, futesal ...
     * tags
     * user_id
     * image
     * date: objeto json com dado
                     "repeat"=> [
                        "weekly"=> "$request->date->weekly",
                        "Friday"=> "$request->date->Friday",
                        "start_date" => "$request->date->start_date",
                        "end_date"=> "$request->date->end_date",
                        "number_of_repetitions"=> "$request->date->number_of_repetitions"
                    ],
                    "custom_schedules"=> [
                        [
                            "data"=> "$request->custom_schedules->data",
                            "schedule"=> "$request->custom_schedules->schedule"
                        ]
                    ]
     * 
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $collection) {
            $collection->bigIncrements('id');
            $collection->string('slug');
            $collection->string('title');
            $collection->text('description');
            $collection->boolean('public'); /* verificar como armazena boolean*/
            $collection->string('key');/* talvez criptografar*/
            $collection->string('place');
            $collection->string('standard_time');
            $collection->string('modality');
            $collection->string('date');
            $collection->string('image');
            $collection->string('id_tags');
            $collection->string('id_categories');
            $collection->string('id_users');
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
