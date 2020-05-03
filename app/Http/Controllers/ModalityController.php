<?php

namespace App\Http\Controllers;

use App\modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
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
    public function store(Request $request){
        return Modality::create(
            [
                "title" => "$request->title",
                "description"=> "$request->description",
                "id_rooms"=> "$request->id_rooms",
                "id_tags"=> "$request->id_tags",
                "id_categories"=> "$request->id_categories",
                "image"=> "img/room/777.png",/*criar um metodo faz faz cria o caminho da imagem*/
                /*slug*/
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(modality $modality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(modality $modality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modality $modality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(modality $modality)
    {
        //
    }
}
