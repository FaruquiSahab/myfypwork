<?php

namespace App\Http\Controllers;

use App\Club;
use App\Ground;
use App\Match;
use App\MatchType;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::all();
        $grounds = Ground::pluck('name','id')->all();
        $clubs = Club::pluck('name','id')->all();
        $tournaments = Tournament::pluck('name','id')->all();
        $match_types = MatchType::pluck('type_name','id')->all();
        return view('admin.matches.index',compact('matches','grounds','clubs','tournaments','match_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matches = Match::all();
        $grounds = Ground::pluck('name','id')->all();
        $clubs = Club::pluck('name','id')->all();
        $tournaments = Tournament::pluck('name','id')->all();
        $match_types = MatchType::pluck('type_name','id')->all();

        return view('admin.matches.create', compact('matches','grounds','clubs','tournaments','match_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();


        $input['club_id_1'] = $request->club_id_1;

        $input['club_id_2'] = $request->club_id_2;

        $input['ground_id'] = $request->ground_id;

        $input['tournament_id'] = $request->tournament_id;

        $input['date'] = $request->date;


        Match::create($input);


        Session::flash('created_match','The match has been created.');
        return redirect('/admin/matches');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
