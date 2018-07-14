<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenreFilm extends Model
{
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'genre_films';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'genre_id',
        'film_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get rule for Validator
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'genre_id'=> 'required',
            'genre_id'=> 'required'
        ];

        return $rules;
    }
}
