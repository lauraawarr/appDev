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
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
       <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Add traits to your products</h1>

          <form>
             <div class="w-50 mt5 center" id="question-1">
                <h3 class="f5">Trait</h3>
                <div class="mb4 pb4 bb bw1 b--light-gray">
                   <input id="submitTrait-Trait" type="text" class="ba bw1 b--light-silver h2 pv3 w-100 br1 pointer" />
                   <input id="submitTrait" type="button" value="Add" class="submit dim ba bw1 b--blue bg-blue f6 white pv3 ph0 w-100 br1 mt4 pointer">
                </div>
             </div>
          </form>

          <div class="mt5 mb2 tc">
             <a href="../admin-step2/{{ $quizId }}" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a href="../admin-step4/{{ $quizId }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Next</a>
          </div>

        <div id="traits">
            @foreach ( $traits as $t )
                <div>{{ ucfirst($t -> trait) }}</div>
            @endforeach
        </div>

         </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
