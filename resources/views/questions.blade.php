<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Questions</title>
        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/questions.js"></script>
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
       <div class="bg-white mt4 pv5">

          <div class="w-100 w-50-ns center quiz-bar br4 bg-light-silver">
             <div class="w0 quiz-bar br4 bg-blue" id="quiz-bar">
             </div>
          </div>
          <div class="f7 tc mt2">
             <span id="done-text">0</span>% done
          </div>
          <h1 class="mt5 tc">What Laptop Should You Buy?</h1>

          <form action="" method="post" class="mt4">
             <!-- Question 1 -->
             <div class="w-50 center" id="question-1">
                <h3 class="mb0">How important is your laptop for gaming?</h3>
                <div class="mv3">
                   <input type="radio" name="q1" value="1" class="mr2 pointer q1" id="q1_1" />
                   <label for="q1_1" class="pointer">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q1" value="2" class="mr2 pointer q1" id="q1_2"/>
                   <label for="q1_2" class="pointer">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q1" value="3" class="mr2 pointer q1" id="q1_3"/>
                   <label for="q1_3" class="pointer">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q1" value="4" class="mr2 pointer q1" id="q1_4"/>
                   <label for="q1_4" class="pointer">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q1" value="5" class="mr2 pointer q1" id="q1_5"/>
                   <label for="q1_5" class="pointer">Not Important</label>
                </div>
             </div>

             <!-- Question 2 -->
             <div class="w-50 center dn o-0" id="question-2">
                <h3 class="mb0">How important is your laptop for video editing?</h3>
                <div class="mv3">
                   <input type="radio" name="q2" value="1" class="mr2 pointer q2" id="q2_1" />
                   <label for="q2_1" class="pointer">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q2" value="2" class="mr2 pointer q2" id="q2_2"/>
                   <label for="q2_2" class="pointer">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q2" value="3" class="mr2 pointer q2" id="q2_3"/>
                   <label for="q2_3" class="pointer">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q2" value="4" class="mr2 pointer q2" id="q2_4"/>
                   <label for="q2_4" class="pointer">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q2" value="5" class="mr2 pointer q2" id="q2_5"/>
                   <label for="q2_5" class="pointer">Not Important</label>
                </div>
             </div>

             <!-- Question 3 -->
             <div class="w-50 center dn o-0" id="question-3">
                <h3 class="mb0">How important is your laptop's portability?</h3>
                <div class="mv3">
                   <input type="radio" name="q3" value="1" class="mr2 pointer q3" id="q3_1" />
                   <label for="q3_1" class="pointer">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q3" value="2" class="mr2 pointer q3" id="q3_2"/>
                   <label for="q3_2" class="pointer">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q3" value="3" class="mr2 pointer q3" id="q3_3"/>
                   <label for="q3_3" class="pointer">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q3" value="4" class="mr2 pointer q3" id="q3_4"/>
                   <label for="q3_4" class="pointer">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q3" value="5" class="mr2 pointer q3" id="q3_5"/>
                   <label for="q3_5" class="pointer">Not Important</label>
                </div>
             </div>

             <!-- Question 4 -->
             <div class="w-50 center dn o-0" id="question-4">
                <h3 class="mb0">How important is it that your laptop costs less than $1K?</h3>
                <div class="mv3">
                   <input type="radio" name="q4" value="1" class="mr2 pointer q4" id="q4_1" />
                   <label for="q4_1" class="pointer">Very important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q4" value="2" class="mr2 pointer q4" id="q4_2"/>
                   <label for="q4_2" class="pointer">Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q4" value="3" class="mr2 pointer q4" id="q4_3"/>
                   <label for="q4_3" class="pointer">Neutral</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q4" value="4" class="mr2 pointer q4" id="q4_4"/>
                   <label for="q4_4" class="pointer">Slightly Important</label>
                </div>
                <div class="mb3">
                   <input type="radio" name="q4" value="5" class="mr2 pointer q4" id="q4_5"/>
                   <label for="q4_5" class="pointer">Not Important</label>
                </div>
             </div>

             <!-- Submit -->
             <input type="submit" value="Submit" class="mt5 bg-blue br1 pv3 ph5 f6 fw3 link white center bn dn o-0 pointer" id="submit-answers" />
          </form>
       </div>

        <!-- Loops through questions in database -->
        <div class="questions">
            @foreach ($traits as $t)
                <div>How important is {{ $t->trait }} to you?</div>
            @endforeach
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
           var traits = <?php echo json_encode( $traits ) ?>;
           console.log( traits );
        </script>
    </body>
</html>
