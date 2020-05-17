<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Support\Str;
use app\Helpers\SlugUnique;

class Room extends Eloquent
{

    // protected $ connection = 'mongodb' ;
    // protected $ collection = 'room' ;
    protected $fillable = ['description', 'public', 'pathImage', 'name', 'modality',  'key', 'place', 'standard_time', 'date', 'id_users', 'tags', 'id_categories', 'repeat', 'locationType', 'id_user_adm'];


    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst(strtolower($value));//ucfirst deixa a primeira letra maiuscula, strtolower deixa tudo minusculo
    	$this->attributes['slug'] = strtolower(Str::slug($value));//cria slug automaticamente
        //$this->attributes['pathImage'] = $name . $this->id;
    }




    // public function setDateAttribute($value){
    // 	$this->attributes['data'] = [
				// 		"repeat"=> [
	   //                      "weekly"=> "$value->weekly",
	   //                      "Friday"=> "$request->date->Friday",
	   //                      "start_date" => "$request->date->start_date",
	   //                      "end_date"=> "$request->date->end_date",
	   //                      "number_of_repetitions"=> "$request->date->number_of_repetitions"
    //                 ],
    //                 "custom_schedules"=> [
    //                     [
    //                         "data"=> "$request->custom_schedules->data",
    //                         "schedule"=> "$request->custom_schedules->schedule"
    //                     ]
    //                 ]
    // 	];

    // }

    /**
     * The attributes that should be cast.

     * pode apagar isso se quiser, só teste msm
     
     * @var array
     */
    protected $casts = [
        'id_tags' => 'array',
        'id_users' => 'array',
        'id_categories' => 'array',
        'repeat' => 'array',
        'start_date' => 'datetime:d-m-Y',
        'end_date' => 'datetime:d-m-Y',
    ];

    /**
    * retorna todas as salas de um usuario
    */
    public function getAllRoomsOfUser(){
        return Room::select([
            'rooms.*',
            'last_posted_at' => Post::selectRaw('MAX(created_at)')
                    ->whereColumn('', '.')
        ])->get();
    }

    

    
}
