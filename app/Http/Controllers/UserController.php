<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function getStep1( $quizId )
    {
        $quiz = DB::table('quizzes')->select('*')->where('id', '=', $quizId )->get();

        return view('admin-step1', ['quiz' => $quiz, 'quizId' => $quizId ]);
    }

    public function getStep2( $quizId )
    {
        $products = DB::table($quizId.'_inventory')->orderBy('id', 'desc')->get();

        return view('admin-step2', ['products' => $products, 'quizId' => $quizId ]);
    }

    public function getStep3( $quizId )
    {
        $traits = DB::table($quizId.'_traits')->orderBy('id', 'desc')->get();

        $products = DB::table($quizId.'_inventory')->orderBy('id', 'desc')->get();

        return view('admin-step3', ['traits' => $traits, 'products' => $products, 'quizId' => $quizId]);
    }

	public function getStep4(  $quizId )
    {
        $traits = DB::table($quizId.'_traits')->get();

        $products = DB::table($quizId.'_inventory')->orderBy('id', 'desc')->get();

    	return view('admin-step4', ['traits' => $traits, 'products' => $products, 'quizId' => $quizId]);
    }

    public function getStep5(  $quizId )
    {
        return view('admin-step5', ['quizId' => $quizId]);
    }

    public function getTraits()
    {
        $traits = DB::table('traits')->get();

    	return view('quiz', ['traits' => $traits]);
    }

     public function getQuiz( $quizId )
    {
        $quiz = DB::table('quizzes')->where('id', '=', $quizId )->get();

        $traits = DB::table('traits')
                        ->orderBy('id')
                        ->get();

        return view('quiz', ['quiz' => $quiz[0], 'traits' => $traits ]);
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
        $quizId = DB::getPdo()->lastInsertId();

        Schema::create( $quizId . '_inventory', function ($table) {
            $table->increments('id');
            $table->text('name');
            $table->text('description');
            $table->text('img');
            $table->text('rankings');
        });

        Schema::create( $quizId . '_traits', function ($table) {
            $table->increments('id');
            $table->text('trait');
        });

        return response()->json(['result'=> $result, 'quizId'=> $quizId ]);
    }

    public function submitProduct(Request $request, $quizId)
    {
    	$name = $request->name;
    	$description = $request->description;
    	$img = $request->image;

    	$result = DB::table($quizId.'_inventory')->insert([ 'id'=> null, 'name' => $name, 'description' => $description, 'img' => $img]);
  
    	return response()->json(['result'=> $result, 'name'=> $name, 'description'=> $description, 'img'=> $img ]);
    }

     public function submitTrait(Request $request, $quizId)
    {
    	$trait = $request->trait;

    	$result = DB::table($quizId.'_traits')->insert([ 'id'=> null, 'trait' => $trait ]);
  
    	return response()->json(['result'=> $result, 'trait' => $trait ]);
    }

    public function updateQuiz(Request $request, $quizId)
    {
        $name = $request->name;
        $description = $request->description;

        $result = DB::table('quizzes')
                ->where('id', $quizId)
                ->update([ 'name' => $name, 'description' => $description]);

        return response()->json(['result'=> $result, 'quizId'=> $quizId ]);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->image;

        if ($file)
        {
           $result= "file present";
           $path = $file->store('uploads');
           Image::make($file->getRealPath())->save($path);
        }
        else{
            $result= "file not present";
            $path = $file->store('uploads');
        }

        $name = $request->image->hashName();

        return response()->json(['result'=> $result, 'imgName'=> $name]);
    }
}
