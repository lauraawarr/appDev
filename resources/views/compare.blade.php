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

        <title>Comparison</title>
        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
      <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
        <a href="../index.php" class="link dark-gray mr4 pb2 bb bw1 b--blue">Home</a>
      </nav>
      <div class="bg-white pv5 mt5">
        <h2 class="tc f2 mb0 mt0 dark-gray">Compare Results</h2>
        <div id="results" class="dt-ns dt--fixed-ns mt0 flex flex-wrap">
          <section class="cf"></section>
      </div>
        <script type="text/javascript">
          var quizId = <?php echo json_encode( $quizId ) ?>;
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/comparison.js"></script>
    </body>
</html>
