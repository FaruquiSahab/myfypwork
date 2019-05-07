<?php

namespace App\Http\Controllers;

use App\Team_Stats;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Yajra\Datatables\Datatables;

class Team_StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = Team_Stats::all();
        $teams = Team_Stats::all();
        foreach ($teams as $value)
        {
            $value->id;
            $win = Team_Stats::where('id',$value->id)->select('win')->first()->win;

            $loss = Team_Stats::where('id',$value->id)->select('loss')->first()->loss;


            $points = Team_Stats::where('id',$value->id)->select('points')->first()->points;


            $total_runs_scored = Team_Stats::where('id',$value->id)->select('total_runs_scored')->first()->total_runs_scored;

            $total_overs_faced = Team_Stats::where('id',$value->id)->select('total_overs_faced')->first()->total_overs_faced;

            $total_runs_conceded = Team_Stats::where('id',$value->id)->select('total_runs_conceded')->first()->total_runs_conceded;

            $total_overs_bowled = Team_Stats::where('id',$value->id)->select('total_overs_bowled')->first()->total_overs_bowled;

            $win_points = 2;

            $loss_points = -2;


            $win_total = $win_points * $win;

            $loss_total = $loss_points * $loss;



            $points = 0;

            $points += $win_total;

            $points += $loss_total;

            
            // $nrr = ($total_runs_scored / $total_overs_faced) - ($total_runs_conceded / $total_overs_bowled);

            $id = $value->id;
            $input = Team_Stats::findOrFail($id);
            $input['points'] = $points;
            $input->update();

        }
        return view('admin.teamRankingOds.index',compact('playerRankingODs','players','roles','clubs','stats'));

    }



    public function points_graph()
    {

        $pie = new Lavacharts();
        $point_max = $pie->DataTable();
        $data = Team_Stats::join('clubs','teams_stats.club_id','clubs.id')->select("clubs.name as 0","points as 1","nrr as 2")->get()->toArray();
        $point_max->addStringColumn("Team")
            ->addNumberColumn("Points")
            ->addNumberColumn("NRR")
            ->addRows($data);

        $pie->LineChart('point_max',$point_max);
        return view('admin.graph.team.points',compact('pie'));
    }


    function teamdata()
    {
        $teams = Team_Stats::all();
        foreach ($teams as $value)
        {
            $value->id;
            $runs = Team_Stats::where('id',$value->id)->select('runs')->first()->runs;

            $points = Team_Stats::where('id',$value->id)->select('points')->first()->points;

            $overs = Team_Stats::where('id',$value->id)->select('overs')->first()->overs;

            $wkts = Team_Stats::where('id',$value->id)->select('wkts')->first()->wkts;

            $avg = Team_Stats::where('id',$value->id)->select('avg')->first()->avg;

            if ($wkts > 0) {
            	$avg = $runs / $wkt;
            }
            if ($overs > 0) {
            	$econ = $runs/$overs;
            }




            $wide_points = -2;

            $nb_points = -8;

            $points = 0;

            $points += $runs;

            $wide_totals = $wide_points * $wides;




            $id = $value->id;
            $input = Team_Stats::findOrFail($id);
            $input['points'] = $points;
            $input->update();
        }

    }


    function teamdatatabes()
    {


        $team = Team_Stats::all();
        return Datatables::of($team)

            ->addColumn('club',function($team)
            {
                return $team->club->name;
            })
            ->addColumn('action', function($team)
            {



                return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
                data-id="' .$team->id. '" data-matches="' .$team->matches.'"
                 data-win="' .$team->win. '" data-loss="' .$team->loss.'"
                 data-nr="' .$team->nr. '" data-points="' .$team->points.'"
                 data-nrr="' .$team->nrr. '" 
                >
                <i class="glyphicon glyphicon-eye-open"></i> View </a>
                <input type="hidden" name="team_id" value="' .$team->id. '">"' .$team->id. '"';




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
}
