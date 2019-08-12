<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUsers extends Model
{
     protected $fillable = ['group_id',
							'user_id',
						];
	public function group(){
		return $this->hasOne('App\Group','id','group_id');
	}					
}
