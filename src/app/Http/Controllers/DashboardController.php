<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request ){
        $user = Auth::user();
        return view('dashboard.panel' , compact('user') );
    }

    public function  editUser($slugName)
    {
        $user = User::where('slug' ,$slugName)->first();
        return view("dashboard.user", compact('user'));
    }

}
