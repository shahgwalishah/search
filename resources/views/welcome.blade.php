<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label>Search : </label>
                <form class="form" action="{{route('search-result')}}" method="GET">
                    <input type="search" name="search" class="form-control" />
                    <button>Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            @if(isset($data) && count($data) > 0)
                <div class="col-md-12">
                    <h1>Search Results</h1>
                </div>
                @foreach($data as $results)
                    @if(isset($results->image))
                    <div class="col-md-12" onclick="window.location.href='{{$results->link->href}}'" style="border: 1px solid #efefef;cursor: pointer;">
                        <h3>{{$results->link->domain}}</h3>
                        <img style="width: 40px;40px;" src="{{$results->image->src}}" alt="{{$results->image->alt}}" />
                        <p>{{$results->link->title}}</p>
                    </div>
                    @endif
                    @if(isset($results->description))
                    <div class="col-md-12" onclick="window.location.href='{{$results->link}}'" style="border: 1px solid #efefef;cursor: pointer;">
                        <h3>{{$results->title}}</h3>
                        <p>{{$results->description}}</p>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <br>
    <br>
    <br>
    </body>
</html>
