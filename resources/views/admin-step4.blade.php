<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 4</title>

        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
        <a href="../admin" class="link dim dark-gray mr4 pb2">Quizzes</a>
        <a href="../admin-step1/0" class="link dim blue mr4 pb2 bb bw1 b--blue">Create quiz</a>
      </nav>
       <div class="bg-white mt5 ph3 pv5">
         <div class="flex justify-center items-center w-100 light-silver">
            <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
               <div class="br-100 relative" id="circle-1">
                  <span class="f7 absolute absolute-center">1</span>
               </div>
            </div>
            <span class="bar bg-light-gray w-5"></span>
            <div class="w2 h2 br-100 bg-light-gray flex justify-center items-center">
               <div class="br-100 relative" id="circle-2">
                  <span class="f7 absolute absolute-center">2</span>
               </div>
            </div>
            <span class="bar bg-light-gray w-5"></span>
            <div class="w2 h2 br-100  bg-light-gray flex justify-center items-center">
               <div class="br-100 relative" id="circle-3">
                  <span class="f7 absolute absolute-center">3</span>
               </div>
            </div>
            <span class="bar bg-light-gray w-5"></span>
            <div class="w2 h2 br-100  bg-light-gray flex justify-center items-center">
               <div class="active-circle bg-blue br-100 relative" id="circle-4">
                  <span class="f7 near-white absolute absolute-center">4</span>
               </div>
            </div>
         </div>
          <h1 class="mt5 mb0 tc">Rank your products</h1>
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
             <div class="w-100 w-80-ns mt5 center flex flex-column">
                <h3 class="tc mt0">{{ ucfirst($t-> trait) }}</h3>
                <div class="flex flex-row flex-wrap justify-center tc">
                    @foreach ( $products as $p )
                       <div class="tc w-100 w-50-m w-30-l mh2 mb3">
                          <h4 class="tc mt0 mh0 justify-center center">{{ ucfirst($p -> name) }}</h4>
                          <div class="flex flex-row tc ph3 justify-center">
                             <div class="mb3 flex flex-column ph2">
                                <input type="radio" name="p1_t1" class=" mb2 pointer q1 justify-center center" id="p1_t1_1" />
                                <label for="p1_t1_1" class=" pointer ">1</label>
                             </div>
                             <div class="mb3 flex flex-column ph2">
                                <input type="radio" name="p1_t1" class=" mb2 pointer q1 justify-center center" id="p1_t1_2" />
                                <label for="p1_t1_2" class=" pointer">2</label>
                             </div>
                             <div class="mb3 flex flex-column ph2">
                                <input type="radio" name="p1_t1" class=" mb2 pointer q1 justify-center center" id="p1_t1_3" />
                                <label for="p1_t1_3" class=" pointer">3</label>
                             </div>
                             <div class="mb3 flex flex-column ph2">
                                <input type="radio" name="p1_t1" class=" mb2 pointer q1 justify-center center" id="p1_t1_4" />
                                <label for="p1_t1_4" class=" pointer">4</label>
                             </div>
                             <div class="mb3 flex flex-column ph2" >
                                <input type="radio" name="p1_t1" class=" mb2 pointer q1 justify-center center" id="p1_t1_5" />
                                <label for="p1_t1_5" class="pointer">5</label>
                             </div>
                          </div>
                       </div>
                    @endforeach
                </div>
             </div>
            @endforeach
          </form>
          <div class="mt5 mb2 tc cf">
             <a href="../admin-step3/{{ $quizId }}" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a href="../admin-step5/{{ $quizId }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Save</a>
          </div>
       </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
