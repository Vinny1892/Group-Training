<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Support\Str;

class Modality extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'modality' ;
    protected $fillable = ['name', 'description', 'rooms_id', 'pathImage'];

    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst(strtolower($value));
    	$this->attributes['slug'] = strtolower(Str::slug($value));//cria slug automaticamente
    	//$this->attributes['pathImage'] = strtolower(Str::slug($value));//cria slug automaticamente
    }	


    public static function updateListRooms(Modality $modality, $room_id){
        //$modality->rooms_id é um array   array(0) { }
        // var_dump($modality->rooms_id);
        // exit;
        //dd($modality->rooms_id);
        $rooms_id = $modality->rooms_id;
        array_push($rooms_id, $room_id);
        $modality->update( ['rooms_id' => $rooms_id] );
    }

    public static function saveImg($file, $name){
        $destinationPath = 'image/modality/'; // upload path
        $profileImage = strtolower(Str::slug($name)).".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        return $destinationPath.$profileImage;
    }
}