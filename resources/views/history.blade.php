@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>History Page</h1>
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
                    @if ($homeworks->count()==0)
                        <tr>
                            <td class="text-center" colspan="5"><p class="text-secondary">No history...</p> </td>
                        </tr>
                    @else
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
                                        <a href="{{ route('clear_homework',$homework->id) }}" class="btn btn-danger btn-sm ">Clear</a>
                                    </div>

                                </div>

                            </td>
                        </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
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





