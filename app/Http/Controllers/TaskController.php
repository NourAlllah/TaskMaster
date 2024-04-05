<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $typeModel;
    protected $userModel;


    public function __construct()
    {
        $this->typeModel = new \App\Models\Type();
        $this->userModel = new \App\Models\User();

    }

    public function index(){

        $admins_id =  $this->typeModel->get_admins_id();
        $not_admins_id =  $this->typeModel->get_users_id();

        $all_admins = $this->userModel->get_all_type_of_users($admins_id[0]->id);
        $all_not_admins = $this->userModel->get_all_type_of_users($not_admins_id[0]->id);

        return view('create_task')->with(['admins'=> $all_admins , 'not_admins'=>$all_not_admins ]);
        
    }
}
