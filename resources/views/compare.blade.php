<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Comparison</title>
        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
      <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
        <a href="quiz-home.html" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
      </nav>
      <div class="bg-white pv5 mt5">
        <h2 class="tc f2 mb0 mt0 dark-gray">Compare Results</h2>
        <div id="results" class="dt-ns dt--fixed-ns mt0 flex flex-wrap">
          <section class="cf"></section>
      </div>
        <!-- {{ $quizId }} -->
        <script type="text/javascript">
          var quizId = <?php echo json_encode( $quizId ) ?>;
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/comparison.js"></script>
    </body>
</html>
