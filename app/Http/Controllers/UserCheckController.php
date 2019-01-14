<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCheck;
use Illuminate\Http\Request;

class UserCheckController extends Controller
{


    public function index()
    {
        $posts = UserCheck::all();
//    return $posts;
        return view('check.index',compact('posts'));
    }


    public function store(Request $request)
    {


       $array =  array();

       $array['title'] = $request->title;
        $array['post'] = $request->post;
        $array['name'] = $request->name;
        $array['user'] = $request->user;

              UserCheck::create($array);

        return redirect(route('check.user.index'));

    }



}