<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 3</title>

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
                 <div class="active-circle bg-white br-100 relative">
                    <a href="../admin-step1/{{ $quizId }}" class="link f7 pa2 light-silver absolute absolute-center tc">1</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step2/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Products</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="active-circle bg-white br-100 relative">
                    <a href="../admin-step2/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">2</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step3/{{ $quizId }}" class="link dim pointer mv3 blue f6 tc">Traits</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 bg-light-gray br-100 flex justify-center items-center">
                 <div class="active-circle bg-blue br-100 relative">
                    <a href="../admin-step3/{{ $quizId }}" class="link f7 pa2 absolute near-white absolute-center tc">3</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step4/{{ $quizId }}" class="link dim pointer mv3 light-silver f6 tc">Ranking</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="br-100 relative">
                    <a href="../admin-step4/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">4</a>
                 </div>
              </div>
             </div>
          </div>
       </div>
      <h1 class="w-100 w-50-ns mt5 mb0 center tc">Add traits to your products</h1>

          <form>
             <div class="w-50 mt5 center" id="question-1">
                <h3 class="f5">Trait</h3>
                <div class="mb4 pb4 bb bw1 b--light-gray">
                   <input id="submitTrait-Trait" type="text" class="ba bw1 b--light-silver h2 pv3 w-100 br1 pointer" />
                   <input id="submitTrait" type="button" value="Add" class="submit dim ba bw1 b--blue bg-blue f6 white pv3 ph0 w-100 br1 mt4 pointer">
                </div>
             </div>
          </form>

          <div id="traits" class="w-100 w-50-ns center">
            @foreach ( $traits as $t )
            <div class="bb bw1 b--light-gray ph2 pt3 pb2 flex justify-between">
               <span>{{ ucfirst($t -> trait) }}</span>
               <span>
                  <a href="" class="ttu f7 mr2 link blue">Edit</a>
                  <a href="" class="link blue ml1">x</a>
               </span>
            </div>
            @endforeach
          </div>

          <div class="mt5 mb2 tc">
             <a href="../admin-step2/{{ $quizId }}" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a href="../admin-step4/{{ $quizId }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Next</a>
          </div>

         </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
