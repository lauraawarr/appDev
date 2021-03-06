<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="manifest.json">
        <link rel="mask-icon" href="safari-pinned-tab.svg" color="#4183f3">
        <meta name="theme-color" content="#4183f3">

        <title>Admin Home</title>
        <link rel="stylesheet" href="./css/tachyons.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start relative">
          <a href="admin" class="link dim blue mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="admin-step1/0" class="link dim dark-gray mr4 pb2">Create quiz</a>
          <div class="bg-blue h3 w3 br-100 absolute bottom--2 right-3">
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
            <div id="Quiz-{{ $q -> id }}" class="bg-white mt5 pv5 ph5">
             <h3 class="mv0">{{ $q -> name }}</h3>
             <p>{{ $q -> description }}</p>
             <div class="mt5">
                <span id="removeQuiz-{{ $q -> id }}" class="removeQuiz dim bg-moon-gray br1 pv3 ph5 f6 link white pointer delete">Delete</span>
                <a href="admin-step1/{{ $q -> id }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Edit</a>
                <a href="quiz/{{ $q -> id }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Preview</a>
             </div>
            </div>
           @endforeach
        @endif
         <div class="fixed absolute-center bg-white ba b--light-gray ph4 pt4 pb5 z-5 br1 dn" id="confirm-delete-box">
            <h3 class="mb5">Are you sure you want to delete this quiz?</h3>
            <span class="pointer dim bg-moon-gray br1 pv3 ph5 f6 link white" id="cancel-button">Cancel</span>
            <span class="submit-delete pointer dim bg-blue br1 pv3 ph5 f6 link white" id="removeQuiz">Delete</span>
         </div>
         <div class="w-100 vh-100 bg-black-70 fixed absolute-center dn" id="confirm-overlay"></div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
      var quizId = "@if ( isset($quiz[0] -> id) ){{ $quiz[0] -> id }} @endif";
    </script>
    <script src="./js/home.js"></script>
    <script type="text/javascript" src="./js/admin.js"></script>
</html>
