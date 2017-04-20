<?php

if ( isset($quiz -> id) ){
  $description = $quiz -> description;
  $name = $quiz -> name;
  $url = "updateQuiz";
  $cta = "Save";
} else if ( $quizId == 0){
  $url = "newQuiz";
  $description = $name = null;
  $cta = "Next";
};

?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/public/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/public/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/public/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/public/manifest.json">
        <link rel="mask-icon" href="/public/safari-pinned-tab.svg" color="#4183f3">
        <meta name="theme-color" content="#4183f3">

        <title>Step 1</title>

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
                 <div class="active-circle bg-blue br-100 relative" id="circle-1">
                    <a href="../admin-step1/{{ $quizId }}" class="link f7 pa2 near-white absolute absolute-center tc">1</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step2/{{ $quizId }}" class="link dim pointer mv3 light-silver f6 tc">Products</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="bg-light-gray br-100 relative" id="circle-1">
                    <a href="../admin-step2/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">2</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step3/{{ $quizId }}" class="link dim pointer mv3 light-silver f6 tc">Traits</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="br-100 relative" id="circle-1">
                    <a href="../admin-step3/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">3</a>
                 </div>
              </div>
             </div>
          </div>
          <div class="flex flex-column ph3 z-3">
             <a href="../admin-step4/{{ $quizId }}" class="link dim pointer mv3 light-silver f6 tc">Ranking</a>
             <div class="flex flex-row align-items justify-center">
               <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
                 <div class="br-100 relative" id="circle-1">
                    <a href="../admin-step4/{{ $quizId }}" class="link f7 pa2 absolute light-silver absolute-center tc">4</a>
                 </div>
              </div>
             </div>
          </div>
       </div>
     <h1 class="w-100 w-50-ns mt5 mb0 center tc">Set up your quiz</h1>
      <div class="tc mt4 blue f6 error-message"></div>
          <form action="admin-stage2" method="post">
             <div class="w-50 mt5 center" id="question-1">
                <h3 class="f5">Quiz name</h3>
                <div class="mb4">
                   <input id="<? echo $url; ?>-Name" type="text" name="quiz-name"
                    value="<? echo $name; ?>"
                    class="ba bw1 b--light-silver h2 pv3 w-100 br1 pointer" />
                </div>
                <h3 class="f5">Description</h3>
                <div class="mb4">
                  <textarea id="<? echo $url; ?>-Description"  name="description" rows="10" cols="50" class="ba bw1 b--light-silver h3 w-100 br1 pointer"><? echo $description; ?></textarea>
                </div>
             </div>
          </form>
          <div class="mt5 mb2 tc">
             <a href="../admin" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a id="<? echo $url; ?>" class="submit dim bg-blue br1 pv3 ph5 f6 link white cta-button"><? echo $cta; ?></a>
          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
          var quizId = "@if ( isset($quiz -> id) ){{ $quiz -> id }} @endif";
        </script>
        <script>
          var url = <? echo $url; ?>;
        </script>
        <script src="../js/step1.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
