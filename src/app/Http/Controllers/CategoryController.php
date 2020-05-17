<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;

class CategoryController extends Controller
{


    /**
     * Show the form for creating a new resource and    Display a listing of the resource.
    .
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public   function create()
    {
        $categorys = Category::all();
        return view('category.formCreate' , \compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->only(['name','description']), [
            "name" => ["required","string", "max:25"],
            "description" => ["required" , "string" , "max:60"]
        ]);
       if ($validator->fails() )  return  Redirect::route('category')->withErrors($validator)->withInput() ;
        try{
        Category::create([
            "name" => $request->name,
            "description"=> $request->description,
        ]);
         return Redirect::route('category')->with("message","Categoria Criada Com Sucesso");
        } catch (Exception $exception){
            echo "Erro ao inserir categoria";
        }

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
