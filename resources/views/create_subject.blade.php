

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create subject page</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <form method="POST" action="/create_subject">
            @csrf

            <div class="row">
                <div class="col-md-2 text-center">
                    Subject name
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="subject" required placeholder="**ชื่อวิชา">
                </div>
            </div>
            <div class="row mt-2 text-center">
                <div class="col-md-2">
                    Teacher name
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="teacher" required placeholder="**ชื่อคุณครู">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
                <div class="col-md-6"></div>


            </div>
        </form>
    </div>
</div>








@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
