<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $Products = DB::select('select * from products');
        $Orders = DB::table('orders')
        ->where(['orders.user_id' => $user_id])
        ->select('orders.*')
        ->count();
        return view('home',['Products'=>$Products],['Orders'=>$Orders]);
    }
}
