<?php

namespace App\Http\Controllers;

use App\Club;
use App\Series_Fixtures;
use App\Ground;
use App\Series_Matches;
use App\Player;
use Session;
use App\TournamentsReference;
use App\Umpire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

/*
    ||-------------------Not In Use-----------------------------||

    ||-------------------````End````----------------------------||
*/
class SeriesFixtureController extends Controller
{

    // public function indes()
    // {
    //     $clubs = Club::where('active_status','0')->pluck('name','id');
    //     $grounds = Ground::where('active_status','0')->pluck('name','id');
    //     $fixtures = Series_Fixtures::where('active_status',0)->get();
    //     return view('admin.fixtures.index',compact('fixtures','clubs','grounds'));
    // }

    // public function fixturedata()
    // {
    //     $fixtures = Series_Fixtures::where('active_status',0)->get();
    //     return Datatables::of($fixtures)
    //         ->addColumn('club1',function($fixture){
    //             return $fixture->club1->name ?? 'NULL';
    //         })
    //         ->addColumn('club2',function($fixture){
    //             return $fixture->club2->name ?? 'NULL';
    //         })
    //         ->addColumn('ground',function($fixture){
    //             return $fixture->ground->name ?? 'NULL';
    //         })
    //         ->addColumn('tournament',function($fixture){
    //             if($fixture->tournament->name)
    //                 return $fixture->tournament->name ?? 'NULL';
    //             else
    //                 return 'Friendly Match';
    //         })
    //         ->addColumn('action',function($fixture){
    //             return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1" data-id="' .$fixture->id. '"
    //             data-club1="' .$fixture->club_id_1. '"
    //             data-club2="' .$fixture->club_id_2. '"
    //             data-date="' .$fixture->match_date. '"
    //             data-time="' .$fixture->match_time. '"
    //             data-ground="' .$fixture->ground_id. '"><i class="glyphicon glyphicon-edit"></i> Change </a>
    //         <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$fixture->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
    //         })
    //         ->addColumn('scoring',function($fixture){
    //             if ($fixture->status == 1)
    //             {
    //                 $match_id = Series_Matches::where('fixture_id',$fixture->id)->first()->id;
    //                 return '<a class="btn-sm btn-warning" href="' .route('scoring.match',$match_id). '">Score</a>';
    //             }
    //             else{
    //                 return '<a class="btn-sm btn-success" href="' .route('editions.lineup',encrypt($fixture->id)). '">Lineup</a>';
    //             }
    //         })
    //         ->rawColumns(['action','scoring'])
    //         ->make(true);
    // }


    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index($id)
    // {

    //     $id = decrypt($id);
    //     $club1 = Series_Fixtures::where('id',$id )->get();
    //     $type = TournamentsReference::select('tournament_type_id')->where('id',$club1[0]->refer_id)->first()->tournament_type_id;


    //     //  return $club1[0]->club1->name;
    //     $club2 = Series_Fixtures::where('id',$id )->get();

    //     $players1 = Player::where('active_status',0)->where('club_id',$club1[0]->club_id_1)->get();
    //     $players2 = Player::where('active_status',0)->where('club_id',$club2[0]->club_id_2)->get();

    //     $umpires = Umpire::all();
    //     //  return $umpires;


