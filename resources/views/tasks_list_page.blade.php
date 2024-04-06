<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Task Page list</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/table.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <h1 id="title">Tasks list</h1>
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
    </body>
</html>