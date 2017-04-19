<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 4</title>

        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
      <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
        <a href="../admin" class="link dim dark-gray mr4 pb2">Quizzes</a>
        <a href="../admin-step1/0" class="link dim blue mr4 pb2 bb bw1 b--blue">Create quiz</a>
      </nav>
      <div class="bg-white mt5 ph3 pv5">
         <div class="flex justify-center items-center w-100 light-silver">
          <div class="bar bg-light-gray z-1 absolute"></div>
          <div class="flex flex-column ph3 z-2">
             <a href="../admin-step1/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Setup</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="active-circle bg-white br-100 relative" id="circle-1">
                    <a href="../admin-step1/{{ $quizId }}" class="link f7 pa2 light-silver absolute absolute-center tc">1</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step2/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Products</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="active-circle bg-white br-100 relative" id="circle-1">
                    <a href="../admin-step2/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">2</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step3/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Traits</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 bg-light-gray br-100 flex justify-center items-center">
                 <div class="active-circle bg-white br-100 relative" id="circle-1">
                    <a href="../admin-step3/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">3</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step4/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Ranking</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="active-circle bg-blue br-100 relative" id="circle-1">
                    <a href="../admin-step4/{{ $quizId }}" class="link f7 pa2 absolute near-white absolute-center tc">4</a>
                 </div>
              </div>
             </div>
          </div>
       </div>
      <h1 class="w-100 w-50-ns mt5 mb0 center tc">Rank your products</h1>
          <p class="silver tc">Rank the traits of your products on the following scale:</p>
          <ul class="list pl0 flex flex-row justify-center silver">
             <ul class="list pl0 flex flex-column tc ph3">
                <li>1</li>
                <li>Poor</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>2</li>
                <li>Fair</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>3</li>
                <li>Good</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>4</li>
                <li>Great</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>5</li>
                <li>Excellent</li>
             </ul>
          </ul>
          <form id="ranking" action="" method="post">
             @for ( $t = 0; $t < count($traits); $t++ )
             <div class="w-100 w-80-ns mt5 center flex flex-column">
                <h3 class="tc mt0">{{ ucfirst($traits[$t] -> trait) }}</h3>
                <div class="flex flex-row flex-wrap justify-center tc">
                    @for ( $p = 0; $p < count($products); $p++  )
                       <div class="tc w-100 w-50-m w-30-l mh2 mb3">
                          <h4 class="tc mt0 mh0 justify-center center">{{ ucfirst($products[$p] -> name) }}</h4>
                          <div class="flex flex-row tc ph3 justify-center">

                              @for ($i = 1; $i <= 5; $i++ )
                                <div class="mb3 flex flex-column ph2">
                                  <input type="radio" name="p{{ $p + 1 }}_{{ $t + 1 }}" value="{{ $i }}" 
                                  <? if ($selections['p'.( $p + 1 ).'_'.( $t + 1 )] == $i) echo 'checked' ?> 
                                  class=" mb2 pointer q1 justify-center center" id="p{{ $p + 1 }}_{{ $t + 1 }}_{{ $i }}" />
                                  <label for="p{{ $p + 1 }}_{{ $t + 1 }}_{{ $i }}" class=" pointer ">{{ $i }}</label>
                               </div>
                              @endfor

                          </div>
                       </div>
                    @endfor
                </div>
             </div>
            @endfor
          </form>
          <div class="mt5 mb2 tc cf">
             <a id="submitRanks-Back"href="../admin-step3/{{ $quizId }}" class="submit dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a id="submitRanks-Next" href="../admin-step5/{{ $quizId }}" class="submit dim bg-blue br1 pv3 ph5 f6 link white">Save</a>
          </div>
       </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
          var quizId = "{{ $quizId }}";
          console.log( quizId );
        </script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