    //     return view('admin.tournaments.editions.lineup',compact('club1','club2','umpires','players1','players2','type'));
    
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $wk_count = 0;
    //     $b_count = 0;
    //     if (sizeof($request->player_id1) < 11 && sizeof($request->player_id1) < 11)
    //     {
    //         return "both";
    //         Session::flash('players_length3','Kinldy Select Complete Playing 11 To Avoid Embarssment');
    //         return redirect()->back()->withInput($request->all());
    //     }
    //     elseif (sizeof($request->player_id1) < 11)
    //     {
    //         return "one";
    //         Session::flash('players_length1','Kinldy Select Complete Playing 11 To Avoid Embarssment');
    //         return redirect()->back()->withInput($request->all());
    //     }
    //     elseif (sizeof($request->player_id2) < 11)
    //     {
    //         return "two";
    //         Session::flash('players_length2','Kinldy Select Complete Playing 11 To Avoid Embarssment');
    //         return redirect()->back()->withInput($request->all());
    //     }
    //     else {
    //         foreach ($request->player_id1 as $player)
    //         {
    //             $roleid = Player::where('id',$player)->first()->role_id;
    //             if ($roleid == 4){ $wk_count = $wk_count + 1; }
    //             elseif ($roleid == 2 ||$roleid == 3){ $b_count = $b_count + 1; }
    //         }
    //         if ($wk_count == 0) { return "wk1"; }
    //         elseif ($b_count < 5) { return "b1"; }
    //         $wk_count=0;
    //         $b_count=0;
    //         foreach ($request->player_id2 as $player)
    //         {
    //             $roleid = Player::where('id',$player)->first()->role_id;
    //             if ($roleid == 4){ $wk_count = $wk_count + 1; }
    //             elseif ($roleid == 2 ||$roleid == 3){ $b_count = $b_count + 1; }
    //         }
    //         if ($wk_count == 0) { return "wk2"; }
    //         elseif ($b_count < 5) { return "b2"; }

    //     //  return $request->player_id1[0];
    //         $match = DB::table('series_matches')->insertGetId([
    //             'toss' => $request->toss,
    //             'club_id_1' => $request->club1,
    //             'club_id_2' => $request->club2,
    //             'ground_id' => $request->ground_id,
    //             'tournament_id' => $request->tournament_id,
    //             'umpire_id' => $request->umpire_id,
    //             'match_date' => $request->date,
    //             'match_type_id' => $request->match_type_id,
    //             'choose_to' => $request->choose_to,
    //             'fixture_id'=> $request->fixture_id
    //         ]);
    //         if($match)
    //         {
    //             Series_Fixtures::where('id', $request->fixture_id)->update([
    //                 'status' => '1'
    //             ]);
    //         }

    //         $toss = Series_Matches::select('toss')->where('id', $match)->first()->toss;
    //         $c1 = 0;
    //         $c2 = 0;
    //         if ($toss == $request->club1 && $request->choose_to == 1) {
    //     //  club1 innings1
    //            // echo 'agya c1_I1';
    //             $c1 = 1;
    //             $c2 = 2;
    //         } elseif ($toss == $request->club1 && $request->choose_to == 2) {
    //     //  club1 innings2
    //            // echo 'agya c1_I2';
    //             $c1 = 2;
    //             $c2 = 1;
    //         } elseif ($toss == $request->club2 && $request->choose_to == 1) {
    //     //  club1 innings2
    //           //  echo 'agya c1_I2';
    //             $c1 = 2;
    //             $c2 = 1;
    //         } elseif ($toss == $request->club2 && $request->choose_to == 2) {
    //     //  club1 innings1
    //          //   echo 'agya c1_I1';
    //             $c1 = 1;
    //             $c2 = 2;
    //         }


    //         foreach ($request->player_id1 as $player) {
    //             DB::table('lineups')->insertGetId([
    //                 'match_id' => $match,
    //                 'player_id' => $player,
    //                 'club_id' => $request->club1,
    //                 'innings_no' => $c1,
    //             ]);

    //         }
    //         foreach ($request->player_id2 as $player) {
    //             DB::table('lineups')->insertGetId([
    //                 'match_id' => $match,
    //                 'player_id' => $player,
    //                 'club_id' => $request->club2,
    //                 'innings_no' => $c2,
    //             ]);

    //         }
    //         return $match;
    //         return redirect( route('scoring.match',$match));
    //     //  return response()->json(array('success' => true, 'html' => $returnHtml));
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    // public function checkmatch($fixtureId)
    // {
    //     $status = DB::table('series_matches')->where('fixture_id',$fixtureId)->first()->status;
    //     $matchId = DB::table('series_matches')->where('fixture_id',$fixtureId)->first()->id;
    //     if($status == '0' || $status == '1')
    //     {
    //         return redirect(route('series.scoring.match',$matchId));
    //     }
    //     elseif ($status == '2') 
    //     {
    //         return redirect(route('series.scorecard',$matchId));
    //     }
    //     else
    //     {
    //         return view('unauthorized');
    //     }
    // }
}
