<?php

namespace App\Http\Controllers;

use App\Club;
use App\Fixture;
use App\Ground;
use App\Match;
use App\Player;
use Session;
use App\TournamentsReference;
use App\Umpire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class FixtureController extends Controller
{
    public function indes()
    {
        $clubs = Club::pluck('name','id');
        $grounds = Ground::pluck('name','id');
        $fixtures = Fixture::where('active_status',0)->get();
        return view('admin.fixtures.index',compact('fixtures','clubs','grounds'));
    }

    public function fixturedata()
    {
        $fixtures = Fixture::where('active_status',0);
        return Datatables::of($fixtures)
            ->addColumn('club1',function($fixture){
                return $fixture->club1->name ?? 'NULL';
            })
            ->addColumn('club2',function($fixture){
                return $fixture->club2->name ?? 'NULL';
            })
            ->addColumn('ground',function($fixture){
                return $fixture->ground->name ?? 'NULL';
            })
            ->addColumn('tournament',function($fixture){
                if($fixture->tournament->name)
                    return $fixture->tournament->name ?? 'NULL';
                else
                    return 'Friendly Match';
            })
            ->addColumn('action',function($fixture){
                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1" data-id="' .$fixture->id. '"
                data-club1="' .$fixture->club_id_1. '"
                data-club2="' .$fixture->club_id_2. '"
                data-date="' .$fixture->match_date. '"
                data-time="' .$fixture->match_time. '"
                data-ground="' .$fixture->ground_id. '"><i class="glyphicon glyphicon-edit"></i> Change </a>
            <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$fixture->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $id = decrypt($id);
        $club1 = Fixture::where('id',$id )->get();
        $type = TournamentsReference::select('tournament_type_id')->where('id',$club1[0]->refer_id)->first()->tournament_type_id;


        //  return $club1[0]->club1->name;
        $club2 = Fixture::where('id',$id )->get();

        $players1 = Player::where('club_id',$club1[0]->club_id_1)->get();
        $players2 = Player::where('club_id',$club2[0]->club_id_2)->get();

        $umpires = Umpire::all();
        //  return $umpires;


        return view('admin.tournaments.editions.lineup',compact('club1','club2','umpires','players1','players2','type'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (sizeof($request->player_id1) < 11 && sizeof($request->player_id1) < 11)
        {
            Session::flash('players_length3','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        elseif (sizeof($request->player_id1) < 11)
        {
            Session::flash('players_length1','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        elseif (sizeof($request->player_id2) < 11)
        {
            Session::flash('players_length2','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        else {

        //  return $request->player_id1[0];
            $match = DB::table('matches')->insertGetId([
                'toss' => $request->toss,
                'club_id_1' => $request->club1,
                'club_id_2' => $request->club2,
                'ground_id' => $request->ground_id,
                'tournament_id' => $request->tournament_id,
                'umpire_id' => $request->umpire_id,
                'match_date' => $request->date,
                'match_type_id' => $request->match_type_id,
                'choose_to' => $request->choose_to,
                'fixture_id'=> $request->fixture_id
            ]);
            if($match)
            {
                Fixture::where('id', $request->fixture_id)->update([
                    'status' => '1'
                ]);
            }

            $toss = Match::select('toss')->where('id', $match)->first()->toss;
            $c1 = 0;
            $c2 = 0;
            if ($toss == $request->club1 && $request->choose_to == 1) {
        //  club1 innings1
               // echo 'agya c1_I1';
                $c1 = 1;
                $c2 = 2;
            } elseif ($toss == $request->club1 && $request->choose_to == 2) {
        //  club1 innings2
               // echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 1) {
        //  club1 innings2
              //  echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 2) {
        //  club1 innings1
             //   echo 'agya c1_I1';
                $c1 = 1;
                $c2 = 2;
            }


            foreach ($request->player_id1 as $player) {
                DB::table('lineups')->insertGetId([
                    'match_id' => $match,
                    'player_id' => $player,
                    'club_id' => $request->club1,
                    'innings_no' => $c1,
                ]);

            }
            foreach ($request->player_id2 as $player) {
                DB::table('lineups')->insertGetId([
                    'match_id' => $match,
                    'player_id' => $player,
                    'club_id' => $request->club2,
                    'innings_no' => $c2,
                ]);

            }

            return redirect( route('scoring.match',$match));
        //  return response()->json(array('success' => true, 'html' => $returnHtml));
        }
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

    public function checkmatch($fixtureId)
    {
        $status = DB::table('matches')->where('fixture_id',$fixtureId)->select('status')->first()->status;
        $matchId = DB::table('matches')->where('fixture_id',$fixtureId)->select('id')->first()->id;
        if($status == '0' || $status == '1')
        {
            return redirect(route('scoring.match',$matchId));
        }
        elseif ($status == '2') 
        {
            return redirect(route('scorecard',$matchId));
        }
    }
}
