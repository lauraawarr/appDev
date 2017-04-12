<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function getQuestions()
    {
        $questions = DB::table('questions')
        				->orderBy('inventoryCol')
        				->get();

    	return view('questions', ['questions' => $questions]);
    }

    public function getAjaxResult(Request $request)
    {
    	$userArray = $request->userArray;
    	$topProdScores = [0,0,0,0];
    	$topProds = [null, null, null, null];
    	$lastIndex = count( $topProds ) - 1;

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
  
    	return response()->json(['result' => $topProds, 'userArray' => $userArray, 'scores' => $topProdScores ]);
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
  
    	return view('results', ['result' => $topProds, 'userArray'=> $userArray]);
    }
}
