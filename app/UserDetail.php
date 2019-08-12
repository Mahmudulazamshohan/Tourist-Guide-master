<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $table = 'userdetails';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
