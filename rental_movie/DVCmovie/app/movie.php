<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $fillable = ['title','category_id','actor', 'year', 'description' ]; 
    
    public function MovieCategory()
    {
        return $this->belongsTo(\App\MovieCategory::class, 'category_id');
    }
}
