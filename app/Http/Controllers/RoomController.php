<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



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


    public function insert(Request $request)
    {
        $room = new Room();
        $room->phonecompany = $request->get('phonecompany');
        $room->model = $request->get('model');
        $room->price = $request->get('price');        
        $room->save();
        return ('Phone has been successfully added');
    }

}