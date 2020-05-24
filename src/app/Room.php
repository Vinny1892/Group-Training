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
    protected $fillable = ['description', 'public', 'name', 'key', 'place', 'standard_time', 'date', 'users_id', 'tags', 'categories', 'modality', 'repeat', 'locationType', 'id_user_adm', 'pathImage'];


    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst(strtolower($value));//ucfirst deixa a primeira letra maiuscula, strtolower deixa tudo minusculo
    	$this->attributes['slug'] = strtolower(Str::slug($value));//cria slug automaticamente
        //$this->attributes['profileImage'] = strtolower(Str::slug($value));
    }

    /**
    * retorna todas as salas de um usuario
    */
    public function getAllRoomsOfUser($idUser){
        return Room::where('id_user_adm', '=', $idUser)->get();
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
    // protected $casts = [
    //     'repeat' => 'array',
    //     'start_date' => 'datetime:d-m-Y',
    //     'end_date' => 'datetime:d-m-Y',
    // ];

    
    public static function saveImg($file, $name){
        $destinationPath = 'image/room/'; // upload path
        $profileImage = strtolower(Str::slug($name)).".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        return $destinationPath.$profileImage;
    }

    
}
