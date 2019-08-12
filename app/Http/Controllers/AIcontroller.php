<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;
use Phpml\ModelManager;
use Phpml\Math\Distance\Minkowski;
use Phpml\Math\Distance\Euclidean;

use Phpml\Metric\Accuracy;
use Phpml\NeuralNetwork\Layer;
use Phpml\NeuralNetwork\Node\Neuron;
use Phpml\NeuralNetwork\ActivationFunction\PReLU;
use Phpml\NeuralNetwork\ActivationFunction\Sigmoid;
use Phpml\Classification\MLPClassifier;
use App\NextPrediction;
use Auth;
class AIcontroller extends Controller
{
	 public function __construct(){
	 	$this->middleware('auth');
	 }
	 public function dataStore(Request $r){
       $nextPrediction = NextPrediction::create(['user_id'=>Auth::id(),
			           "beach" => $r->beach == "yes" ?true:false ,
			           "hill" => $r->hill  == "yes" ?true:false ,
			           "museum" => $r->museum  == "yes" ?true:false ,
			           "historical" => $r->historical  == "yes" ?true:false ,
			           "natural" => $r->natural  == "yes" ?true:false ,
			           "most_popular" => $r->most_popular  == "yes" ?true:false ,
			           "less_popular" => $r->less_popular  == "yes" ?true:false ,
			           "long"=> $r->long  == "yes" ?true:false ,
			           "trip" => $r->trip == "yes" ?true:false ,
			           "day" => $r->day == "yes" ?true:false ,
			           "hotel"=> $r->hotel ,
			           "hotel_price" => $r->hotel_price  == "yes" ?true:false 
			       ]);
       return redirect()->back();
	 }
     public function aiConctroller(Request $r){

     	
     	$places = \App\Place::all();
		$cityNameCollection = [];
		function array_find($array,$str){
			return array_search($str, $array);
		}
		function randval($range){
			return rand(1,$range);
		}
		$labelId= [];
		$tags =[];
		$dataset = [];

		foreach($places as $k=> $place){
			$labelId[] = $place->id;
		}
		foreach($places->unique('cityname') as $k=> $place){
			$cityNameCollection[$k] =$place->cityname;

		}
		foreach($places->unique('tag') as $k=>$tag){
			$tags[$k] =  $tag->tag;
		}

		//Cityname---Bus---train---ship--tags-hotelaverage
		foreach($places as $k=>$p){
			$dataset[$k] = [
				array_find($cityNameCollection, $p->cityname) ,
				$p->bus == 'null' ? 0 : intval($p->bus),
				$p->train == 'null' ? 0 : intval($p->train),
				$p->ship == 'null' ? 0 : intval($p->ship),
				$p->air == 'null' ? 0 : intval($p->air),
				array_find($tags,$p->tag)*100,
				intval(\App\Hotel::where('place_id',$p->id)->avg('hotel_price'))

			];
			
		}
		//dd($tags);

		$nextPrediction = \App\NextPrediction::where('user_id',Auth::id())->first();
		$p = [];
		if($nextPrediction->count()){

			if($nextPrediction->beach){
				$p[] = [rand(1,8),randval(500) ,randval(500), randval(500), 500, 1*100, randval(2000)];

			}
			if($nextPrediction->hill){
				$p[] = [rand(1,8),randval(500) ,randval(500), randval(500), 500, 3*100, randval(2000)];

			}
			if($nextPrediction->museum){
			$p[] = [rand(1,8),randval(500) ,randval(500), randval(500), 500, 7*100, randval(2000)];

			}
			if($nextPrediction->historical){
				$p[] = [rand(1,8),randval(500) ,randval(500), randval(500), 500, 0*100, randval(2000)];

			}
			if($nextPrediction->natural){
				$p[] = [rand(1,8),randval(500) ,randval(500), randval(500), 500, 6*100, randval(2000)];

			}
			
			
		}
		
		//Cityname---Bus---train---ship--air--tags
		// $p = [
		// 	  [$r->cityname*100,$r->bus,$r->train, $r->ship, $r->air, $r->tags*100,$r->hotel_price],
		// 	  [$r->cityname*100,$r->bus+randval(1000),$r->train+randval(1000), $r->ship+randval(1000), $r->air+randval(1000), $r->tags,$r->hotel_price],
		// 	  [$r->cityname*100,$r->bus+randval(2000),$r->train+randval(1000), $r->ship+randval(2000), $r->air+randval(2000), $r->tags,$r->hotel_price],

		//      ];

		$classifier = new KNearestNeighbors($k=1, new Minkowski($lambda=4));
		$classifier->train($dataset, $labelId);
		 $predictedLabels =[];
		foreach ($dataset as $key => $value) {
			$predictedLabels[] =$classifier->predict($value);
	    }
	       $accuracy = Accuracy::score($labelId, $predictedLabels)*100;
	      $placePredictionData =[];
	      foreach($classifier->predict($p) as $r){
	          $placePredictionData[] = \App\Place::where('id',$r)->first();
	      }
	     
	      //d($nextPrediction->count());
	      return view('ai.index',['accuracy'=>number_format($accuracy,2),'places'=>array_slice($placePredictionData, 0,3)]);
	      //var_dump($tags);
     }



     public function encode(){
     	
     }
  //    public function aiConctrollers(){
  //    	$places = \App\Place::all();
		// $cityNameCollection = [];
		// function array_find($array,$str){
		// 	return array_search($str, $array);
		// }
		// $labelId= [];
		// $tags =[];
		// $dataset = [];

		// foreach($places as $k=> $place){
		// 	$labelId[] = "id".$place->id;
		// }
		// foreach($places->unique('cityname') as $k=> $place){
		// 	$cityNameCollection[$k] =$place->cityname;

		// }
		// foreach($places->unique('tag') as $k=>$tag){
		// 	$tags[$k] =  $tag->tag;
		// }

		// //Cityname---Bus---train---ship--tags
		// foreach($places as $k=>$p){
		// 	$dataset[$k] = [
		// 		array_find($cityNameCollection, $p->cityname),
		// 		$p->bus == 'null' ? 0 : intval($p->bus),
		// 		$p->train == 'null' ? 0 : intval($p->train),
		// 		$p->ship == 'null' ? 0 : intval($p->ship),
		// 		$p->air == 'null' ? 0 : intval($p->air),
		// 		array_find($tags,$p->tag)

		// 	];
		// }

	
		
		// //dd([$tags,$labelId,$dataset]);
		// $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
		// $labels = ['a', 'a', 'a', 'b', 'b', 'b'];

		// $mlp = new MLPClassifier(4, [2], $labelId);
		// $mlp = new MLPClassifier(4, [[2, new PReLU], [2, new Sigmoid]], ['a', 'b', 'c']);
		// $layer1 = new Layer(2, Neuron::class, new PReLU);
		// $layer2 = new Layer(2, Neuron::class, new Sigmoid);
		// $mlp = new MLPClassifier(4, [$layer1, $layer2], ['a', 'b', 'c']);
		// $mlp->train(
		//   $dataset,
		//   $labelId
		// );
		// $mlp->setLearningRate(0.1);
		// dd($mlp->predict([$dataset[0]]));
  //    }
}
