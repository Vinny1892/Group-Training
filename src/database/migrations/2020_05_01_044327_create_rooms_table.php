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
     * name: titulo, nome
     * description: descricao
     * public: sala plublica ou privada
     * key: senha da sala privada
     * standard_time: horario padrao do evento
     * id_categories: array de id de categorias
     * modality: modalidade, tipo do esporte, volei, futesal ...
     * locationType: tipo do local: quadra, praça publica, rua, trilha...
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
            /*$collection->bigIncrements('id');*/
            $collection->string('name')->unique();
            $collection->string('slug')->unique();
            $collection->text('description');
            $collection->boolean('public'); /* verificar como armazena boolean*/
            $collection->string('key');/* talvez criptografar*/
            $collection->string('place');
            $collection->string('standard_time');/*string aon deve ser o melhor jeito*/
            $collection->string('placeType');
            $collection->date('date');
            $collection->string('profileImage');
            $collection->json('tags');
            $collection->json('modality');
            $collection->json('categories');
            $collection->json('users_id');/*json nao deve ser o melhor jeito*/
            $collection->string('id_user_adm');
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
