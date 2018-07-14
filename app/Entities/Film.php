<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    //
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'films';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug_name',
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country',
        'photo',
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
            'name'=> 'required|unique:films',
            'description'=> 'required',
            'release_date'=> 'required',
            'rating'=> 'required|integer|min:1|max:5',
            'ticket_price'=> 'required',
            'country'=> 'required',
            'genre_id'=> 'required',
            'photo'=> 'required',
        ];

        return $rules;
    }

    public function genre_films()
    {
        return $this->hasMany('App\Entities\GenreFilm');
    }


}
