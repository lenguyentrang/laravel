<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\Film;
use App\Entities\Genre;
use App\Entities\GenreFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FilmController extends Controller
{
    //
    public function get(){
        $films = Film::all();

        return view('filmlist')->with('films',$films);
    }

    public function detail($slugFilmName){
        $film = Film::where('slug_name', $slugFilmName)->first();
            $genrefilms = GenreFilm::where('film_id', $film->id)->get();
            $genreName = [];
            foreach ($genrefilms as $genrefilm) {
                $genre = Genre::find($genrefilm->genre_id);
                $genreName[] = $genre->name;
            }
            $film->genreName = implode(',', $genreName);

        return view('filmdetail')->with('film',$film);
    }

    public function createView(){
        $genres = Genre::all();
        return view('createfilm')->with('genres',$genres);
    }

    public function create(Request $request){
        $film = new Film();
        $inputs = $request->all();
        $validator = Validator::make($inputs, $film->getRules());

        if ($validator->fails()) {
            return [
                'status' => 0,
                'message' => implode('<br>',array_flatten($validator->errors()->messages()))
            ];
        }


        if($inputs['name']){
            $inputs['slug_name'] = str_slug($inputs['name']);
        }

        $film->fill($inputs)->save();

        //Create GenreFilm
        if($inputs['genre_id'] && is_array($inputs['genre_id'])){
            foreach ($inputs['genre_id'] as $genre_id) {
                $genreFilm = new GenreFilm();
                $genreFilm->genre_id = $genre_id;
                $genreFilm->film_id = $film->id;
                $genreFilm->save();
            }
        }

        return [
            'status' => 1,
            'data' => []
        ];



    }


    public function commentAdd(Request $request){
        $comment = new Comment();
        $inputs = $request->all();
        $validator = Validator::make($inputs, $comment->getRules());

        if ($validator->fails()) {
            return [
                'status' => 0,
                'message' => implode('<br>',array_flatten($validator->errors()->messages()))
            ];
        }

        $comment->fill($inputs)->save();

        return [
            'status' => 1,
            'data' => []
        ];



    }
}
