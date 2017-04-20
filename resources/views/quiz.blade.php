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

        <title>Questions</title>
        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="../index.php" class="link dark-gray mr4 pb2 bb bw1 b--blue">Home</a>
       </nav>
       <div class="bg-white mt4 pv5">

          <div class="w-100 w-50-ns center quiz-bar br4 bg-light-silver">
             <div class="w0 quiz-bar br4 bg-blue" id="quiz-bar">
             </div>
          </div>
          <div class="f7 tc mt2">
             <span id="done-text">0</span>% done
          </div>
          <h1 class="mt5 tc">{{ $quiz -> name }}</h1>

          <form class="mt4">
            @for ($i = 0; $i < count($traits); $i++)
             <div class="w-50 center <? if ($i != 0) echo 'dn dn o-0'?>" id="question-{{ $i + 1 }}">
                <h3 class="mb0">How important is {{ strtolower($traits[$i] -> trait) }}?</h3>
                <div class="mv3">
                   <input type="radio" name="q{{ $i + 1 }}" value="5" class="mr2 pointer q{{ $i + 1 }}" id="q{{ $i + 1 }}_1" />
                   <label for="q{{ $i + 1 }}_1" class="pointer">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{ $i + 1 }}" value="4" class="mr2 pointer q{{ $i + 1 }}" id="q{{ $i + 1 }}_2"/>
                   <label for="q{{ $i + 1 }}_2" class="pointer">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{ $i + 1 }}" value="3" class="mr2 pointer q{{ $i + 1 }}" id="q{{ $i + 1 }}_3"/>
                   <label for="q{{ $i + 1 }}_3" class="pointer">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{ $i + 1 }}" value="2" class="mr2 pointer q{{ $i + 1 }}" id="q{{ $i + 1 }}_4"/>
                   <label for="q{{ $i + 1 }}_4" class="pointer">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{ $i + 1 }}" value="1" class="mr2 pointer q{{ $i + 1 }}" id="q{{ $i + 1 }}_5"/>
                   <label for="q{{ $i + 1 }}_5" class="pointer">Not Important</label>
                </div>
             </div>
            @endfor


             <!-- Submit -->
             <input type="button" value="Submit" class="mt5 bg-blue br1 pv3 ph5 f6 fw3 link white center bn dn o-0 pointer" id="submit-answers" />
          </form>
       </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
           var traits = <?php echo json_encode( $traits ) ?>;
           var quizId = <?php echo json_encode( $quiz -> id ) ?>;
           var totalQuestions = traits.length;
           console.log( quizId );
        </script>
        <script src="../js/questions.js"></script>
    </body>
</html>
