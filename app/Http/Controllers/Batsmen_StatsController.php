<?php

namespace App\Http\Controllers;

use App\Batsmen_Stats;
use App\Club;
use App\Player;
use App\PlayerRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use Yajra\Datatables\Datatables;

class Batsmen_StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $stats = Batsmen_Stats::where('format',1)->where('role_id',1)->orwhere('format',1)->where('role_id',4)->distinct('player_id')->get();
        $batsmen = Batsmen_Stats::all();
        foreach ($batsmen as $value)
        {
            $value->id;
            $runs = Batsmen_Stats::where('id',$value->id)->select('runs')->first()->runs;

            $points = Batsmen_Stats::where('id',$value->id)->select('points')->first()->points;

            $sixes = Batsmen_Stats::where('id',$value->id)->select('sixes')->first()->sixes;

            $fours = Batsmen_Stats::where('id',$value->id)->select('fours')->first()->fours;

            $ducks = Batsmen_Stats::where('id',$value->id)->select('ducks')->first()->ducks;

            $fifties = Batsmen_Stats::where('id',$value->id)->select('halfcenturies')->first()->halfcenturies;

            $hundreds = Batsmen_Stats::where('id',$value->id)->select('centuries')->first()->centuries;

            // $moms = Batsmen_Stats::where('id',$value->id)->select('moms')->first()->moms;

            $balls = Batsmen_Stats::where('id',$value->id)->select('balls_played')->first()->balls_played;

            $timeouts = Batsmen_Stats::where('id',$value->id)->select('innings')->first()->innings;

            if ($timeouts == 0) {
                $avg;
            }
            else
            {
                $avg = $runs / $timeouts;
            }
            if ($balls == 0) {
                $strike_rate;
            }
            else
            {
                $strike_rate = ($runs / 10) * 100;
            }

            // $timeouts = Batsmen_Stats::select('timeouts')->first()->timeouts;

            $hundred_points = $hundreds * 100;

            // $moms_points = $moms * 50;

            $fifties_points = $fifties * 50;

            $six_points = $sixes * 2;

            // $duck_points = -10;

            $points = 0;

            $points += $runs;

            $points += $six_points;

            $points += $fours;

            // $duck_totals = $duck_points * $ducks;

            // $points +=  $duck_totals;


            $points +=  $hundred_points;

            $points +=  $fifties_points;

            // $points +=  $moms_points;


            $id = $value->id;
            $input = Batsmen_Stats::findOrFail($id);
            $input['points'] = $points;
            $input->update();
        }



        return view('admin.playerRankingOds.index',compact('playerRankingODs','players','roles','clubs','stats','point','line'));
    }


    public function points_graph()
    {

        $bar = new Lavacharts();
        $point_max = $bar->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","points as 1")->where('player_stats.points','>',0)->where('player_stats.format',1)->where('player_stats.role_id',1)->orwhere('player_stats.format',1)->where('player_stats.role_id',4)->orderBy('points','DSC')->take(10)->get()->toArray();
        $point_max->addStringColumn("Player")
            ->addNumberColumn("Points")
            ->addRows($data);

        $bar->BarChart('point_max',$point_max);
        $format = 1;
        return view('admin.graph.batsmen.points',compact('bar','format'));
    }



    public function sr_graph()
    {

        $line = new Lavacharts();
        $sr_max = $line->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","strikerate as 1")->where('player_stats.strikerate','>',0)->where('player_stats.format',1)->where('player_stats.role_id',1)->orwhere('player_stats.format',1)->where('player_stats.role_id',4)->orderBy('strikerate','DSC')->take(10)->get()->toArray();
        $sr_max->addStringColumn("Player")
            ->addNumberColumn("Strike Rate")
            ->addRows($data);

        $line->LineChart('sr_max',$sr_max);
        $format = 1;

        return view('admin.graph.batsmen.sr',compact('line','format'));
    }




    public function avg_graph()
    {

        $pie = new Lavacharts();
        $avg_max = $pie->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","average_bat as 1")->where('player_stats.average_bat','>',0)->where('player_stats.format',1)->where('player_stats.role_id',1)->orwhere('player_stats.format',1)->where('player_stats.role_id',4)->orderBy('average_bat','DSC')->take(10)->get()->toArray();
        $avg_max->addStringColumn("Player")
            ->addNumberColumn("Average")
            ->addRows($data);

        $pie->ColumnChart('avg_max',$avg_max);
        $format = 1;

        return view('admin.graph.batsmen.avg',compact('pie','format'));
    }



    public function runs_graph()
    {

        $area = new Lavacharts();
        $runs_max = $area->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","runs as 1",'matches as 2')->where('runs','>',0)->where('player_stats.format',1)->where('player_stats.role_id',1)->orwhere('player_stats.format',1)->where('player_stats.role_id',4)->orderBy('runs','DSC')->take(10)->get()->toArray();
        $runs_max->addStringColumn("Player")
            ->addNumberColumn("Runs")
            ->addNumberColumn("Matches")
            ->addRows($data);

        $area->ColumnChart('runs_max',$runs_max);
        $format = 1;

        return view('admin.graph.batsmen.runs',compact('area','format'));
    }

    function batsmendatatabes()
    {

        $batsmen = Batsmen_Stats::where('player_stats.format',1)->where('player_stats.role_id',1)->orwhere('player_stats.format',1)->where('player_stats.role_id',4)->orderBy('points','ASC')->get();
        return Datatables::of($batsmen)
            // ->addColumn('image',function($club)
            // {
            //     return  '<img height="50" src="'. $club->photo->file .'>';
            // })
            //
            ->addColumn('points',function($batsmen)
            {
                return '<strong>'.$batsmen->points.'</strong>';
            })
            ->addColumn('name',function($batsmen)
            {
                return '<strong>'.$batsmen->player->name.'</strong>';
            })
            ->addColumn('club',function($batsmen)
            {
                return $batsmen->player->club->name;
            })
            ->addColumn('action', function($batsmen)
            {



                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
                data-id="' .$batsmen->id. '" data-matches="' .$batsmen->matches.'"
                 data-innings="' .$batsmen->innings. '" data-runs="' .$batsmen->runs.'"
                 data-balls="' .$batsmen->balls_played. '" data-avg="' .$batsmen->average_bat.'"
                 data-sr="' .$batsmen->strikerate. '" data-moms="' .$batsmen->moms.'"
                 data-hundreds="' .$batsmen->centuries. '" data-fifties="' .$batsmen->halfcenturies.'"
                 data-sixes="' .$batsmen->sixes. '" data-fours="' .$batsmen->fours.'"
                 data-ducks="' .$batsmen->ducks. '" data-points="' .$batsmen->points.'"
                 data-playername="' .$batsmen->player->name. '" data-playerclub="' .$batsmen->player->club->name.'"
                 data-timeouts="' .$batsmen->innings. '" >
                <i class="glyphicon glyphicon-eye-open"></i> View </a>
                <input type="hidden" name="batsmen_id" value="' .$batsmen->id. '">';



            })
            ->rawColumns(['action','name','points'])
            ->make(true);
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
        //
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


    public function index2()
    {


        $stats = Batsmen_Stats::where('format',2)->where('role_id',1)->orwhere('format',2)->where('role_id',4)->get();
        $batsmen = Batsmen_Stats::where('format',2)->where('role_id',1)->orwhere('format',2)->where('role_id',4)->get();
        // return ($batsmen);
        if (sizeof($batsmen)>0) 
        {
            foreach ($batsmen as $value)
            {
                $value->id;
                $runs = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->runs;

                $points = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->points;

                $sixes = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->sixes;

                $fours = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->fours;

                $ducks = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->ducks;

                $fifties = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->halfcenturies;

                $hundreds = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->centuries;

                // $moms = Batsmen_Stats::where('id',$value->id)->select('moms')->first()->moms;

                $balls = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->balls_played;

                $timeouts = Batsmen_Stats::where('format',2)->where('id',$value->id)->first()->innings;

                if ($timeouts == 0) {
                    $avg;
                }
                else
                {
                    $avg = $runs / $timeouts;
                }
                if ($balls == 0) {
                    $strike_rate;
                }
                else
                {
                    $strike_rate = ($runs / 10) * 100;
                }

                // $timeouts = Batsmen_Stats::select('timeouts')->first()->timeouts;

                $hundred_points = $hundreds * 100;

                // $moms_points = $moms * 50;

                $fifties_points = $fifties * 50;

                $six_points = $sixes * 2;

                // $duck_points = -10;

                $points = 0;

                $points += $runs;

                $points += $six_points;

                $points += $fours;

                // $duck_totals = $duck_points * $ducks;

                // $points +=  $duck_totals;


                $points +=  $hundred_points;

                $points +=  $fifties_points;

                // $points +=  $moms_points;


                $id = $value->id;
                $input = Batsmen_Stats::findOrFail($id);
                $input['points'] = $points;
                $input->update();
            }
        }


        return view('admin.playerRankingOds.index2',compact('playerRankingODs','players','roles','clubs','stats','point','line'));
    }


    public function points_graph2()
    {

        $bar = new Lavacharts();
        $point_max = $bar->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","points as 1")->where('player_stats.points','>',0)->where('player_stats.format',2)->where('player_stats.role_id',1)->orwhere('player_stats.format',2)->where('player_stats.role_id',4)->orderBy('points','DSC')->take(10)->get()->toArray();
        $point_max->addStringColumn("Player")
            ->addNumberColumn("Points")
            ->addRows($data);
        $bar->BarChart('point_max',$point_max);
        $format = 2;
        return view('admin.graph.batsmen.points',compact('bar','format'));
    }



    public function sr_graph2()
    {

        $line = new Lavacharts();
        $sr_max = $line->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","strikerate as 1")->where('player_stats.strikerate','>',0)->where('player_stats.format',2)->where('player_stats.role_id',1)->orwhere('player_stats.format',2)->where('player_stats.role_id',4)->orderBy('strikerate','DSC')->take(10)->get()->toArray();
        $sr_max->addStringColumn("Player")
            ->addNumberColumn("Strike Rate")
            ->addRows($data);

        $line->LineChart('sr_max',$sr_max);
        $format = 2;
        return view('admin.graph.batsmen.sr',compact('line','format'));
    }




    public function avg_graph2()
    {

        $pie = new Lavacharts();
        $avg_max = $pie->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","average_bat as 1")->where('player_stats.average_bat','>',0)->where('player_stats.format',2)->where('player_stats.role_id',1)->orwhere('player_stats.format',2)->where('player_stats.role_id',4)->orderBy('average_bat','DSC')->take(10)->get()->toArray();
        $avg_max->addStringColumn("Player")
            ->addNumberColumn("Average")
            ->addRows($data);

        $pie->ColumnChart('avg_max',$avg_max);
        $format = 2;
        return view('admin.graph.batsmen.avg',compact('pie','format'));
    }



    public function runs_graph2()
    {

        $area = new Lavacharts();
        $runs_max = $area->DataTable();
        $data = Batsmen_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","runs as 1",'matches as 2')->where('runs','>',0)->where('player_stats.format',2)->where('player_stats.role_id',1)->orwhere('player_stats.format',2)->where('player_stats.role_id',4)->orderBy('runs','DSC')->take(10)->get()->toArray();
        $runs_max->addStringColumn("Player")
            ->addNumberColumn("Runs")
            ->addNumberColumn("Matches")
            ->addRows($data);

        $area->ColumnChart('runs_max',$runs_max);
        $format = 2;
        return view('admin.graph.batsmen.runs',compact('area','format'));
    }

    function batsmendatatabes2()
    {

        $batsmen = Batsmen_Stats::where('player_stats.format',2)->where('player_stats.role_id',1)->orwhere('player_stats.format',2)->where('player_stats.role_id',4)->orderBy('points','ASC')->get();
        return Datatables::of($batsmen)
            // ->addColumn('image',function($club)
            // {
            //     return  '<img height="50" src="'. $club->photo->file .'>';
            // })
            //
            ->addColumn('points',function($batsmen)
            {
                return '<strong>'.$batsmen->points.'</strong>';
            })
            ->addColumn('name',function($batsmen)
            {
                return '<strong>'.$batsmen->player->name.'</strong>';
            })
            ->addColumn('club',function($batsmen)
            {
                return $batsmen->player->club->name;
            })
            ->addColumn('action', function($batsmen)
            {



                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
                data-id="' .$batsmen->id. '" data-matches="' .$batsmen->matches.'"
                 data-innings="' .$batsmen->innings. '" data-runs="' .$batsmen->runs.'"
                 data-balls="' .$batsmen->balls_played. '" data-avg="' .$batsmen->average_bat.'"
                 data-sr="' .$batsmen->strikerate. '" data-moms="' .$batsmen->moms.'"
                 data-hundreds="' .$batsmen->centuries. '" data-fifties="' .$batsmen->halfcenturies.'"
                 data-sixes="' .$batsmen->sixes. '" data-fours="' .$batsmen->fours.'"
                 data-ducks="' .$batsmen->ducks. '" data-points="' .$batsmen->points.'"
                 data-playername="' .$batsmen->player->name. '" data-playerclub="' .$batsmen->player->club->name.'"
                 data-timeouts="' .$batsmen->innings. '" >
                <i class="glyphicon glyphicon-eye-open"></i> View </a>
                <input type="hidden" name="batsmen_id" value="' .$batsmen->id. '">';



            })
            ->rawColumns(['action','name','points'])
            ->make(true);
    }
}
