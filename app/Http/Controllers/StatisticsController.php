<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    protected $statisticskModel;

    public function __construct()
    {
        $this->statisticskModel = new \App\Models\Statistics();

    }

    public function index(){

        $all_statistics = $this->statisticskModel->get_all_statistics_records();
        return view('statistics_page')->with(['ranks'=>$all_statistics]);
    }
}
