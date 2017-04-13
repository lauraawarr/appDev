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
        <!-- Input IDs are used to differentiate between callback functions -->

        <!-- Submit input product to database -->
        <div class="addProduct">
            <input id="submitProduct-Name" placeholder='name'  type='text'></input>
            <input id="submitProduct-Description" placeholder='description' type='text'></input>
            <input id="submitProduct-Image" placeholder='image' type='text'></input>
            <input id="submitProduct" type='submit'></input>

            @foreach ( $products as $p )
                <div>
                    {{ $p -> id }}
                    {{ $p -> name }}
                </div>
            @endforeach
        </div>

        <br />

        <!-- Submit input question to database -->
        <div class="addTrait">
            <input id="submitTrait-Trait" placeholder='trait' type='text'></input>
            <input id="submitTrait" type='submit'></input>

            @foreach ( $traits as $t )
                <div>{{ $t -> trait }}</div>
            @endforeach
        </div>

        <!-- For each 'topic' assign ranking to each product -->
        <div class="addRank">
            @foreach ( $traits as $t )

                <div  id="topic-{{ $t -> inventoryCol }}"> 
                    <h2>Rank each product's: <i>{{ $t -> trait }}</i></h2>

                    @foreach ( $products as $p )
                        <div>
                            {{ $p -> id }}
                            {{ $p -> name }}
                            <form>
                              <input type="radio" name="rank" value="1" checked> 1
                              <input type="radio" name="rank" value="2"> 2
                              <input type="radio" name="rank" value="3"> 3 
                              <input type="radio" name="rank" value="4"> 4
                              <input type="radio" name="rank" value="5"> 5
                            </form>
                        </div>
                    @endforeach 

                </div>

            @endforeach
            <input class="navRank" type='button' value='Prev'></input>
            <input class="navRank" type='button' value='Next'></input>
        </div>

        <div class="error"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
    </body>
</html>
