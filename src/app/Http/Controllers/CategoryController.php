<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('category.formCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($data, [
            "name" => ["required","string", "max:25"],
            "description" => ["required" , "string" , "max:60"]
        ]);
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
