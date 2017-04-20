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

        <title>Admin</title>
        <link rel="stylesheet" href="../css/tachyons.css">
       <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
        <a href="../admin" class="link dim dark-gray mr4 pb2">Quizzes</a>
        <a href="../admin-step1/0" class="link dim blue mr4 pb2 bb bw1 b--blue">Create quiz</a>
      </nav>
       <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Success!</h1>
          <p class="silver tc">Your quiz is now ready to be shared.</p>
          <div class="mt5 mb2 tc">
             <a href="../quiz/{{ $quizId }}" class="dim bg-blue br1 pv3 ph5 f6 link white center">Preview</a>
          </div>
       </div>
    </body>
</html>
