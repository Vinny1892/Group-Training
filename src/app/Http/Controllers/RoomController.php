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
        $this->middleware('auth');
    }

    /* como passar o ID da sala para o nodejs carregar */
    public function show($slugRoom){
        $room = Room::where("slug" , $slugRoom)->first();
        return view('room.chat', compact("room"));
    }

     


    // public function minhaLista(){
    // 	return view('room.listaMeusChats');
    // }


    // public function insert(Request $request)
    // {
    //     $room = new Room();
    //     $room->phonecompany = $request->get('phonecompany');
    //     $room->model = $request->get('model');
    //     $room->price = $request->get('price');        
    //     $room->save();
    //     return ('Phone has been successfully added');
    // }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->only(
                ['name','description']
            ), 
            [
                "name" => ["required","string", "max:25"],
                "description" => ["required" , "string" , "max:60"]
            ]
        );
        if ($validator->fails() ){
            return  Redirect::route('sala')->withErrors($validator)->withInput() ;
        }elseif( Self::existsRoom($request->name) ) {
            try{
                $modality = Modality::where('slug', '=', $request->modalitySlug)->first();
                $simplifiedCategories = [];
                foreach ($request->categoriesSlug as $categorySlug) {
                    $category = Category::where('slug', '=', $categorySlug)->first();
                    $simplifiedCategory = [
                        "name"=> $category->name,
                        "_id"=> $category->_id,
                        "slug"=> $category->slug
                    ];
                    array_push($simplifiedCategories, $simplifiedCategory);
                }
                $room = Room::create(
                    [
                        "name" => "$request->name",
                        "description"=> "$request->description",
                        "public"=> "$request->public",
                        "key" => "$request->key",
                        "place"=> "$request->place",
                        "placeType"=> "$request->placeType",
                        "standard_time"=> "$request->standard_time",
                        "categories"=>  $simplifiedCategories,
                        /*nao da pra passar o objeto modality, entao somente por enquanto to pessando o slug*/
                        "modality"=> [
                                        '_id'=> $modality->_id,
                                        'slug'=> $modality->slug,
                                        'name'=> $modality->name,
                                        /*'description'=> $modality->description,*/
                                        /*'categories'=> $modality->categories,*/
                                        /*'tags'=> $modality->tags,*/
                                    ],
                        "tags"=> "",
                        "users"=> "$request->users_id",
                        "date"=> [
                            "repeat"=> [
                                "weekly"=> "$request->weekly",
                                "Friday"=> "$request->Friday",
                                "start_date" => "$request->start_date",
                                "end_date"=> "$request->end_date",
                                "number_of_repetitions"=> "$request->number_of_repetitions"
                            ],
                            "custom_schedules"=> [
                                [
                                    "data"=> "$request->data",
                                    "schedule"=> "$request->schedule"
                                ]
                            ]
                        ]
                    ]
                );
                Modality::updateListRooms($modality, $room->_id);
                return Redirect::route('sala')->with("message","Sala Criada Com Sucesso");
            } catch (Exception $exception){
                echo "Erro ao inserir sala";
            }
        }else{
            return  Redirect::route('sala')->withErrors("Esse nome já esta sendo usado")->withInput() ;
        }
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
        
        //return;
    }

    public function index()
    {
        $allRooms = Room::all();
        $allModalities = Modality::all();
        $allCategories = Category::all();
        return view('room.dashboard',compact('allRooms', 'allModalities', 'allCategories'/*, '$allplaceType'*/) );
    }

    public function destroy($slug)
    {
        $room = Room::where('slug','=' ,$slug);
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
        return view('room.rooms', compact('modality', 'rooms'));
    }
    
    /**
     * lista todas as minhas salas
    */
    public function myRoom(){
        return view('room.myRooms');
    }

}