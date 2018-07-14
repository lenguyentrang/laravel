<?php

namespace App\Http\Controllers;

use App\Entities\Film;
use App\Entities\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FilmController extends Controller
{
    //
    public function get(){
        $films = Film::all();
        dd($films);
    }

    public function detail($slugFilmName){
        dd($slugFilmName);
    }

    public function createView(){
        $genres = Genre::all();
        return view('createfilm')->with('genres',$genres);
    }

    public function create(Request $request){
        $film = new Film();
        $validator = Validator::make($request->all(), $film->getRules());

        if ($validator->fails()) {
            return [
                'status' => 0,
                'message' => implode('<br>',array_flatten($validator->errors()->messages()))
            ];
        }

        $film->fill($request->all())->save();

        return [
            'status' => 1,
            'data' => []
        ];



    }
}
