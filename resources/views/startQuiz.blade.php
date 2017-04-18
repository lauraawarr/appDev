<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>Start Quiz</title>

    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
       <div class="bg-white mt4 pv5 tc">
          <h1 class="mt0">{{ $quiz[0] -> name}}</h1>
          <p class="silver">{{ $quiz[0] -> description }}</p>
          <div class="mt5 mb2">
             <a href="quizQuestion/{{ $quiz[0] -> id }}" class="bg-blue br1 pv3 ph5 f6 link white">Start</a>
          </div>
        </div>
    </body>
</html>
