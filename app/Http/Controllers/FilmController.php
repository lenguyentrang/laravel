<?php

namespace App\Http\Controllers;

use App\Entities\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    //
    public function get(){
        $films = Film::all();
        dd($films);
    }
}
