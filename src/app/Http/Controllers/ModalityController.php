<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modality;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Room;
use Illuminate\Support\Str;

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

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['name','description', 'profileImage']), [
            "name" => ["required","string", "max:25"],
            "description" => ["required" , "string" , "max:60"],
            /*"profileImage" => 'image|mimes:jpeg,png,jpg,gif|max:2048'*/
        ]);
        if ($validator->fails()){
            return  Redirect::route('modalidade')->withErrors($validator)->withInput() ;
        }
        try{
            if ($request->_id == null) {
                
                if ($file = $request->file('profileImage')) {
                    $destinationPath = 'image/modality/'; // upload path
                    $profileImage = strtolower(Str::slug($request->name)).".".$file->getClientOriginalExtension();
                    $file->move($destinationPath, $profileImage);
                    //$modality->pathImage = $destinationPath.$profileImage;
                }
                $modality = Modality::create(
                    [
                        "name" => $request->name,
                        "description"=> $request->description,
                        "rooms_id"=> [-1],
                        "pathImage"=> $destinationPath.$profileImage
                    ]
                );
            }else{/*edit*/
                $modality = Modality::find($request->_id);
                $modality->update(
                    [
                        "name" => $request->name,
                        "description"=> $request->description,
                    ]
                );
            }
            //salva img
            //$modality->saveImg($request->file('profileImage'));
            
            return Redirect::route('modalidade')->with("message","Modalidade Criada/Editada Com Sucesso");
        } catch (Exception $exception){
            echo "Erro ao inserir/Editar modalidade";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $modality = Modality::where('slug', '=', $slug);
        $modality->delete();
        return redirect()->route('modalidade')->with('success','Modalidade deletada com sucesso');
    }


    private function saveImg($file){
        if ($file != null) {
            $destinationPath = 'image/modality/'; // upload path
            $profileImage = $this->slug.".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $this->pathImage = $destinationPath.$profileImage;
            return true;
        }

    }
}