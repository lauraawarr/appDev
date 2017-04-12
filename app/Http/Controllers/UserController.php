<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

	public function getAdmin()
    {
        $questions = DB::table('questions')->get();

        $products = DB::table('inventory')->orderBy('id', 'desc')->get();

    	return view('admin', ['questions' => $questions, 'products' => $products]);
    }

    public function getQuestions()
    {
        $questions = DB::table('questions')
        				->orderBy('inventoryCol')
        				->get();

    	return view('questions', ['questions' => $questions]);
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

    public function submitProduct(Request $request)
    {
    	$product = $request->input;
  
    	return response()->json(['result'=> $product ]);
    }

     public function submitQuestion(Request $request)
    {
    	$question = $request->question;

    	$result = DB::table('questions')->insert([ 'id'=> null, 'question' => $question, 'inventoryCol' => 0]);
  
    	return response()->json(['result'=> $result, 'question' => $question ]);
    }
}
