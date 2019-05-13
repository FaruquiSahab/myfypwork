<?php

namespace App\Http\Controllers;

use App\Club;
use App\Ground;
use App\MatchType;
use App\Player;
use App\Series;
use App\Series_Fixtures;
use App\Series_Matches;
use App\Umpire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::pluck('name','id');
        // changes
        $fix = Series_Fixtures::all();
        $series = Series::all();



        $series_type = MatchType::pluck('type_name','id');
        $grounds = Ground::where('active_status',0)->pluck('name','id');

        // return $series[0]->name;
        return view('admin.series.index1',compact('clubs','series_type','grounds','series','series_fixtures'));
    }

//    function seriesdata()
//    {
//        $series = Series::all();
//        return Datatables::of($series)
//            // ->addColumn('image',function($club)
//            // {
//            //     return  '<img height="50" src="'. $club->photo->file .'>';
//            // })
//            //
//            ->addColumn('name',function($series)
//            {
//                return '<strong>'.$series->name.'</strong>';
//            })
//
//            ->addColumn('action', function($series)
//            {
//                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1" data-id="' .$series->id. '" data-name="' .$series->name. '"><i class="glyphicon glyphicon-edit"></i> Change </a>
//                                <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$series->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
//            })
//            ->rawColumns(['action','name'])
//            ->make(true);
//    }

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

        $input['name'] = $request->name;
        $input['club_id_1'] = $request->club_id_1;
        $input['club_id_2'] = $request->club_id_2;
        $input['series_type_id'] = $request->series_type_id;
        $input['starting_date'] = $request->starting_date;
        $input['series_days'] = $request->series_days;
        $input['ground_id'] = $request->ground_id;
        $input['time'] = $request->time;



        //        $data = Series::create($input);

        $fix = DB::table('series')->insertGetId($input);
        $match_days = Series::select('series_days')->where('id','=',$fix)->get();

        $date = Series::select('starting_date')->where('id','=',$fix)->first()->starting_date;

        $days = preg_replace('/[^0-9]/', '', $match_days);

       $add_days = 2;

        for($i = 0;$i < $days;$i++)
        {
            $input['refer_id'] = $fix;
            $input['name'] = $request->name;
            $input['club_id_1'] = $request->club_id_1;
            $input['club_id_2'] = $request->club_id_2;
            $input['series_type_id'] = $request->series_type_id;
            $date2 = Carbon::parse($date)->addDays($add_days)->format('y-m-d');
            $input['starting_date'] = $date2;

            $add_days = $add_days + 2;

            $input['series_days'] = $request->series_days;
            $input['ground_id'] = $request->ground_id;
            $input['time'] = '10 AM';
            // changes
            Series_Fixtures::create($input);

        }




        //        Series_Fixtures::create($input);

        Session::flash('created_series','The Request For The Series Created.');
        return redirect(route('series.index1'));

    }



    public function table($refer_id)
    {

        // refer id basically id ha series ki jo series ki primary id hai
        $data = Series::where('id','=',$refer_id)->get();

        // refer id basically id ha series ki jo series ki primary id hai or fixture k liye foreign
        $fixtures = Series_Fixtures::where('refer_id','=',$refer_id)->get();

        Session::flash('created_edition','The Request For The Edition Created.');
        return view('admin.series.series_table',compact('data','fixtures'));
    }


    public function series_matches_index($id)
    {
        // changes
        $club1 = Series_Fixtures::where('id',$id )->first()->club_id_1;
        $clubname1 = Club::where('id',$club1)->first()->name;

        // changes
        $club2 = Series_Fixtures::where('id',$id )->first()->club_id_2;
        $clubname2 = Club::where('id',$club2)->first()->name;

        // changes
        $ground = Series_Fixtures::where('id',$id )->first()->ground_id;

        // changes
        $series_type_id = Series_Fixtures::where('id',$id )->first()->series_type_id;

        // changes
        $date = Series_Fixtures::where('id',$id )->first()->starting_date;
        //        $starting_date = preg_replace('/[^0-9]/', '', $seriesType);
        


        $players1 = Player::where('club_id',$club1)->get();
        $players2 = Player::where('club_id',$club2)->get();

        $umpires = Umpire::all();
        // return $umpires       ;
        return view('admin.series.lineup',compact('id','umpires','players1','players2','id','club1','club2','clubname1','clubname2','ground','series_type_id','date'));
    }



    // changes
    public function series_matches_store(Request $request)
    {
        // return $request->club2;
        $wk_count = 0;
        $b_count = 0;
        if (sizeof($request->player_id1) < 11 && sizeof($request->player_id1) < 11)
        {
            return "both";
            Session::flash('players_length3','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        elseif (sizeof($request->player_id1) < 11)
        {
            return "one";
            Session::flash('players_length1','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        elseif (sizeof($request->player_id2) < 11)
        {
            return "two";
            Session::flash('players_length2','Kinldy Select Complete Playing 11 To Avoid Embarssment');
            return redirect()->back()->withInput($request->all());
        }
        else 
        {
            foreach ($request->player_id1 as $player)
            {
                $roleid = Player::where('id',$player)->first()->role_id;
                if ($roleid == 4){ $wk_count = $wk_count + 1; }
                elseif ($roleid == 2 ||$roleid == 3){ $b_count = $b_count + 1; }
            }
            if ($wk_count == 0) { return "wk1"; }
            elseif ($b_count < 5) { return "b1"; }
            $wk_count=0;
            $b_count=0;
            foreach ($request->player_id2 as $player)
            {
                $roleid = Player::where('id',$player)->first()->role_id;
                if ($roleid == 4){ $wk_count = $wk_count + 1; }
                elseif ($roleid == 2 ||$roleid == 3){ $b_count = $b_count + 1; }
            }
            if ($wk_count == 0) { return "wk2"; }
            elseif ($b_count < 5) { return "b2"; }

            $match = DB::table('series_matches')->insertGetId([
                'fixture_id' => $request->fixture_id,
                'toss' => $request->toss,
                'club_id_1' => $request->club1,
                'club_id_2' => $request->club2,
                'ground_id' => $request->ground_id,
                'series_id' => $request->series_fixture_id,
                'umpire_id' => $request->umpire_id,
                'starting_date' => $request->starting_date,
                'series_type_id' => $request->series_type_id,
                'choose_to' => $request->choose_to
            ]);

            if($match)
            {
                Series_Fixtures::where('id', $request->fixture_id)->update([
                    'status' => '1'
                ]);
            }

            //            return $match;
            //
            $toss = Series_Matches::select('toss')->where('id', $match)->first()->toss;
            $c1 = 0;
            $c2 = 0;


            if ($toss == $request->club1 && $request->choose_to == 1) 
            {
            //            club1 innings1
                // echo 'agya c1_I1';
                $c1 = 1;
                $c2 = 2;
            } elseif ($toss == $request->club1 && $request->choose_to == 2) 
            {
            //            club1 innings2
                // echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 1) 
            {
            //            club1 innings2
                //  echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 2) 
            {
            //            club1 innings1
                //   echo 'agya c1_I1';
                $c1 = 1;
                $c2 = 2;
            }


            foreach ($request->player_id1 as $player) {
                DB::table('series_lineups')->insertGetId([
                    'match_id' => $match,
                    'player_id' => $player,
                    'club_id' => $request->club1,
                    'innings_no' => $c1,
                ]);

            }

            foreach ($request->player_id2 as $player) {
                DB::table('series_lineups')->insertGetId([
                    'match_id' => $match,
                    'player_id' => $player,
                    'club_id' => $request->club2,
                    'innings_no' => $c2,
                ]);

            }


            return $match;
            return redirect( route('scoring.match',$match));
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
        $series = Series::findOrFail($id);
        //        if($series->delete())
        //        {
        //            echo 'Series '.$series->name.' Deleted Successfully';
        //        }
        //        else
        //        {
        //            echo 'An Error Occurred Cannot Delete Series';
        //        }
    }

    public function checkmatch($fixtureId)
    {
        $status = DB::table('series_matches')->where('fixture_id',$fixtureId)->first()->status;
        $matchId = DB::table('series_matches')->where('fixture_id',$fixtureId)->first()->id;
        if($status == '0' || $status == '1')
        {
            return redirect(route('series.scoring.match',$matchId));
        }
        elseif ($status == '2') 
        {
            return redirect(route('series.scorecard',$matchId));
        }
        else
        {
            return view('unauthorized');
        }
    }
}
