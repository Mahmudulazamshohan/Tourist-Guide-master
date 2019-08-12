<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    public function likes(){
    return $this->hasOne('App\Like','place_id','id');

    }
    public function reviews(){
    	return $this->hasOne('App\Review','place_id','id');
    }
}
