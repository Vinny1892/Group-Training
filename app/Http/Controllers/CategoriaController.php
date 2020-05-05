<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
       return Categoria::create(
           ["Teste"=> [
            "room" => [
                "id"=> "777",
                "image"=> "img/room/777.png",
                "title" => "futesal na praça das araras",
                "public"=> "true",
                "key" => null,
                "place"=> "praça das araras",
                "standard_time"=> "19:00",
                "id_categories"=> [4, 55, 94, 23],
                "modality"=> "futsal",
                "tags"=> ["amigos", "cerveja", "praça", "praça das araras", "corno", "habilidade"],
                "description"=> "Futebol de salão",
                "user_id"=> [55, 110, 119],
                "date"=> [
                    "repeat"=> [
                         "weekly",
                        "Friday",
                          ["start_date" => "01/05/2020"],
                        ["end date"=> "29/05/2020"],
                        ["number_of_repetitions"=> 5]
                    ],
                    "custom_schedules"=> [
                      [
                            "data"=> "8/05/2020",
                            "schedule"=> "18:00"
                      ],
                        [
                            "data"=> "15/05/2020",
                            "schedule"=> "07:00"
                        ]
                    ]
                ]
            ]
        ]
           ]
          
    );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
