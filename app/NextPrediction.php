<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextPrediction extends Model
{
    protected $fillable = ['user_id',
                           "beach" ,
                           "hill" ,
                           "museum" ,
                           "historical" ,
                           "natural" ,
                           "most_popular" ,
                           "less_popular" ,
                           "long" ,
                           "trip" ,
                           "day" ,
                           "hotel" ,
                           "hotel_price" ];
}
