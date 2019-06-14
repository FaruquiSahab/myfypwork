<?php

namespace App\Http\Controllers;

use App\Player;
use App\Fixture;
use Illuminate\Http\Request;

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
        $batsman_count = Player::select('role_id')->where('role_id','=',1)->count();
        $bowler_count = Player::select('role_id')->where('role_id','=',2)->count();
        $wk_count = Player::select('role_id')->where('role_id','=',4)->count();
        $allrounder_count = Player::select('role_id')->where('role_id','=',3)->count();
        $fixtures = Fixture::inRandomOrder()->limit(5)->get();
        return view('admin.index',compact('batsman_count','bowler_count','wk_count','allrounder_count','fixtures'));
    }
}
