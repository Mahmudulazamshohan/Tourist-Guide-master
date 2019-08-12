<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNextPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_predictions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_id');
          $table->boolean("beach") ;
          $table->boolean("hill") ;
          $table->boolean("museum" );
          $table->boolean("historical" );
          $table->boolean("natural") ;
          $table->boolean("most_popular") ;
          $table->boolean("less_popular") ;
          $table->boolean("long") ;
          $table->boolean("trip" );
          $table->boolean("day" );
          $table->string("hotel" );
          $table->string("hotel_price" );
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_predictions');
    }
}
