<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Category;
use App\Modality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.admin')->except('editUser');

    }

    public function show(Request $request ){
        $allRooms = Room::all();
        $users = User::all();
        $usersTotal = User::count(); 
        $categorysTotal =  Category::count();
        $modalityTotal= Modality::count();
        $roomsTotal = Room::count();
        //dd($users);
        return view('dashboard.panel' , compact('users', 'usersTotal' , "categorysTotal" , "modalityTotal" , "roomsTotal",'allRooms'));
    }

    public function  editUser($slugName)
    {
        $user = User::where('slug' ,$slugName)->first();
        return view("dashboard.user", compact('user'));
    }

    public function deleteUser($slugName)
    {
        if($slugName === Auth::user()->slug) return  view('errors.403');

        if( User::where('slug' , $slugName)->delete() )  return Redirect::route('dashboard')->with("message","Usuario Deleteado Com Sucesso");
        

        return  view('errors.404');
        
    }
    public function makeAdmin($slugName)
    {
        $user = User::where('slug', $slugName)->first();
        if($user->role === 'admin'){ 
            $message = "Usuario $user->name foi rebaixado";
            $user->role = "normal"; 
        }
        else{ 
            $message = "Usuario $user->name tornou-se administrador, Com grandes Poderes vem grandes responsabilidades!";
            $user->role = "admin"; 
        }

        $user->update();
        return Redirect::route('dashboard')->with('message' , $message);
    }

}
