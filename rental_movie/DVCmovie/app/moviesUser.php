<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moviesUser extends Model
{
    protected $fillable = ['user_id', 'movie_id' ];         
}
