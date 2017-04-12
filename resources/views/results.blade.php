<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Results</title>

    </head>
    <body>

        <div class="results">
            @foreach ($result as $r)
                <div>
                    <h3>{{ $r  }}</h3>
                   
                </div>
            @endforeach
        </div>
    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script type="text/javascript" src="js/results.js"></script>

    </body>
</html>
