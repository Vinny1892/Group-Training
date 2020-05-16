<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modality;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Room;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalities = Modality::all();
        // return view('modality.dashboard',compact('modalities'))->with('i', (request()->input('page', 1) - 1) * 5
        // );

        return view('modality.dashboard',compact('modalities') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        //$allTags = Tag::all();
        return view('modality.formCreate', compact('allCategories'/*, 'allTags'*/));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Modality::create(
        //     [
        //         "name" => $request->name,
        //         "description"=> $request->description,
        //         "id_rooms"=> $request->id_rooms,
        //         "id_tags"=> $request->id_tags,
        //         "id_categories"=> $request->id_categories,
        //         "image"=> $request->pathImage
        //     ]
        // );
        // return redirect()->route('painel')->with('success','Modalidade criada com sucesso.');


        $validator = Validator::make($request->only(['name','description']), [
            "name" => ["required","string", "max:25"],
            "description" => ["required" , "string" , "max:60"]
        ]);
       if ($validator->fails() )  return  Redirect::route('modalidade')->withErrors($validator)->withInput() ;
        try{
        Modality::create(
            [
                "name" => $request->name,
                "description"=> $request->description,
                "id_rooms"=> $request->id_rooms,
                "id_tags"=> $request->id_tags,
                "id_categories"=> $request->id_categories,
                "image"=> $request->pathImage
            ]
        );
         return Redirect::route('modalidade')->with("message","Modalidade Criada Com Sucesso");
        } catch (Exception $exception){
            echo "Erro ao inserir modalidade";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(modality $modality)
    {
        $modalities = Modality::all();
        return view('modality.modalities', compact('modalities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(modality $modality)
    {
        $allCategories = Category::all();
        //$allTags = Tag::all();
        $allRooms = Room::all();
        $modality = Modality::firstWhere('id', $id_modality);//id ou slug?
        return view('modality.formEdit',compact('modality', 'allCategories'/*, 'allTags'*/, 'allRooms'));
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
        // $modality->update(
        //         "name" => "$request->name",
        //         "description"=> "$request->description",
        //         "id_rooms"=> "$request->id_rooms",
        //         "id_tags"=> "$request->id_tags",
        //         "id_categories"=> "$request->id_categories",
        //         "image"=> "img/room/777.png",/*criar um metodo faz faz cria o caminho da imagem*/
        //         "slug"=>"request->slug"
        // );

        // return redirect()->route('modality.modalities')->with('success','Modalidade alterada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(modality $modality)
    {
        $modality->delete();
        return redirect()->route('modalidade')->with('success','Modalidade deletada com sucesso');
    }
}
