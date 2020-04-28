<?php

namespace App\Http\Controllers;

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
        return view('dashboard.index' );

    }

    public function login()
    {
        echo 'seila';
    }
    //
}
