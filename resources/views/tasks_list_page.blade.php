@extends('layout.layout')

@section('header')
    <title>Task Page list</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}">
@endsection

@section('content')
    <h1 id="title">Tasks list</h1>
    <span class="top_users_span"><a href="{{route('statistics')}}" class="top_users" target="blank">Top 10</a></span>
    <div class="table-container">
        <table >
            <tr>
                <th>Title </th>
                <th>Description</th>
                <th>Assigned Name</th>
                <th>Admin Name</th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->user_name}}</td>
                    <td>{{$task->admin_name}}</td>
                </tr>
            @endforeach

        </table>
            @include('layout.pagination')
    </div>
@endsection