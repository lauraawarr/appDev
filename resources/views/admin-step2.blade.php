<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Step 2</title>

        <link rel="stylesheet" href="../css/tachyons.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="avenir-next pa4 bg-washed-blue fw3 f5">
       <nav class="pb4 bb bw1 b--lightest-blue flex justify-start">
          <a href="" class="link dark-gray mr4 pb2 bb bw1 b--blue">Quizzes</a>
          <a href="" class="link dark-gray mr4 pb2">Create quiz</a>
       </nav>
        <div class="bg-white mt5 pv5">
          <h1 class="mt0 tc">Add your products</h1>
          <form>
             <div class="w-50 mt5 center" id="question-1">
                <h3 class="f5">Product name</h3>
                <div class="mb4">
                   <input id="submitProduct-Name" type="text" class="ba bw1 b--light-silver h2 pv3 w-100 br1 pointer" />
                </div>
                <h3 class="f5">Description</h3>
                <div class="mb4">
                   <textarea id="submitProduct-Description" name="textarea" rows="10" cols="50" class="ba bw1 b--light-silver h3 w-100 br1 pointer"></textarea>
                </div>
                <h3 class="f5">Image <i><span id='image-name'></span></i></h3>
                <div class="mb4 pb4 bb bw1 b--light-gray">
                  <input id="file-upload" type="file" onchange="previewFile()" class="o-0 overflow-hidden z--1 absolute" />
                  <label for="file-upload" class="custom-file-upload dib dim b--blue bg-blue f6 white tc pv2 w-100 br1 pointer">Choose file</label>
                  <input id="submitProduct" type="button" value="Add product" class="submit dim ba bw1 b--blue bg-blue f6 white pv3 ph0 w-100 br1 mt4 pointer">

                </div>
             </div>
          </form>

          <div class="mt5 mb2 tc">
             <a href="../admin-step1/{{ $quizId }}" class="dim bg-silver  br1 pv3 ph5 f6 link white">Back</a>
             <a href="../admin-step3/{{ $quizId }}" class="dim bg-blue br1 pv3 ph5 f6 link white">Next</a>
          </div>

          <!-- Product upload preview -->
          <div id="products">
             <img src="" height="200">
          </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>
