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

    public function minhaLista(){
    	return view('room.listaMeusChats');
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

}