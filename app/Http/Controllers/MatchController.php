<?php

namespace App\Http\Controllers;

use App\Club;
use App\Ground;
use App\Match;
use App\MatchType;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;
use DataTables;

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
        return view('admin.matches.index',compact('matches'));


    }
    public function matchdata()
    {
        $matches = Match::all();
        return Datatables::of($matches)
        ->addColumn('club1',function($match){
            if($match->club1->name)
                return $match->club1->name;
            else
                return Null;
        })
        ->addColumn('club2',function($match){
            if($match->club2->name)
                return $match->club2->name;
            else
                return Null;
        })
        ->addColumn('winner',function($match){
            if($match->winner->name)
                return $match->club2->name;
            else
                return Null;
        })
        ->addColumn('pitch',function($match){
            if($match->pitch->name)
                return $match->pitch->name;
            else
                return Null;
        })
        ->addColumn('umpire',function($match){
            if($match->umpire->name)
                return $match->umpire->name;
            else
                return Null;
        })
        ->addColumn('ground',function($match){
            if($match->ground->name)
                return $match->ground->name;
            else
                return Null;
        })
        ->addColumn('tournament',function($match){
            if($match->tournament->name)
                return $match->tournament->name;
            else
                return Null;
        })
        ->addColumn('vs',function(){
            return 'VS';
        })
        ->make(true);


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
