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
}
