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


    public static function updateListRooms($modality, $room_id, $oldModalityID = -1){
        /*insere idRoom nessa modalidade*/
        if ($modality && $room_id) {
            $modality = Modality::find($modality['_id']);
            $rooms_id = $modality->rooms_id;
            array_push($rooms_id, $room_id);
            $modality->update( ['rooms_id' => $rooms_id] );
            if ($oldModalityID != -1) {
                /*remove idRoom dessa modalidade*/
                $oldModality = Modality::find($oldModalityID);
                $rooms2_id = $oldModality->rooms_id;
                foreach ($rooms2_id as $key => $value) {
                    if ($value == $room_id) {
                        unset($rooms2_id[$key]);
                        break;
                    }
                }
                $oldModality->update(['rooms_id' => $rooms2_id]);
            }
        }
    }

    public static function saveImg($file, $name){
        $destinationPath = 'image/modality/'; // upload path
        $profileImage = strtolower(Str::slug($name)).time().".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        return $destinationPath.$profileImage;
    }

    public static function deleteRoom($modality_id, $room_id){
        $modality = Modality::find($modality_id);
        $rooms_id = $modality->rooms_id;
        foreach ($rooms_id as $key => $value) {
            if ($value == $room_id) {
                unset($rooms_id[$key]);
                break;
            }
        }
        $modality->update(["rooms_id" => $rooms_id]);
    }
}