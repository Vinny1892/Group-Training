<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Support\Str;
use app\Helpers\SlugUnique;
use Illuminate\Support\Facades\Storage;

class Room extends Eloquent
{
    protected $fillable = ['description', 'public', 'name', 'key', 'place', 'standard_time', 'date', 'users_id', 'tags', 'categories', 'modality', 'repeat', 'locationType', 'id_user_adm', 'pathImage'];

    public function setNameAttribute($value){
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = strtolower(Str::slug($value));
    }

    /**
    * retorna todas as salas de um usuario
    */
    public function getAllRoomsOfUser($idUser){
        return Room::where('id_user_adm', '=', $idUser)->get();
    }
    
    public static function saveImg($file, $name){
        $destinationPath = 'image/room/'; // upload path
        $profileImage = strtolower(Str::slug($name)).time().".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        return $destinationPath.$profileImage;
    }

    public static function deleteImg($path){
        if ($path) {
             $retorno = Storage::delete($path);
        }
    }

    

    
}
