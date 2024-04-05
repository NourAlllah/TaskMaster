<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create_task.css') }}">

</head>
<body>
    
</body>
    <h1 id="title">Create Task</h1>
    <div id="form-outer">
        <form id="survey-form" method="GET" action="https://crossorigin.me/https://freecodecamp.com">
            <div class="rowTab">
                <div class="labels">
                    <label for="admins">Admin Name</label>
                </div>
                <div class="rightTab">
                    <select id="dropdown" name="admins" class="dropdown" required>
                        <option  value='' hidden >Select Name</option>
                        @foreach ($admins as $admin)
                            <option  value="{{$admin->id}}">{{$admin->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="rowTab">
                <div class="labels">
                    <label id="name-label" for="name">* Title: </label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="name" id="name" class="input-field" placeholder="Enter task title" required>
                </div>
            </div>
           
            <div class="rowTab">
                <div class="labels">
                    <label for="comments">Task Description</label>
                </div>
                <div class="rightTab">
                    <textarea id="comments" class="input-field" style="height:50px;resize:vertical;" name="comment" placeholder="Enter your task description here..."></textarea>
                </div>
            </div>

            <div class="rowTab">
                <div class="labels">
                    <label for="not_admins">User Name</label>
                </div>
                <div class="rightTab">
                    <select id="dropdown" name="not_admins" class="dropdown" required>
                        <option value='' hidden >Select assigned to Name</option>
                        @foreach ($not_admins as $not_admin)
                            <option  value="{{$not_admin->id}}">{{$not_admin->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="submit" type="submit">Submit</button>
        </form>
    </div>
</html>

