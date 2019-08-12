<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    protected $fillable = ['group_id',
							'user_id',
							'text'];

	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}
}
