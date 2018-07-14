<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    //
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'film_id',
        'comments',
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
            'comments'=> 'required',
            'film_id'=> 'required'
        ];

        return $rules;
    }
}
