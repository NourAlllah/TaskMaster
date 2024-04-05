<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create_task.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
</body>
    <h1 id="title">Create Task</h1>
    <div id="form-outer">
        <form id="create_task_form" method="POST" action="{{ route('create_task') }}">
            @csrf
            <div class="rowTab">
                <div class="labels">
                    <label for="admins">Admin Name</label>
                </div>
                <div class="rightTab">
                    <select id="admin" name="admin" class="dropdown" required>
                        <option  value='' hidden >Select Name</option>
                        @foreach ($admins as $admin)
                            <option  value="{{$admin->id}}">{{$admin->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="rowTab">
                <div class="labels">
                    <label for="task_title">* Title: </label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="task_title" id="task_title" class="input-field" placeholder="Enter task title" required>
                </div>
            </div>
           
            <div class="rowTab">
                <div class="labels">
                    <label for="task_description">Task Description</label>
                </div>
                <div class="rightTab">
                    <textarea id="task_description" class="input-field" style="height:50px;resize:vertical;" name="task_description" placeholder="Enter your task description here..." required></textarea>
                </div>
            </div>

            <div class="rowTab">
                <div class="labels">
                    <label for="not_admins">User Name</label>
                </div>
                <div class="rightTab">
                    <select id="not_admins" name="not_admin" class="dropdown" required>
                        <option value='' hidden >Select assigned to Name</option>
                        @foreach ($not_admins as $not_admin)
                            <option  value="{{$not_admin->id}}">{{$not_admin->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="submit" type="submit">Submit</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
        
    </div>
</html>

