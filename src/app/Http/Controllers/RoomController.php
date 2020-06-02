<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\Modality;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller{


    public function __construct(){
        $this->middleware('auth')->except(['roomsOfModality' , 'index']);
    }

    /* como passar o ID da sala para o nodejs carregar */
    public function show($slugRoom){
        $room = Room::where("slug" , $slugRoom)->first();
        return view('room.chat', compact("room"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->only(['name','description'/*, 'profileImage'*/]), 
            [
                "name" => ["required","string", "max:25", "unique:rooms,name"],
                "description" => ["required" , "string" , "max:60"],
                /*"profileImage" => 'image|mimes:jpeg,png,jpg,gif|max:2048'*/
            ]
        );
        if ($validator->fails() ){
            return  Redirect::route('sala')->withErrors($validator)->withInput() ;
        }elseif( Self::existsRoom($request->name) ) {
            try{      
                $pathImage = Self::createPathImage($request->file('profileImage'), $request->name);
                $simplifiedCategories = Self::creteArrayCategories($request->categoriesSlug);
                $dates = Self::createArrayDates($request);
                $simplifiedModality = Self::getModality($request->modalitySlug); 
                $room = Room::create(
                    [
                        "name" => "$request->name",
                        "description"=> "$request->description",
                        "public"=> "$request->public",
                        "key" => "$request->key",
                        "pathImage" => $pathImage,
                        "placeType"=> "$request->placeType",
                        "categories"=>  $simplifiedCategories,
                        /*nao da pra passar o objeto modality, entao somente por enquanto to pessando o slug*/
                        "modality"=> $simplifiedModality,
                        "tags"=> [""],
                        "users"=> [""],
                        "id_user_adm" => $request->id_user_adm,
                        "date"=> $dates
                    ]
                );
                Modality::updateListRooms($simplifiedModality, $room->_id);
                return Redirect::route('sala')->with("message","Sala Criada Com Sucesso");
            } catch (Exception $exception){
                echo "Erro ao inserir sala";
            }
        }else{
            return  Redirect::route('sala')->withErrors("Esse nome já esta sendo usado")->withInput() ;
        }
    }
    
    private static function  createPathImage($file, $name){
        if ($file && $name) {
            return Room::saveImg($file, $name);
        }
        return "";
    }

    private static function creteArrayCategories($categoriesSlug){
        $simplifiedCategories = [];
        if ($categoriesSlug) {
            foreach ($categoriesSlug as $categorySlug) {
                $category = Category::where('slug', '=', $categorySlug)->first();
                $simplifiedCategory = [
                    "name"=> $category->name,
                    "_id"=> $category->_id,
                    "slug"=> $category->slug
                ];
                array_push($simplifiedCategories, $simplifiedCategory);
            }
            return $simplifiedCategories;
            }
        return [""];
    }

    private static function  createArrayDates(Request $request){
        $i = 0;
        $date_index = 'date'.$i;
        $dates = [];
        while($request->$date_index){
            $date_index = 'date'.$i;
            $start_time_index = 'start_time'.$i;
            $end_time_index = 'end_time'.$i;
            $place_index = 'place'.$i;
            array_push($dates, 
                [
                    "place"=> $request->$place_index,
                    "date"=> $request->$date_index,
                    "start_time" => $request->$start_time_index,
                    "end_time"=> $request->$end_time_index,
                ]
            );
            $i++;
        }
        return $dates ? $dates : [''];
    }

    private static function  getModality($modalitySlug){
        $modality = Modality::where('slug', '=', $modalitySlug)->first();
        if ($modality) {
            return [
                '_id'=> $modality->_id,
                'slug'=> $modality->slug,
                'name'=> $modality->name,
                /*'description'=> $modality->description,*/
            ];
        }
        return [""];
    }

    /**
    * metodo para retornar todas as tags dessa sala
    * @return talvez retornar as model as tags, ou só os nomes
    */
    public function tags(Room $room){
        
        //return;
    }

    /**
    * metodo para retornar todas as categories dessa sala
    * @return talvez retornar as model as categories, ou só os nomes
    */
    public function categories(Room $room){
        
        //$categories = $room->categories['_id'];
        //return;
    }

    public function index()
    {
        $allplaceType = ['quadra', 'campo', 'digital', 'online', 'rede', 'lan', 'rua', 'club', 'fazenda', 'trilha'];
        //$alltags = Tag::all();
        $cardTitle = 'Criar Sala';
        $room = null;
        $allRooms = Room::all();
        $allModalities = Modality::all();
        $allCategories = Category::all();
        return view('room.dashboard',compact('allRooms', 'allModalities', 'allCategories', 'room', 'cardTitle'/*, '$allplaceType'*/) );
    }

    public function destroy($roomSlug)
    {
        $room = Room::where('slug','=' ,$roomSlug)->first();
        Room::deleteImg($room->pathImage);
        Modality::deleteRoom($room->modality['_id'], $room->_id);
        $room->delete();
        return redirect()->route('sala')->with('success','Sala deletada com sucesso');

    }


    /* verifica se ja existe sala com este nome*/
    private static function existsRoom($name){
        return Room::where('name', '=', $name)->first() == null;
    }

    /*todas as salas de uma determinada modalidade*/
    public function roomsOfModality($slugModality){
        $modality = Modality::where('slug','=' ,$slugModality)->first();
        $rooms = [];
        foreach ($modality->rooms_id as $room_id) {
            $room = Room::find($room_id);
            if ($room != null) {
                array_push($rooms, $room);
            }
        }
        $categories = Category::all();
        return view('room.rooms', compact('modality', 'rooms', 'categories'));
    }
    
    /**
     * lista todas as minhas salas
    */
    public function myRoom(){
        return view('room.myRooms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allModalities = Modality::all();
        $allCategories = Category::all();
        $allplaceType = ['quadra', 'campo', 'digital', 'online', 'rede', 'lan', 'rua', 'club', 'fazenda', 'trilha'];
        //$alltags = Tag::all();
        $cardTitle = 'Criar Sala';
        $room = null;
        return view('room.dashboard', compact('allModalities', 'allCategories', 'allplaceType', 'cardTitle', 'room'/*, 'alltags'*/));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenssageContent  $menssageContent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $room = Room::where('slug', '=', $request->slug)->first();
        $allModalities = Modality::all();
        $allCategories = Category::all();
        //$alltags = Tag::all();
        $allRooms = Room::all();
        $modality = Modality::find($room->modality['_id']);
        $cardTitle = 'Editando Sala: '.$room->name;
        return view('room.dashboard', compact('modality', 'allModalities', 'allCategories', 'room', 'cardTitle', 'allRooms'/*, 'alltags'*/));
    }

    //acho que via post, se passar esse parametro MODEL, nao vem o objeto, e sim uma string desse objeto
    public function update(Request $request, Room $room)
    {
        $validator = Validator::make($request->only(['name','description']), [
            "name" => ["required","string", "unique:rooms,_id,$room->_id" , "max:25"],
            "description" => ["required" , "string" , "max:100"]
        ]);
        if ($validator->fails()) {
            return  Redirect::route('sala')->withErrors($validator)->withInput() ;
        }elseif(Self::existsRoom($request->name)){
            $pathImage = Self::createPathImage($request->file('profileImage'), $request->name);
            $simplifiedCategories = Self::creteArrayCategories($request->categoriesSlug);
            $dates = Self::createArrayDates($request->dates);
            $simplifiedModality = Self::getModality($request->modalitySlug); 
            $room = Room::where('slug', '=', $request->roomSlug)->first();//verificado?
            $oldModalityID = $room->modality['_id'];
            $room->update(
                [
                    "name" => "$request->name",
                    "description"=> "$request->description",
                    "public"=> "$request->public",
                    "key" => "$request->key",
                    "pathImage" => $pathImage,
                    "placeType"=> "$request->placeType",
                    "standard_time"=> "$request->standard_time",
                    "categories"=>  $simplifiedCategories,
                    "modality"=> $simplifiedModality,
                    "tags"=> "",
                    "users"=> "$request->users_id",
                    "date"=> $dates
                ]
            );
            Modality::updateListRooms($simplifiedModality, $room->_id, $oldModalityID);
            return Redirect::route('sala')->with("message","Room Atualizada com Sucesso");
        }
    }
    
    /*
    * metodo responsavel por pegar um ou varios slug de categorias 
    * e retorna todas as salas que pertencem a essa(s) categorias
    * $slugCategory é um array
    */
    //  public function roomsByCategories($slugsCategories){
    //     return Modality::where(
    //         'categories', 'all', $slugCategory
    //     )->get();
    // }

}