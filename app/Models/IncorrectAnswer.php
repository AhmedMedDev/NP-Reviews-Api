<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncorrectAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['IAcontent', 'question_id'];

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
