<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;

class TagController extends Controller
{


    /**
     * Show the form for creating a new resource and    Display a listing of the resource.
    .
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public   function create()
    {
        $cardTitle = "Criar Tag";
        $cardDescription = "criar uma nova Tag";
        $tag = null;
        $tags = Tag::paginate(6);
        return view('tag.form' , \compact('tags','tag','cardTitle','cardDescription'));
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
       if ($validator->fails() )  return  Redirect::route('tag')->withErrors($validator)->withInput() ;
        try{
        Tag::create([
            "name" => $request->name,
            "description"=> $request->description,
        ]);
         return Redirect::route('tag')->with("message","Tag Criada Com Sucesso");
        } catch (Exception $exception){
            echo "Erro ao inserir Tag";
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit($slugtag)
    {
        $tags = Tag::all();
        $tag = Tag::where('slug' , $slugtag)->first();
        $cardTitle = "Editar Tag $tag->name";
        $cardDescription = "editando Tag $tag->name";
        return view('tag.form',compact('tags','tag','cardTitle','cardDescription'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {
       
        $validator = Validator::make($request->only(['name','description']), [
            "name" => ["required","string", "unique:categories,name,_id,$tag->_id" , "max:25"],
            "description" => ["required" , "string" , "max:100"]
        ]);
       if ($validator->fails() )  return  Redirect::route('tag.edit' , ['slugtag' => $tag->slug ])->withErrors($validator)->withInput() ;
        $tag->name = $request->name;
        $tag->description = $request->description;
        if( $tag->save() )  return Redirect::route('tag')->with("message","Tag Atualizada com Sucesso");
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $slugtag
     * @return \Illuminate\Http\Response
     */
    public function destroy($slugtag)
    {
        if( Tag::where('slug' , $slugtag)->delete() )  return Redirect::route('tag')->with("message","Tag Deleteada Com Sucesso");

        return  view('errors.404');
        
    }

   
}
