<?php 
namespace App\Http\Controllers;

use App\Tag;
use App\Room;
use App\Category;
use App\Modality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller{


    public function __construct(){
        $this->middleware('auth')->except(['roomsOfModality' , 'index','apiIndex']);
    }

    /* como passar o ID da sala para o nodejs carregar */
    public function show($slugRoom){
        $room = Room::where("slug" , $slugRoom)->first();
        return view('room.chat', compact("room"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->only(['name','description', 'profileImage', 'modalitySlug']), 
            [
                "name" => ["required","string", "max:50", "unique:rooms,name"],
                "description" => ["required" , "string" , "max:200"],
                "modalitySlug" => ["required", "string", "max:50"],
                "profileImage" => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable'
            ]
        );
        if ($validator->fails() ){
            return response(["funcionou" => "false" , "erros" => $validator->errors()]);  
            //Redirect::route('sala')->withErrors($validator)->withInput() ;
        }elseif( Self::notExistsRoom($request->name) ) {
            try{      
                $pathImage = Self::createPathImage($request->file('profileImage'), $request->name);
                $simplifiedCategories = Self::creteArrayCategories($request->categoriesSlug);
                $dates = Self::createArrayDates($request);
                $simplifiedModality = Self::getModality($request->modalitySlug);
                $credentials =  [
                    "name" => "$request->name",
                    "description"=> "$request->description",
                    "public"=> "$request->public",
                    "key" => "$request->key",
                    "pathImage" => $pathImage,
                    "placeType"=> "$request->placeType",
                    "categories"=>  $simplifiedCategories,
                    "modality"=> $simplifiedModality,
                    "tags"=> [""],
                    "users"=> [""],
                    "id_user_adm" => $request->id_user_adm,
                    "date"=> $dates
                ];
                $room = Room::create($credentials);
                Modality::updateListRooms($simplifiedModality, $room->_id);
                return response(['message' => "Sala criada com sucesso", 'itemSaved' => $room, "funcionou" => true]);
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
        return [
            [
                "name"=> '',
                "_id"=> '',
                "slug"=> ''
            ]
        ];
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
        return $dates ? $dates : [
                [
                    "place"=> '',
                    "date"=> '',
                    "start_time" => '',
                    "end_time"=> '',
                ]
            ];
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


    public function apiIndex(Request $request){
        $allRooms = Room::select("_id")->get();
        $ip = $request->server("SERVER_ADDR");
        Log::info("HOST " .  $ip . " Request List User");
        return response(["rooms" => $allRooms]);
    }

    public function index()
    {
        $allplaceType = ['quadra', 'campo', 'digital', 'online', 'rede', 'lan', 'rua', 'club', 'fazenda', 'trilha'];
        //$alltags = Tag::all();
        $cardTitle = 'Criar Sala';
        $room = null;
        $roomsOfUser = Room::where('id_user_adm', '=', Auth::user()->_id)->get();
        $allModalities = Modality::all();
        $allCategories = Category::all();
        return view('room.dashboard',compact('roomsOfUser', 'allModalities', 'allCategories', 'room', 'cardTitle'/*, '$allplaceType'*/) );
    }

    public function destroy($roomSlug)
    {
        $room = Room::where('slug','=' ,$roomSlug)->first();
        Room::deleteImg($room->pathImage);
        //dd($room->modality);
        Modality::deleteRoom($room->modality['_id'], $room->_id);
        $room->delete();
        return redirect()->route('sala')->with('success','Sala deletada com sucesso');
    }


    /* verifica se ja existe sala com este nome*/
    private static function notExistsRoom($name){
        return Room::where('name', '=', $name)->first() == null;
    }

    /* verifica se ja existe sala com este nome*/
    private static function existsRoomID($_id){
        return Room::find($_id) != null;
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
        //$allRooms = Room::all();
        $roomsOfUser = Room::where('id_user_adm', '=', Auth::user()->_id)->get();
        $modality = Modality::find($room->modality['_id']);
        $cardTitle = 'Editando Sala: '.$room->name;
        return view('room.dashboard', compact('modality', 'allModalities', 'allCategories', 'room', 'cardTitle', 'roomsOfUser'/*, 'alltags'*/));
    }

    //acho que via post, se passar esse parametro MODEL, nao vem o objeto, e sim uma string desse objeto
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->only(['name','description', 'profileImage', 'room_id']), 
            [
                "name" => ["required","string", "max:25"],
                "description" => ["required" , "string" , "max:60"],
                "room_id" => ["required"],
                "profileImage" => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );
        if ($validator->fails() ){
            if (Self::existsRoomID($request->room_id)) {
                $sala = Room::find($request->room_id);
                return  Redirect::route('editroom', ['slug' => $sala->slug])->withErrors($validator)->withInput() ;
            }else{
                return  Redirect::route('sala')->withErrors("message", "esse ID não existe")->withInput() ;
            }
            
        }elseif( Self::existsRoomID($request->room_id) ) {
            try{   

                $pathImage = Self::createPathImage($request->file('profileImage'), $request->name);
                $simplifiedCategories = Self::creteArrayCategories($request->categoriesSlug);
                $dates = Self::createArrayDates($request);
                $simplifiedModality = Self::getModality($request->modalitySlug);
                $room = Room::find($request->room_id);
                $oldModalityID = $room->modality['_id'];
                if ($pathImage == "") {
                //dd($pathImage);
                    $pathImage = $room->pathImage;
                }
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
                return redirect()->route('sala')->with('message','Sala editada com sucesso');
            } catch (Exception $exception){
                return  Redirect::route('sala')->withErrors("Erro ao Atualizar")->withInput() ;
            }
        }else{
            return Redirect::route('sala')->withErrors("message", "Não existe sala com este _id");
        }
    }
    //}
    
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