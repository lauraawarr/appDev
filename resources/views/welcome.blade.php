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

        <title>Welcome</title>
        <link rel="stylesheet" href="./css/tachyons.css">
       <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <div class="bg-white tc pa5">
          <h1 class="mv0 center tc">Quizzes</h1>
          <div class="flex flex-column justify-center items-center">

            @foreach ($quizzes as $q)
             <div class="pb4 bb w-40-l w-100-s bw1 b--light-gray">
                <h3 class="mt4 mb0">{{ $q -> name}}</h3>
                <p class="mb0 light-silver">{{ $q -> description }}</h4>
                <div class="mt4">
                   <a href="quiz/{{ $q -> id }}" class="dim bg-blue db br1 pv3 mb3 ph5 f6 link white">Take Quiz</a>
                   <a href="compare/{{ $q -> id }}" class="dim bg-blue db br1 pv3 ph5 f6 link white">Compare Results</a>
                </div>
             </div>
             @endforeach

          </div>
       </div>
    </body>
</html>
