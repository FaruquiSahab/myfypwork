<?php

namespace App\Http\Controllers;

use App\bowler_Stats;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Yajra\Datatables\Datatables;

class Bowler_StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $stats = Bowler_Stats::all();
        $bowlers = Bowler_Stats::all();
        foreach ($bowlers as $value)
        {
            $value->id;
            $runs = Bowler_Stats::where('id',$value->id)->select('runs_ball')->first()->runs_ball;

            $points = Bowler_Stats::where('id',$value->id)->select('points_ball')->first()->points_ball;

            $overs = Bowler_Stats::where('id',$value->id)->select('overs')->first()->overs;

            $wkts = Bowler_Stats::where('id',$value->id)->select('wickets')->first()->wickets;

            $avg = Bowler_Stats::where('id',$value->id)->select('average_ball')->first()->average_ball;

            $econ = Bowler_Stats::where('id',$value->id)->select('economy')->first()->economy;

            $fifer = Bowler_Stats::where('id',$value->id)->select('five_wickets')->first()->five_wickets;

            $wides = Bowler_Stats::where('id',$value->id)->select('wides')->first()->wides;

            $nb = Bowler_Stats::where('id',$value->id)->select('noballs')->first()->nb;

            if ($wkts == 0) {
                $avg;
            }
            else{
                $avg = $runs / $wkts;
            }
            if ($overs == 0) {
                $econ;
            }
            else{
                $econ = $runs/$overs;
            }



            $fifer_points = $fifer * 50;

            $wide_points = -2;

            $nb_points = -8;

            $points = 0;

            $points += $runs;

            $wide_totals = $wide_points * $wides;


            $nb_totals = $nb_points * $nb;


            $points +=  $wide_totals;

            $points +=  $nb_totals;



            $points +=  $fifer_points;


            $id = $value->id;
            $input = Bowler_Stats::findOrFail($id);
            $input['points_ball'] = $points;
            $input->update();

        }
        return view('admin.playerRankingOds.index1',compact('playerRankingODs','players','roles','clubs','stats'));

    }

    public function points_graph()
    {

        $bar = new Lavacharts();
        $point_max = $bar->DataTable();
      $data = Bowler_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","points_ball as 1")->where('player_stats.points_ball','>',0)->orderBy('points_ball','DSC')->take(10)->get()->toArray();
        $point_max->addStringColumn("Player")
            ->addNumberColumn("Points")
            ->addRows($data);

      $bar->BarChart('point_max',$point_max);
        return view('admin.graph.bowlers.points',compact('bar'));
    }



    public function econ_graph()
    {

        $line = new Lavacharts();
        $eco_max = $line->DataTable();
        $data = Bowler_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","economy as 1")->where('player_stats.economy','>',0)->orderBy('economy','ASC')->take(10)->get()->toArray();
        $eco_max->addStringColumn("Player")
            ->addNumberColumn("Economy")
            ->addRows($data);
        $line->LineChart('eco_max',$eco_max);
        return view('admin.graph.bowlers.econ',compact('line'));
    }




    public function avg_graph()
    {

        $pie = new Lavacharts();
        $avg_max = $pie->DataTable();
        $data = Bowler_Stats::join('players','player_stats.player_id','players.id')->select("players.name as 0","average_ball as 1")->where('player_stats.average_ball','>',0)->orderBy('average_ball','ASC')->take(10)->get()->toArray();
        $avg_max->addStringColumn("Player")
            ->addNumberColumn("Average")
            ->addRows($data);

        $pie->ColumnChart('avg_max',$avg_max);
        return view('admin.graph.bowlers.avg',compact('pie'));
    }


    function bowlerdata()
    {
        $bowlers = Bowler_Stats::all();
        foreach ($bowlers as $value)
        {
            
                $value->id;
                $runs = Bowler_Stats::where('id',$value->id)->select('runs')->first()->runs;

                $points = Bowler_Stats::where('id',$value->id)->select('points')->first()->points;

                $overs = Bowler_Stats::where('id',$value->id)->select('overs')->first()->overs;

                $wkts = Bowler_Stats::where('id',$value->id)->select('wkts')->first()->wkts;

                $avg = Bowler_Stats::where('id',$value->id)->select('avg')->first()->avg;

                $econ = Bowler_Stats::where('id',$value->id)->select('econ')->first()->econ;

                $fifer = Bowler_Stats::where('id',$value->id)->select('fifer')->first()->fifer;

                $wides = Bowler_Stats::where('id',$value->id)->select('wides')->first()->wides;

                $nb = Bowler_Stats::where('id',$value->id)->select('nb')->first()->nb;

                $mom = Bowler_Stats::where('id',$value->id)->select('mom')->first()->mom;

                $avg = $runs / $wkts;

                $econ = $runs/$overs;


                // $timeouts = bowler_Stats::select('timeouts')->first()->timeouts;


                $moms_points = $mom * 50;

                $fifer_points = $fifer * 50;


                $wide_points = -2;

                $nb_points = -8;

                $points = 0;

                $points += $runs;


                $wide_totals = $wide_points * $wides;


                $nb_totals = $nb_points * $nb;


                $points +=  $wide_totals;

                $points +=  $nb_totals;



                $points +=  $fifer_points;

                $points +=  $moms_points;


                $id = $value->id;
                $input = Bowler_Stats::findOrFail($id);
                $input['points'] = $points;
                $input->update();

        }
    }

    function bowlerdatatabes()
    {

        $bowler = Bowler_Stats::all();
        return Datatables::of($bowler)
            ->addColumn('name',function($bowler)
            {
                return '<strong>'.$bowler->player->name.'</strong>';
            })
            ->addColumn('club',function($bowler)
            {
                return $bowler->player->club->name;
            })
            ->addColumn('action', function($bowler)
            {
                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
                data-id="' .$bowler->id. '" data-matches="' .$bowler->matches.'"
                 data-innings="' .$bowler->innings_bowl. '" data-runs="' .$bowler->runs.'"
                 data-overs="' .$bowler->overs. '" data-wkts="' .$bowler->wickets.'"
                 data-avg="' .$bowler->average_ball. '" data-econ="' .$bowler->economy.'"
                 data-fifer="' .$bowler->five_wickets. '" data-wides="' .$bowler->wides.'"
                 data-nb="' .$bowler->noballs. '" data-mom="' .$bowler->mom.'"
                 data-points="' .$bowler->points_ball.'"
                >
                <i class="glyphicon glyphicon-eye-open"></i> View </a>
                <input type="hidden" name="bowler_id" value="' .$bowler->id. '">"' .$bowler->id. '"';

            })
            ->rawColumns(['action','name'])
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



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
