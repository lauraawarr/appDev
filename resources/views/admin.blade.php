<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Admin Home</title>
        <link rel="stylesheet" href="./css/tachyons.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start relative">
          <a href="quiz-home.html" class="link dim blue mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="step1.html" class="link dim dark-gray mr4 pb2">Create quiz</a>
          <div class="bg-blue h3 w3 br-100 absolute bottom--2 right-1 right-3-ns">
             <div class="absolute absolute-center">
                <a href="admin-step1/0" class="f4 near-white link">+</a>
             </div>
          </div>
       </nav>
       @if ( count( $quizzes ) == 0 )
        <div class="bg-white mt5 pv5 tc">
          <h1 class="mt0">Create your first quiz</h1>
          <p class="silver">Tap the + button to begin</p>
          <div class="mt5 mb2">
             <a href="admin-step1/0" class="dim bg-blue br1 pv3 ph5 f6 link white">Begin</a>
          </div>
        </div>

        @else
            @foreach ( $quizzes as $q )
            <div class="bg-white mt5 pv5 ph5">
             <h3 class="mv0">{{ $q -> name }}</h3>
             <p>{{ $q -> description }}</p>
             <div class="mt5 mb2">
                <a href="admin-step1/{{ $q -> id }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Edit</a>
                <a href="quiz.html" class="dim bg-blue br1 pv3 ph5 f6 link white">Preview</a>
             </div>
            </div>
           @endforeach
        @endif
    </body>
</html>
