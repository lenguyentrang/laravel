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
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country',
        'genre',
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
            'name'=> 'required',
            'description'=> 'required',
            'release_date'=> 'required',
            'rating'=> 'required|min:1|max:5',
            'ticket_price'=> 'required',
            'country'=> 'required',
            'genre'=> 'required',
            'photo'=> 'required',
        ];

        return $rules;
    }

}
