<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable =['user_id','place_id','comment_text'];
  
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
