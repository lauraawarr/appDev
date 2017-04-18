<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 1</title>

        <link rel="stylesheet" href="./css/tachyons.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
        <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
        </nav>
        <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Set up your quiz</h1>
          <form action="admin-stage2" method="post">
             <div class="w-50 mt5 center" id="question-1">
                <h3 class="f5">Quiz name</h3>
                <div class="mb4">
                   <input id="newQuiz-Name" type="text" class="ba bw1 b--light-silver h2 pv3 w-100 br1 pointer" />
                </div>
                <h3 class="f5">Description</h3>
                <div class="mb4">
                  <textarea id="newQuiz-Description" name="textarea" rows="10" cols="50" class="ba bw1 b--light-silver h3 w-100 br1 pointer"></textarea>
                </div>
             </div>
          </form>
          <div class="mt5 mb2 tc">
             <a href="admin" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a id="newQuiz" class="submit dim bg-blue br1 pv3 ph5 f6 link white">Next</a>
          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
    </body>
</html>
