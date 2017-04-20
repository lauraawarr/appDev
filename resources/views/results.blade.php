<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="../../css/tachyons.css">
        <link rel="stylesheet" href="../../css/style.css">
        <title>Results</title>
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
      <!-- Used Nicole's navigation and styling for the navigation -->
        <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="../../quiz-home.html" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="../../step1.html" class="link dark-gray mr4 pb2">Create quiz</a>
        </nav>
        <div class="results bg-white pv5 mt5">
          <h2 class="tc dark-gray f2 mt0">Results</h2>
            <div class="main-product tc mb6">
              <h3 class="silver f4 b">{{ $result[0] -> name}}</h3>
              <p>{{ $result[0] -> description}}</p>
              <div><img src="../../uploads/{{ $result[0] -> img}}" class="bg-light-gray w5 mb4"></div>
              <!-- <p>{{ $result[0] -> img}}</p> -->
              <button class="pointer bg-blue bn white ph5 pv3 mb2 br2" id="btn1">Save</button>
            </div>
            <h4 class="tc dark-gray f3 mb0">Similar Results</h4>
            <div class="other-products dt-ns dt--fixed-ns mt0">
              <div class="dib-m dtc-ns tc pv4">
                <h3 class="silver f4 b">{{$result[1] -> name}}</h3>
                <!-- <p>{{ $result[1] -> description}}</p> -->
                <div><img src="../../uploads/{{ $result[1] -> img}}" class="bg-light-gray w6 mb3"></div>
                <p class="mt0 f6 blue b view-description-1 pointer"><img src="../../fonts/down.svg" class="pr2">DESCRIPTION</p>
                <p class="dn dn-0 ph5">{{$result[1] -> description}}</p>
                <!-- <p>{{ $result[1] -> img}}</p> -->
                <button class="pointer bg-blue bn white ph5 pv3 mb2 br2" id="btn2">Save</button>
              </div>
              <div class="dib-m dtc-ns tc pv4">
                <h3 class="silver f4 b">{{$result[2] -> name}}</h3>
                <!-- <p>{{ $result[2] -> description}}</p> -->
                <div><img src="../../uploads/{{ $result[2] -> img}}" class="bg-light-gray w6 mb3"></div>
                <p class="mt0 f6 blue b view-description-2 pointer"><img src="../../fonts/down.svg" class="pr2">DESCRIPTION</p>
                <p class="dn dn-1">{{$result[2] -> description}}</p>
                <!-- <p>{{ $result[2] -> img}}</p> -->
                <button class="pointer bg-blue bn white ph5 pv3 mb2 br2" id="btn3">Save</button>
              </div>
              <div class="dib-m dtc-ns tc pv4">
                <h3 class="silver f4 b">{{$result[3] -> name}}</h3>
                <!-- <p>{{ $result[3] -> description}}</p> -->
                <div><img src="../../uploads/{{ $result[3] -> img}}" class="bg-light-gray w6 mb3"></div>
                <p class="mt0 f6 blue b view-description-3 pointer"><img src="../../fonts/down.svg" class="pr2">DESCRIPTION</p>
                <p class="dn dn-2">{{$result[3] -> description}}</p>
                <!-- <img src='../../uploads{{ $result[3] -> img}}'> -->
                <button class="pointer bg-blue bn white ph5 pv3 mb2 br2" id="btn4">Save</button>
              </div>
            </div>
        </div>
        <div class="tl mt4">
          <span>
            <a href="../../quiz.html" class="blue no-underline mr3 f4 b">Change Answers</a>
            <a href="../../quiz/{{ $quizId }}" class="blue no-underline ml3 mr3 f4 b"><img src="../../fonts/retake.svg" class="w1 pr1 mb0">Retake Quiz</a>
            <a href="../../comparison.html" class="blue no-underline mr3 ml3 f4 b">Compare Results</a>
          </span>
        </div>
        <!--  script files -->
        <script type="text/javascript">
           var result = <?php echo json_encode( $result ) ?>;
           var quizId = <?php echo json_encode( $quizId ) ?>;
           if(localStorage.getItem('quiz') === null) {
             var quiz_object = {};
             localStorage.setItem('quiz', JSON.stringify(quiz_object));
           }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../../js/results.js"></script>
    </body>
</html>
