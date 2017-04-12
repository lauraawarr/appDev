<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Admin</title>

    </head>
    <body>

        <!-- Submit input question to database -->
        <div class="addQuestion">
            <input id="submitQuestionInput" type='text'></input>
            <input id="submitQuestion" type='submit'></input>

            @foreach ( $questions as $q )
                <div>{{ $q -> question }}</div>
            @endforeach
        </div>

        <br />

        <!-- Submit input product to database -->
        <div class="addProduct">
            <input id="submitProductName" type='text'></input>
            <input id="submitProductDescription" type='text'></input>
            <input id="submitProduct" type='submit'></input>

            @foreach ( $products as $p )
                <div>{{ $p -> id }}
                {{ $p -> name }}<div/>
            @endforeach
        </div>

        <div class="error"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
    </body>
</html>
