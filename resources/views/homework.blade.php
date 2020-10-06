

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Homework Page</h1>
@stop

@section('content')
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
        <div class="row">
            <div class="col-12 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Add Homework
                </button>


            </div>
        </div>
         <!-- Modal -->
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
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
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->name }}">{{ $subject->name }} - {{ $subject->teacher_name }}</option>
                                            @endforeach
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
                            </div>
                            <div class="col-md-4"></div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

