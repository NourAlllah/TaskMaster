<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    protected $typeModel;
    protected $userModel;
    protected $taskModel;
    protected $statisticskModel;



    public function __construct()
    {
        $this->typeModel = new \App\Models\Type();
        $this->userModel = new \App\Models\User();
        $this->taskModel = new \App\Models\Task();
        $this->statisticskModel = new \App\Models\Statistics();
    }

    public function index(){

        $admins_id =  $this->typeModel->get_admins_id();
        $not_admins_id =  $this->typeModel->get_users_id();

        $all_admins = $this->userModel->get_all_type_of_users($admins_id[0]->id);
        $all_not_admins = $this->userModel->get_all_type_of_users($not_admins_id[0]->id);

        return view('create_task')->with(['admins'=> $all_admins , 'not_admins'=>$all_not_admins ]);

    }

    public function create_task(Request $request){

        $validator = Validator::make($request->all(), [
            'admin' => 'required|integer',
            'task_title' => 'required|string|max:255',
            'task_description' => 'required',
            'not_admin' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->taskModel->create_task_db($request->admin , $request->task_title , $request->task_description , $request->not_admin);

        //$check_statistics_exist = $this->statisticskModel->check_user_statistics_record_exist($request->not_admin);
        return $request;


    }
}
