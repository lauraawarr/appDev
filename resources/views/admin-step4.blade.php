<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 4</title>

        <link rel="stylesheet" href="./css/tachyons.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
       <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Rank your products</h1>
          <p class="silver tc">Rank the traits of your products on the following scale:</p>
          <ul class="list pl0 flex flex-row justify-center silver">
             <ul class="list pl0 flex flex-column tc ph3">
                <li>1</li>
                <li>Poor</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>2</li>
                <li>Fair</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>3</li>
                <li>Good</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>4</li>
                <li>Great</li>
             </ul>
             <ul class="list pl0 flex flex-column tc ph3">
                <li>5</li>
                <li>Excellent</li>
             </ul>
          </ul>
          <form action="" method="post">
             @foreach ( $traits as $t )
             <div class="w-50 mt5 center flex flex-column">
                <h3 class="tc mt0">{{ ucfirst( $t -> trait ) }}</h3>
                <div class="flex flex-row justify-between-ns">
                    @foreach ( $products as $p )
                    <div class="tc">
                      <h4 class="tc mt0">{{ $p -> name }}</h4>
                      <div class="mb3">
                         <input type="radio" name="p1_t1" class="mr2 pointer q1" id="p1_t1_1" />
                         <label for="p1_t1_1" class="pointer">1</label>
                      </div>
                      <div class="mb3">
                         <input type="radio" name="p1_t1" class="mr2 pointer q1" id="p1_t1_2" />
                         <label for="p1_t1_2" class="pointer">2</label>
                      </div>
                      <div class="mb3">
                         <input type="radio" name="p1_t1" class="mr2 pointer q1" id="p1_t1_3" />
                         <label for="p1_t1_3" class="pointer">3</label>
                      </div>
                      <div class="mb3">
                         <input type="radio" name="p1_t1" class="mr2 pointer q1" id="p1_t1_4" />
                         <label for="p1_t1_4" class="pointer">4</label>
                      </div>
                      <div>
                         <input type="radio" name="p1_t1" class="mr2 pointer q1" id="p1_t1_5" />
                         <label for="p1_t1_5" class="pointer">5</label>
                      </div>
                   </div>
                   @endforeach
                </div>
            </div>
            @endforeach
          </form>
          <div class="mt5 mb2 tc cf">
             <a href="admin-step3" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a href="admin-step5" class="dim bg-blue br1 pv3 ph5 f6 link white">Next</a>
          </div>
       </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
    </body>
</html>
