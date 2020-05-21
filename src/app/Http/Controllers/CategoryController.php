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
        $cardTitle = "Criar Categoria";
        $cardDescription = "criar uma nova categoria";
        $category = null;
        $categorys = Category::all();
        return view('category.form' , \compact('categorys','category','cardTitle','cardDescription'));
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
            "name" => ["required","string", "max:25", "unique:categories,name"],
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($slugCategory)
    {
        $categorys = Category::all();
        $category = Category::where('slug' , $slugCategory)->first();
        $cardTitle = "Editar Categoria $category->name";
        $cardDescription = "editando categoria $category->name";
        return view('category.form',compact('categorys','category','cardTitle','cardDescription'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
       
        $validator = Validator::make($request->only(['name','description']), [
            "name" => ["required","string", "exists:categories,name,_id,$category->_id" , "max:25"],
            "description" => ["required" , "string" , "max:100"]
        ]);
       if ($validator->fails() )  return  Redirect::route('category.edit' , ['slugCategory' => $category->slug ])->withErrors($validator)->withInput() ;
        $category->name = $request->name;
        $category->description = $request->description;
        if( $category->save() )  return Redirect::route('category')->with("message","Categoria Atualizada com Sucesso");
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $slugCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($slugCategory)
    {
        if( Category::where('slug' , $slugCategory)->delete() )  return Redirect::route('category')->with("message","Categoria Deleteada Com Sucesso");

        return  view('errors.404');
        
    }
}
