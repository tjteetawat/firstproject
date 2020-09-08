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
                                    <td class="text-center">
                                        @if ($homework->status == "ยังไม่ส่ง")
                                            <a href="{{ url('/homework/'.$homework->id.'/'."no") }}" class="btn btn-danger btn-sm">ยังไม่ส่ง</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."doing") }}" class="btn btn-outline-warning btn-sm">กำลังทำ</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."done") }}" class="btn btn-outline-success btn-sm">ส่งแล้ว</a>
                                        @endif
                                        @if ($homework->status == "กำลังทำ")
                                            <a href="{{ url('/homework/'.$homework->id.'/'."no") }}" class="btn btn-outline-danger btn-sm">ยังไม่ส่ง</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."doing") }}" class="btn btn-warning btn-sm">กำลังทำ</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."done") }}" class="btn btn-outline-success btn-sm">ส่งแล้ว</a>
                                        @endif
                                        @if ($homework->status == "ส่งแล้ว")
                                            <a href="{{ url('/homework/'.$homework->id.'/'."no") }}" class="btn btn-outline-danger  btn-sm">ยังไม่ส่ง</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."doing") }}" class="btn btn-outline-warning btn-sm">กำลังทำ</a>
                                            <a href="{{ url('/homework/'.$homework->id.'/'."done") }}" class="btn btn-success btn-sm">ส่งแล้ว</a>
                                        @endif


                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <form method="POST" action="/homework">
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
                                        <input type="text" class="form-control" name="title" required placeholder="หัวข้องาน">
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
                                <select name="subject" id="" class="form-control" required >
                                    <option value="">*เลือกวิชา</option>
                                    <option value="math">Math</option>
                                    <option value="science">Science</option>
                                    <option value="thai">Thai</option>
                                    <option value="english">English</option>
                                    <option value="social">Social</option>
                                    <option value="กอท.">การงานอาชีพและเทคโนโลยี</option>
                                    <option value="ศิลปะ">ศิลปะ ดนตรี</option>


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
                                        <textarea name="details" class="form-control" id="" cols="30" rows="4" placeholder="หมายเหตุ"></textarea>
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
                                        <input type="date" class="form-control" name="order_date" required>
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
                                        <input type="date" class="form-control" name="submit_date" >
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row">
                    <div class="col-md-4">
                         <a href="{{ route('history') }}" class="btn btn-info">History</a>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
     </body>
