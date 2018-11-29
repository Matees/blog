<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;*/
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /*height: 100vh;*/
                /*margin: 0;*/
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                background-color: rgba(0, 0, 0, 0.7);
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            * {
                margin:0;
                padding: 0  ;
            }

            .background-wrap{
                position: fixed;
                z-index: -100;
                width:100%;
                height:100%;
                overflow: hidden;
                top:0;
                left:0;
            }

            #video-element {
                position: absolute;
                top:0;
                left:0;
                min-height: 100%;
                max-width: 100%;
            }

            .content {
                position: absolute;
                width:100%;
                min-height:100%;
                z-index: 100;
                background-color: rgba(0, 0, 0, 0.7);
            }
        </style>
    </head>
<body>

<div class="flex-center position-ref full-height">
    <h1 style="font-size: 50px">Welcome</h1>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                <a href="{{ route('books.index') }}">Books</a>
                @endauth
        </div>
    @endif
</div>
<div class="background-wrap">
    <video id="video-element" preload="auto" autoplay="true" loop="loop" muted="muted">
        <source src="{{URL::to('/')}}/video.mp4" type="video/mp4">
    </video>
</div>
</body>
</html>
