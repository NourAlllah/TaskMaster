<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Exception;

use App\Jobs\UpdateStatistics;
use App\Jobs\ProcessBackgroundJob;


class TaskController extends Controller
{
    protected $typeModel;
    protected $userModel;
    protected $taskModel;

    public function __construct()
    {
        $this->typeModel = new \App\Models\Type();
        $this->userModel = new \App\Models\User();
        $this->taskModel = new \App\Models\Task();
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

        UpdateStatistics::dispatch($request->not_admin);
        //ProcessBackgroundJob::dispatch('nouro and moro');
        return Redirect::to(route('tasks_page'));

    }

    public function tasks_list_page(){
        return view('tasks_list_page');
    }
}
