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

}
