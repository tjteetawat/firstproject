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
                            <tr>
                                <td>1</td>
                                <td>27/7/2020</td>
                                <td>phisics</td>
                                <td>คำนวณแรงโน้มถ่วงของโลก</td>
                                <td>ส่งแล้ว</td>
                            <tr>
                                <td>2</td>
                                <td>29/7/2020</td>
                                <td>math</td>
                                <td>การบวกเลข</td>
                                <td>ยังไม่ส่ง</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>1/8/2020</td>
                                <td>สังคม</td>
                                <td>สวดมนต์</td>
                                <td>ส่งแล้ว</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2/8/2020</td>
                                <td>คอม</td>
                                <td>coding</td>
                                <td>ส่งแล้ว</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <form method="POST" action="/profile">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                    Title
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2">
                                Subject
                            </div>
                            <div class="col-md-8">
                                <select name="" id="" class="form-control">
                                    <option value="math">Math</option>
                                    <option value="science">Science</option>
                                    <option value="thai">Thai</option>

                                </select>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                    Details
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                    สั่ง
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                    ส่ง
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="date" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-info">History</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
     </body>
