<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class Room extends Eloquent
{

    // protected $ connection = 'mongodb' ;
    // protected $ collection = 'room' ;
    protected $fillable = ['image', 'title', 'modality', 'description','public', 'key', 'place', 'standard_time', 'date', 'user_id', 'tags', "id_categories"];


    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }
}

/**
*   
*	@return retorna o objeto com os dados salvos no BD
*/

public function store(Request $request)
{
    return Categoria::create(
        [
	        "title" => "$request->title",
	        "description"=> "$request->description",
	        "public"=> "$request->public",
	        "key" => "$request->key",
	        "place"=> "$request->place",
	        "standard_time"=> "$request->standard_time",
	        "id_categories"=> "$request->id_categories",
	        "modality"=> "$request->modality",
	        "id_tags"=> "$request->id_tags",
	        "id_users"=> "$request->id_users",
	        "date"=> [
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
	    	]
	        "image"=> "img/room/777.png",/*criar um metodo faz faz cria o caminho da imagem*/
        ]

	);
}


/*
exemplo json
{
	"room": {
		"id": "777",
		"image": "img/room/777.png",
		"title": "futesal na praça das araras",
		"public": "true",
		"key": null,
		"place": "praça das araras",
		"standard_time": "19:00",
		"id_categories": [4, 55, 94, 23],
		"modality": "futsal", ??? ou id_modality?
		"tags": ["amigos", "cerveja", "praça", "praça das araras", "corno", "habilidade"],
		"description": "Futebol de salão",
		"user_id": [55, 110, 119],
		"date": {
			"repeat": [
			 	"weekly",
				"Friday",
			  	{"start_date": "01/05/2020"},
				{"end date": "29/05/2020"},
				{"number_of_repetitions": 5}
			],
			"custom_schedules": [
			  {
					"data": "8/05/2020",
					"schedule": "18:00"
				},
				{
					"data": "15/05/2020",
					"schedule": "07:00"
				}
			]
		}
	}
}
*/