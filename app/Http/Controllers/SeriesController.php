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
        $fix = Series_Fixtures::all();
        $series = Series::all();



        $series_type = MatchType::pluck('type_name','id');
        $grounds = Ground::pluck('name','id');

//        return $series[0]->name;
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
//        $edition = Carbon::now()->format('Y');
//        $input['edition']= $edition;
        $input['starting_date'] = $request->starting_date;
        //$input['ending_date'] = $request->ending_date;
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
//        $edition = Carbon::now()->format('Y');
//        $input['edition']= $edition;
            $date2 = Carbon::parse($date)->addDays($add_days)->format('y-m-d');
            $input['starting_date'] = $date2;

            $add_days = $add_days + 2;

            //$input['ending_date'] = $request->ending_date;
            $input['series_days'] = $request->series_days;
            $input['ground_id'] = $request->ground_id;
            $input['time'] = '10 AM';
            Series_Fixtures::create($input);

        }




//        Series_Fixtures::create($input);

        Session::flash('created_series','The Request For The Series Created.');
        return redirect(route('series.index1'));

    }



    public function table($refer_id)
    {
//        $refer_id = decrypt($refer_id);




        $data = Series::where('id','=',$refer_id)->get();

//        $date = TournamentsReference::select('starting_date')->where('id','=',$refer_id)->first()->starting_date;
//
//
//      return  Carbon::parse($date)->addDays('2')->format('y-m-d');

//            return $data;


        $fixtures = Series_Fixtures::where('refer_id','=',$refer_id)->get();

//       $club1 = $fixtures[0]->club1->name;
//        $club2 = $fixtures[0]->club2->name;
//
//        $time = $fixtures[0]->time;
//        $ground = $fixtures[0]->ground->name;

//            return $fixtures;

         Session::flash('created_edition','The Request For The Edition Created.');
        return view('admin.series.series_table',compact('data','fixtures'));
    }


    public function series_matches_index($id)
    {

//        $id = decrypt($id);


        $club1 = Series_Fixtures::select('club_id_1')->where('id',$id )->get();
//        $type = Series_Fixtures::select('series_type_id')->where('id',$club1[0]->refer_id)->first()->series_type_id;
        $club_1 = preg_replace('/[^0-9]/', '', $club1);


//        return $type;

//       return $club1[0]->club1->name;
        $club2 = Series_Fixtures::select('club_id_2')->where('id',$id )->get();
        $club_2 = preg_replace('/[^0-9]/', '', $club2);


        $ground = Series_Fixtures::select('ground_id')->where('id',$id )->get();
        $ground_id = preg_replace('/[^0-9]/', '', $ground);



        $seriesType = Series_Fixtures::select('series_type_id')->where('id',$id )->get();
        $series_type_id = preg_replace('/[^0-9]/', '', $seriesType);


        $date = Series_Fixtures::select('starting_date')->where('id',$id )->first()->starting_date;
//        $starting_date = preg_replace('/[^0-9]/', '', $seriesType);



        $players1 = Player::where('club_id',$club1[0]->club_id_1)->get();
        $players2 = Player::where('club_id',$club2[0]->club_id_2)->get();

        $umpires = Umpire::all();
//        return $umpires;

//        return $id;

        return view('admin.series.lineup',compact('club_1','club_2','umpires','players1','players2','type','id','club1','club2','ground_id','series_type_id','date'));
    }




    public function series_matches_store(Request $request)
    {
        if (sizeof($request->player_id1) < 11)
        {
            return redirect()->back();
        }
        else {

            $match = DB::table('series_matches')->insertGetId([
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

//            return $match;
//
            $toss = Series_Matches::select('toss')->where('id', $match)->first()->toss;
            $c1 = 0;
            $c2 = 0;


            if ($toss == $request->club1 && $request->choose_to == 1) {
//            club1 innings1
                // echo 'agya c1_I1';
                $c1 = 1;
                $c2 = 2;
            } elseif ($toss == $request->club1 && $request->choose_to == 2) {
//            club1 innings2
                // echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 1) {
//            club1 innings2
                //  echo 'agya c1_I2';
                $c1 = 2;
                $c2 = 1;
            } elseif ($toss == $request->club2 && $request->choose_to == 2) {
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



            return redirect( route('scoring.match',$match));
//            return response()->json(array('success' => true, 'html' => $returnHtml));
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
}
