<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Review Your Answers</title>
        <link rel="stylesheet" href="../../css/tachyons.css">
        <link rel="stylesheet" href="../../css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../../js/questions-overview.js"></script>
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start relative">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
       <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Review Your Answers</h1>
          <form action="" method="post" class="mt4">
            @for ($i = 0; $i < count( $traits ); $i++)
             <!-- Question {{ $i + 1 }} -->
             <div class="w-60 center" id="question-{{$i + 1}}">
                <div class="flex">
                   <h3 class="mb0">How important is {{ strtolower($traits[$i] -> trait) }}?</h3>
                   <h6 class="ml3 mb0 blue pointer">Edit answer</h6>
                </div>
                <div class="mv3">
                   <input type="radio" name="q{{$i+1}}" value="5" class="mr2 pointer q{{$i+1}} <? if ($userArray[$i] != 5) echo 'dn'; ?>" id="q{{$i+1}}_1" 
                   <? if ($userArray[$i] == 5) echo 'checked'; ?> />
                   <label for="q{{$i+1}}_1" class="pointer <? if ($userArray[$i] != 5) echo 'dn'; ?>">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{$i+1}}" value="4" class="mr2 pointer q{{$i+1}} <? if ($userArray[$i] != 4) echo 'dn'; ?>" id="q{{$i+1}}_2" 
                   <? if ($userArray[$i] == 4) echo 'checked'; ?> />
                   <label for="q{{$i+1}}_2" class="pointer <? if ($userArray[$i] != 4) echo 'dn'; ?>">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{$i+1}}" value="3" class="mr2 pointer q{{$i+1}} <? if ($userArray[$i] != 3) echo 'dn'; ?>" id="q{{$i+1}}_3"
                   <? if ($userArray[$i] == 3) echo 'checked'; ?> />
                   <label for="q{{$i+1}}_3" class="pointer <? if ($userArray[$i] != 3) echo 'dn'; ?>">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{$i+1}}" value="2" class="mr2 pointer q{{$i+1}} <? if ($userArray[$i] != 2) echo 'dn'; ?>" id="q{{$i+1}}_4"
                   <? if ($userArray[$i] == 2) echo 'checked'; ?> />
                   <label for="q{{$i+1}}_4" class="pointer <? if ($userArray[$i] != 2) echo 'dn'; ?>">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q{{$i+1}}" value="1" class="mr2 pointer q{{$i+1}} <? if ($userArray[$i] != 1) echo 'dn'; ?>" id="q{{$i+1}}_5"
                   <? if ($userArray[$i] == 1) echo 'checked'; ?> />
                   <label for="q{{$i+1}}_5" class="pointer <? if ($userArray[$i] != 1) echo 'dn'; ?>">Not Important</label>
                </div>
             </div>
            @endfor

             <!-- Submit -->
             <input type="button" value="Submit" class="mt5 db bg-blue br1 pv3 ph5 f6 fw3 link white center bn pointer" id="submit-answers" />
          </form>
       </div>
    </body>
    <script>
      var quizId = <? echo $quizId ?>;
      var userArray = <? echo json_encode($userArray) ?>;
    </script>
</html>
