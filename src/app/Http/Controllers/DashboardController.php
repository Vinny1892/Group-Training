<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request ){
        $users = User::paginate(6);
        return view('dashboard.panel' , compact('users') );
    }

    public function  editUser($slugName)
    {
        $user = User::where('slug' ,$slugName)->first();
        return view("dashboard.user", compact('user'));
    }

    public function deleteUser($slugName)
    {

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
