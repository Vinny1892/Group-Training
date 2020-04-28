<?php

namespace App\Http\Controllers;

use App\sala;
use Illuminate\Http\Request;

class SalaController extends Controller
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
     * @param  \App\sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(sala $sala)
    {
        return view('sala.listaSala');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(sala $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sala $sala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(sala $sala)
    {
        //
    }
}
