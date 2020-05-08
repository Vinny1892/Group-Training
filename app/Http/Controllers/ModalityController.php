<?php

namespace App\Http\Controllers;

use App\Modality;
use Illuminate\Http\Request;

// class Category
// {
//     public $url;
//     public $name;
//     public $activeUsers;
// }

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     * index – Lista os dados da tabela
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $futebol = new Category();
        // $futebol->url = 'https://www.folhape.com.br/obj/0/346222,475,80,0,0,475,365,0,0,0,0.jpg';
        // $futebol->name = 'Futebol';
        // $futebol->activeUsers = 18;
        
        // $volei = new Category();
        // $volei->url = 'https://www.cbnmaringa.com.br/uploads_lg/45566b71e4f4e4a9375e8382db9ac037.png';
        // $volei->name = 'Volei';
        // $volei->activeUsers = 12;
        
        // $basquete = new Category();
        // $basquete->url = 'https://www.maranhaoesportes.com/wp-content/uploads/2019/10/Betsul_Os-brasileiros-da-NBA_liga-de-basquete-americana-tem-quatro-brasileiros-em-a%C3%A7%C3%A3o-800x445.jpg';
        // $basquete->name = 'Basquete';
        // $basquete->activeUsers = 12;
        
        // $categories = array($futebol, $volei, $basquete);

        // return view('modality.modalities', ['categories' => $categories]);


        $modalities = Modality::all();
        return view('modality.modalities',compact('modalities'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     * create – Retorna a View para criar um item da tabela
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.panel');
    }

    /**
     * Store a newly created resource in storage.
     * store – Salva o novo item na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Modality::create(
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
        return redirect()->route('dashboard.panel')->with('success','Modalidade criada com sucesso.');;
    }

    /**
     * Display the specified resource.
     * show – Mostra um item específico
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(Modality $modality)
    {
         /* ainda nao criamos essa tela de uma modalidade, e n sei se precisamos*/
        return view('modality.modalities', compact($modality));
    }

    /**
     * Show the form for editing the specified resource.
     * edit – Retorna a View para edição do dado
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(modality $modalities)
    {
        return view('modality.modalities',compact('modalities'));
    }

    /**
     * Update the specified resource in storage.
     * update – Salva a atualização do dado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modality $modality)
    {
        // $modality->update(
        //         "title" => "$request->title",
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
     * destroy – Remove o dado
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(modality $modality)
    {
        $modality->delete();

        return redirect()->route('modality.modalities')->with('success','Modalidade deletada com sucesso');
    }
}
