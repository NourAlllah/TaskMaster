<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Type extends Model
{
    use HasFactory;

    public function get_admins_id(){

        return DB::select('SELECT id FROM types WHERE type = ? ;',['Admin']);

    }

    public function get_users_id(){

        return DB::select('SELECT id FROM types WHERE type = ? ;',['Not-Admin']);

    }
}
