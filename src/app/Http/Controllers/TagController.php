<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use MongoDB\Exception\Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Tag::create([
            'name' => $data['name'],
            'description' => $data['description'],
            /*'slug' => $data['slug'], acredito que o metodo no metodo do MODEL*/
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validate = Validator::make($request->only(['name','description']),[
        'name' => ['required','string','unique:tags,name', 'min:4' , 'max:8'],
        'description' => ['required' , "string"]
      ]);

      if($validate->fails())  return  Redirect::route('tag')->withErrors($validate)->withInput();
      try{
      $this->create($request->only(['name','description']));
      return Redirect::route('tag')->with("message","Categoria Criada Com Sucesso");

      }catch(Exception $ex){
          echo "Erro ao inserir registro no banco";
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cardTitle = "Criar tag";
        $cardDescription = "inserir novas tags";
        $tag = null;
        $tags = Tag::paginate(5);
        return view('tag.formTag', \compact('tag','tags','cardTitle','cardDescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit( $slugTag)
    {
        $tag = Tag::where("slug", $slugTag)->first();
        $cardTitle = "Editar tag";
        $cardDescription = "Editar $tag->name";
        $tags = Tag::paginate(5);
        return view('tag.formTag', \compact('tag','tags','cardTitle','cardDescription'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        //
    }
}
