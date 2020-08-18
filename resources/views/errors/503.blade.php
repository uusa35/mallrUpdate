<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: auto;
        }

        body {
            margin: 0;
            padding: 0;
            padding-top: 50px;
            color: #B0BEC5;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
            display: flex;
            width: 100%;
            height: auto;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            flex-wrap: nowrap;
        }

        .container {
            flex-direction: row;
            justify-content: center;
            align-items: center;

        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-self: center;
            text-align: center;
            flex-wrap: nowrap;
        }

        .title {
            font-size: 72px;
            margin-top: 13%;
        }

        .link {
            text-decoration: none;
            font-size: 72px;
            color: darkgoldenrod;
        }

        @media only screen and (max-width: 400px) {
            .pdf-frame {
                width: 200px;
                min-height: 500px;
            }
        }

        @media screen and (max-width: 400px) and (min-width: 1000px), (min-width: 1100px) {
            .pdf-frame {
                width: 600px;
                min-height: 500px;
            }
        }

        .header {
            width: 100%;
            /*height: 20%;*/
            background-color: white;
            margin-bottom: 10px;
            clear: both;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 3%;
            padding: 20px;
            border-top: 1px solid whitesmoke;
            background-color: lightgrey;
            text-align: center;
            justify-content: center;
            align-items: center;
            align-self: center;
        }

        a {
            color: darkgoldenrod;
        }

        .social {
            font-size: 25px;
            text-align: center;
            margin: 20px
        }

        .img-logo {
            width: auto;
            height: auto;
            max-height: 150px;
            border-radius: 10px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="header">
            <a href="{{ url('/') }}">
                <img src="{{ App\Models\Setting::first()->logoThumb }}" alt="{{ env('APP_NAME') }}" class="img-xs"/>
            </a>
        </div>
        <div class="title">
            {{ $exception->getMessage() }}
        </div>
        <div class="text-center"><a href="{{ url('/') }}">{{ trans('general.back') }}</a></div>
    </div>
</div>
{{--<footer>--}}
{{--    <a href="https://www.instagram.com/harayer7/" class="social" target="_blank"><i--}}
{{--                class="fa fa-instagram"></i></a>--}}
{{--    <a href="https://www.twitter.com/harayer7/" class="social" target="_blank"><i--}}
{{--                class="fa fa-twitter"></i></a>--}}
{{--    </div>--}}
{{--</footer>--}}
</body>
</html>
