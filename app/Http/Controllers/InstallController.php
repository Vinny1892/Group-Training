<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function __construct()
    {
    }

    public function showPageRootRegister(){
        return  view('registerRoot');
    }

}
