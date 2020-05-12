<?php

namespace App\Http\Controllers;

use App\Modality;
use App\Category;
use App\Tag;
use App\Room;
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
        $modalities = Modality::all();
        return view('modality.modalities',compact('modalities'))->with('i', (request()->input('page', 1) - 1) * 5
        );
    }

    /**
     * Show the form for creating a new resource.
     * create – Retorna a View para criar um item da tabela
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        $allTags = Tag::all();
        return view('modality.formCreate', compact('allCategories', 'allTags'));
    }

    /**
     * Store a newly created resource in storage.
     * store – Salva o novo item na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //var_dump($request);
        Modality::create(
            [
                "title" => $request->title,
                "description"=> $request->description,
                "id_rooms"=> $request->id_rooms,
                "id_tags"=> $request->id_tags,
                "id_categories"=> $request->id_categories,
                "image"=> $request->pathImage
            ]
        );
        return redirect()->route('painel')->with('success','Modalidade criada com sucesso.');;
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
    public function edit(Modality $modality)
    {
        //$allCategories = Category::all();
        $allCategories = [new Category(['title' => 'quadra madeira']), new Category(['title' => 'campo' ])];
        $allCategories2 = [new Category(['title' => 'campo' ])];


        //$allTags = Tag::all();
        $allTags = [new Tag(['title' => 'bairro_buriti']), new Tag(['title' => 'tradição' ])];

        //$allRooms = Room::all();
        $allRooms = [new Room(['title' => 'Sala1']), new Room(['title' => 'Sala2' ])];

        //$modality = Modality::firstWhere('id', $id_modality);//id ou slug?
        $modality = new Modality(['title'=>'Futebol', 'description'=>'futebol é o esporte mais popular no Brasil', 'id_categories'=>$allCategories2, 'id_tags'=>$allTags, 'id_rooms'=>$allRooms]);

        return view('modality.formEdit',compact('modality', 'allCategories', 'allTags', 'allRooms'));
    }

    /**
     * Update the specified resource in storage.
     * update – Salva a atualização do dado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modality $modality)
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
    public function destroy(Modality $modality)
    {
        $modality->delete();

        return redirect()->route('modality.modalities')->with('success','Modalidade deletada com sucesso');
    }
}
