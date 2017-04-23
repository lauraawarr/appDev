<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function getIndex()
    {
        $quizzes = DB::table('quizzes')->get();

        return view('welcome', ['quizzes' => $quizzes]);
    }

    public function getOverview( $quizId, $userArray )
    {
        $traits = DB::table($quizId.'_traits')->orderBy('id')->get();
        $userArray = str_split($userArray, 1);

        return view('quiz-overview', ['quizId' => $quizId, 'traits' => $traits, 'userArray' => $userArray]);
    }

    public function getStep1( $quizId )
    {
        $quiz = DB::table('quizzes')->where('id', '=', $quizId )->first();

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
        $selections = [];

        for ( $p = 1; $p <= count( $products ); $p++ ){
            $ranks = explode("," , $products[$p - 1 ]->rankings);
            for ( $t = 1; $t <= count( $ranks ); $t++ ){
                $selections["p".$p."_".$t] = $ranks[$t - 1];
            };
        }; 

    	return view('admin-step4', ['traits' => $traits, 'products' => $products, 'quizId' => $quizId, 'selections' => $selections]);
    }

    public function getTraits()
    {
        $traits = DB::table('traits')->get();

    	return view('quiz', ['traits' => $traits]);
    }

     public function getQuiz( $quizId )
    {
        $quiz = DB::table('quizzes')->where('id', '=', $quizId )->get();

        $traits = DB::table($quizId.'_traits')
                        ->orderBy('id')
                        ->get();

        return view('quiz', ['quiz' => $quiz[0], 'traits' => $traits ]);
    }

    public function getQuizzes()
    {
        $quizzes = DB::table('quizzes')->get();

        return view('admin', ['quizzes' => $quizzes]);
    }

    public function getResult($quizId, $userArray)
    {
        $userString = $userArray;
    	$userArray = array_map('intval', str_split( $userArray , 1 ));
    	$topProdScores = [-10000,-10000,-10000,-10000];
    	$topProds = [null, null, null, null];
    	$lastIndex = count( $topProds ) - 1;
    	$temp = $userArray;

        $products = DB::table($quizId.'_inventory')->orderBy('id')->get();

    	foreach ($products as $product) {
    		$prodArray = array_map('intval', explode( ',', $product->rankings ));
    		$prodScore = calcScore( $userArray, $prodArray);
            array_push( $temp, $product);

    		$largestIndex = null;
    		for ($i = $lastIndex; $i > -1; $i--){
    			if ( $prodScore > $topProdScores[ $i ]){
    				$largestIndex = $i;
                } else if ( $prodScore == $topProdScores[ $i ]){
                    $largestIndex = $i + round(rand(0,1)); // if equal, randomly choose order
    			} else {
    				break;
    			};
    		};
    		if (!is_null($largestIndex)){
    			$topProds = insertAt( $topProds, $largestIndex, $product );
    			$topProdScores = insertAt( $topProdScores, $largestIndex, $prodScore );
			};
    	};
  
    	return view('results', ['result' => $topProds, 'quizId' => $quizId, 'userString' => $userString ]); 
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

    public function removeProduct(Request $request)
    {
        $quizId = $request->quizId;
        $removeId = $request->removeId;

        $deletedRows = DB::table($quizId.'_inventory')->where('id', '=', $removeId )->delete();

        return response()->json(['result'=> $deletedRows ]);
    }

    public function removeQuiz(Request $request)
    {
        $removeId = $request->removeQuizId;

        $deletedRows = DB::table('quizzes')->where('id', '=', $removeId )->delete();
        Schema::drop($removeId.'_inventory');
        Schema::drop($removeId.'_traits');

        return response()->json(['result'=> $deletedRows, 'removeQuizId' => $removeId ]);
    }

    public function removeTrait(Request $request)
    {
        $quizId = $request->quizId;
        $removeId = $request->removeId;
        $removeIndex = null;

        $traits = DB::table($quizId.'_traits')->orderBy('id')->get();
        $products = DB::table($quizId.'_inventory')->get();

        for ($i = 0; $i < count( $traits ); $i++){
            if ($traits[$i]->id == $removeId){
                $removeIndex = $i;
                break;
            };
        };

        if ($removeIndex){
            foreach ($products as $p) {
                $rankArray = explode(',', $p->rankings);
                array_splice($rankArray, $removeIndex, 1);
                $rankStr = implode(',', $rankArray);
                DB::table($quizId.'_inventory')->where('id', '=', $p->id )->update(['rankings' => $rankStr]);
            };
        };

        $deletedRows = DB::table($quizId.'_traits')->where('id', '=', $removeId )->delete();
        $traitId = DB::getPdo()->lastInsertId();

        return response()->json(['result'=> $deletedRows, 'traitId' => $traitId ]);
    }

    public function submitProduct(Request $request)
    {
    	$quizId = $request->quizId;
        $name = $request->name;
    	$description = $request->description;
    	$img = $request->image;

        $traitCount = DB::table($quizId.'_traits')->count();

    	$result = DB::table($quizId.'_inventory')->insert([ 'id'=> null, 'name' => $name, 'description' => $description, 'img' => $img, 'rankings' => str_repeat("0,", $traitCount)]);
        $prodId = DB::getPdo()->lastInsertId();

    	return response()->json(['result'=> $result, 'name'=> $name, 'description'=> $description, 'img'=> $img, 'prodId' => $prodId ]);
    }

    public function submitRanks(Request $request, $quizId)
    {
        $prods = DB::table($quizId.'_inventory')->orderBy('id', 'desc')->get();
        $traits = DB::table($quizId.'_traits')->orderBy('id')->get();
        $result = [];

        for ( $p = 1; $p <= count( $prods ); $p++ ){
            $rankings = "";
            for ( $t = 1; $t <= count( $traits ); $t++ ){
                (isset($request["p".$p."_".$t])) ? $j = $request["p".$p."_".$t] : $j = 0;
                $rankings = $rankings . $j . ",";
            };
            $r = DB::table($quizId.'_inventory')->where('id', '=', $prods[$p - 1]->id )->update(['rankings' => $rankings]);
            array_push($result, $r);
        }; 
  
        return response()->json(['result'=> $result ]);
    }

    public function submitTrait(Request $request, $quizId)
    {
    	$trait = $request->trait;

        $prods = DB::table($quizId.'_inventory')->get();
        foreach ($prods as $p) {
            $r = ($p->rankings)."0,";
            DB::table($quizId.'_inventory')->update(['rankings' => $r]);
        };

    	$result = DB::table($quizId.'_traits')->insert([ 'id'=> null, 'trait' => $trait ]);
        $traitId = DB::getPdo()->lastInsertId();
  
    	return response()->json(['result'=> $result, 'trait' => $trait, 'traitId' => $traitId ]);
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
