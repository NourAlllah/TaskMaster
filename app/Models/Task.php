<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    public function create_task_db($assigned_by_id , $title, $description, $assigned_to_id){

        date_default_timezone_set('Africa/Cairo');
        $date = date('Y-m-d H:i:s', time());

        DB::table('tasks')->insert([
            'title' => $title,
            'description' => $description,
            'assigned_to_id' => $assigned_to_id,
            'assigned_by_id' => $assigned_by_id,
            'created_at' => $date
        ]);
    }

    public function get_all_tasks($page ){

        $tasks_per_page = 10;
        $offset = ($page - 1) * $tasks_per_page;

        $tasks = DB::select('SELECT data.title , data.description  , data.assigned_by_id  , data.assigned_to_id , 
            data.user_name , users.name as admin_name
            from (SELECT tasks.title , tasks.description , tasks.assigned_by_id , tasks.assigned_to_id ,  users.name as user_name  
            FROM convertedin.tasks inner join convertedin.users on users.id = tasks.assigned_to_id ) as data 
            inner join convertedin.users on users.id = data.assigned_by_id   LIMIT ?, ?', [$offset, $tasks_per_page]);
        $number_of_tasks = DB::select('SELECT COUNT(task_id) AS NumberOfTasks FROM tasks;');

        return [$tasks, $number_of_tasks];
    }
    
   
}
