<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
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
    </head>
    <body>
        <div class="container">
            <div class="row border">
                <div class="col-8 border border-danger">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure velit minima, odio repellat nam architecto excepturi ducimus facilis nisi vel rerum minus dicta reprehenderit quaerat quam inventore, aperiam ratione quod?
                </div>
                <div class="col-4 border border-primary">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro quam eligendi aperiam sequi laboriosam, ex amet non culpa quos nobis, illo sit aliquam. Fugit minus eligendi ea optio. Eligendi, sapiente?
                </div>

            </div>
        </div>

    </body>
