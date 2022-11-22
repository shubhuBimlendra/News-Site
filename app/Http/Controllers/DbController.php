<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import
use DB;
use App\Models\Employee;

class DbController extends Controller
{
    //
    public function index(){
        $all = DB::table('employee')->select('name','email','city')->get();
        /*$all = DB::table('employee')->pluck('name','email')->get();
        $single = DB::table('employee')->first();
        $order = DB::table('employee')->orderBy('id','DESC')->get();
        $limit = DB::table('employee')->orderBy('id','DESC')->limit(1)->get();
        $count = DB::table('employee')->count();
        $offset = DB::table('employee')->orderBy('salary','DESC')->offset(0)->limit(1)->get();
        $min = DB::table('employee')->min('salary');*/
        dd($all); //helper
    }

    //Inner Join
    public function joining(){
        $result = DB::table('order')
                ->join('user','user.id', '=', 'order.user_id')
                ->select('order.id','user.name','order.amount','order.order_date')
                ->where('status',1)
                ->get();
                dd($result);
    }

    //Model
    public function model(){
        $result1 = Employee::all();
        dd($result1);
    }
}


