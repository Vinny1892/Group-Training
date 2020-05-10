<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;



class RoomController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        return view('room.chat');
    }

    /*todas as salas de uma determinada modalidade*/
    public function allRoom(){
        return view('room.rooms');
    }
    /**
     * lista todas as minhas salas
    */
    public function myRoom(){
        return view('room.myRooms');
    }

    public function store(Request $request)
    {
        return Room::create(
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
                ],
                "image"=> "img/room/777.png",/*criar um metodo faz faz cria o caminho da imagem*/
            ]
        );
    }

    /**
    * metodo para retornar todas as tags dessa sala
    * @return talvez retornar as model as tags, ou só os nomes
    */
    public function tags(Room $room){
        
        //return;
    }

    /**
    * metodo para retornar todas as categories dessa sala
    * @return talvez retornar as model as categories, ou só os nomes
    */
    public function categories(Room $room){
        
        //return;
    }

}