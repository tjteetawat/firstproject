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
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                              <th class="text-center">ID</th>
                              <th>Submit Date</th>
                              <th>Subject</th>
                              <th>Title</th>
                              <th class="text-center">Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homeworks as $homework)
                            <tr>
                                <td class="text-center">{{ $homework->id }}</td>
                                <td class="text-center">{{ $homework->submit_date }}</td>
                                <td class="text-center">{{ $homework->subject }}</td>
                                <td>{{ $homework->title }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <span class="btn btn-info btn-sm">ส่งแล้ว</span>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."no") }}" class="btn btn-success btn-sm">แก้ไข</a>
                                        </div>
                                        <div class="col-md-6 text-right">
                                             <!-- add link to this href -->
                                            <a href="" class="btn btn-danger btn-sm ">Clear</a>
                                        </div>

                                    </div>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <!-- add class to this button -->
                    <a href="{{ route('homework') }}">Homework</a>
                </div>
            </div>

        </div>

     </body>
