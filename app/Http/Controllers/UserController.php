<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function getStep3()
    {
        $traits = DB::table('traits')->orderBy('inventoryCol')->get();

        $products = DB::table('inventory')->orderBy('id', 'desc')->get();

        return view('admin-step3', ['traits' => $traits, 'products' => $products]);
    }

	public function getStep4()
    {
        $traits = DB::table('traits')->orderBy('inventoryCol')->get();

        $products = DB::table('inventory')->orderBy('id', 'desc')->get();

    	return view('admin-step4', ['traits' => $traits, 'products' => $products]);
    }

    public function getTraits()
    {
        $traits = DB::table('traits')
        				->orderBy('inventoryCol')
        				->get();

    	return view('questions', ['traits' => $traits]);
    }

    public function getQuizzes()
    {
        $quizzes = DB::table('quizzes')->get();

        return view('admin', ['quizzes' => $quizzes]);
    }

    public function getResult($userArray)
    {
    	$userArray = array_map('intval', str_split( $userArray , 1 ));
    	$topProdScores = [0,0,0,0];
    	$topProds = [null, null, null, null];
    	$lastIndex = count( $topProds ) - 1;
    	$temp = [];

        $result = DB::table('inventory')->orderBy('id')->chunk(100, function($products) use ( &$temp, $userArray, &$topProdScores, &$topProds, $lastIndex ){

        	foreach ($products as $product) {
        		$prodArray = array_map('intval', explode( ',', $product->rankings ));
        		$prodScore = calcScore( $userArray, $prodArray);


        		$largestIndex = null;
        		for ($i = $lastIndex; $i > -1; $i--){
        			if ( $prodScore > $topProdScores[ $i ]){
        				$largestIndex = $i;
        			} else {
        				break;
        			};
        		};
        		if (!is_null($largestIndex)){
        			$topProds = insertAt( $topProds, $largestIndex, $product );
        			$topProdScores = insertAt( $topProdScores, $largestIndex, $prodScore );
    			};
        	};
        });
  
    	return view('results', ['result' => $topProds ]);
    }

    public function newQuiz(Request $request)
    {
        $name = $request->name;
        $description = $request->description;

        $result = DB::table('quizzes')->insert([ 'id'=> null, 'name' => $name, 'description' => $description]);
        $quizId = DB::table('quizzes')->select(DB::raw('id WHERE id == LAST_INSERT_ID()'));
  
        return response()->json(['result'=> $result, 'quizId'=> $quizId ]);
    }

    public function submitProduct(Request $request)
    {
    	$name = $request->name;
    	$description = $request->description;
    	$img = $request->image;

    	$result = DB::table('inventory')->insert([ 'id'=> null, 'name' => $name, 'description' => $description, 'img' => $img]);
  
    	return response()->json(['result'=> $result, 'name'=> $name, 'description'=> $description, 'img'=> $img ]);
    }

     public function submitTrait(Request $request)
    {
    	$trait = $request->trait;

    	$result = DB::table('traits')->insert([ 'id'=> null, 'trait' => $trait, 'inventoryCol' => 0]);
  
    	return response()->json(['result'=> $result, 'trait' => $trait ]);
    }
}
