<?php

namespace App\Http\Controllers;

use App\HomePage;
use ArrayObject;
use Illuminate\Http\Request;

class Category
{
    public $url;
    public $name;
    public $activeUsers;
}

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
       
        
        $futebol = new Category();
        $futebol->url = 'https://www.folhape.com.br/obj/0/346222,475,80,0,0,475,365,0,0,0,0.jpg';
        $futebol->name = 'Futebol';
        $futebol->activeUsers = 18;
        
        $volei = new Category();
        $volei->url = 'https://www.cbnmaringa.com.br/uploads_lg/45566b71e4f4e4a9375e8382db9ac037.png';
        $volei->name = 'Volei';
        $volei->activeUsers = 12;
        
        $basquete = new Category();
        $basquete->url = 'https://www.maranhaoesportes.com/wp-content/uploads/2019/10/Betsul_Os-brasileiros-da-NBA_liga-de-basquete-americana-tem-quatro-brasileiros-em-a%C3%A7%C3%A3o-800x445.jpg';
        $basquete->name = 'Basquete';
        $basquete->activeUsers = 12;
        
        $categories = array($futebol, $volei, $basquete);

        return view('home.homePage', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
