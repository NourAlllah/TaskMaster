<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistics extends Model
{
    use HasFactory;

    public static  function check_user_statistics_record_exist($assigned_to_id){

        return DB::select('SELECT * FROM statistics WHERE user_id = ? ;',[$assigned_to_id]);

    }

   /*  public function create_user_statistics_record($assigned_to_id){

        date_default_timezone_set('Africa/Cairo');
        $date = date('Y-m-d H:i:s', time());

        DB::table('statistics')->insert([
            'user_id' => $assigned_to_id,
            'number_of_tasks' => 1,
            'created_at' => $date
        ]);


    } */

   /*  public function update_user_statistics($assigned_to_id){

        date_default_timezone_set('Africa/Cairo');
        $date = date('Y-m-d H:i:s', time());

        DB::update("UPDATE statistics SET number_of_tasks = number_of_tasks + 1 and updated_at = ? WHERE user_id = ?", [$date, $assigned_to_id]);

    } */
}
