<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncium;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

DB::raw('...');

class ChartController extends Controller
{
    public function index(){

    }

    public function barChart(){
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);

        return view('home', compact('chart'));
    }
}
