<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <style>
            body, html, #app{
                height: 100%;
            }
            .bg { 
                /* The image used */
                /* background-image: url("/images/IMG_1.jpg"); */

                /* Full height */
                height: 100%; 

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body>
        <!-- <div class="bg" style="background-image: url('/images/IMG_1.jpg');">
        </div> -->
        <div id="app">
            <test></test>
            <!-- <router-link to="/home">Home</router-link>
            <router-view></router-view> -->
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
