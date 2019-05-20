<?php

namespace App\Http\Controllers;

use App\Club;
use App\Ground;
use App\MatchType;
use App\Photo;
use App\Fixture;
use App\Match;
use App\InningScore;
use App\BatsmenScore;
use App\BowlerScore;
use DB;
use App\Tournament;
use App\TournamentFormat;
use App\TournamentsReference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class TournamentReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = TournamentsReference::where('active_status',0)->get();
        $tournamentss = Tournament::where('active_status',0)->pluck('name','id');

        // wo tornment id jo ban chkii hain
        $tour_id = TournamentsReference::where('edition','=',Carbon::now()->format('Y'))->get();
        

        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::pluck('format_name','id');
        $t_grounds = Ground::where('active_status',0)->pluck('name','id');

        return view('admin.tournaments.editions.index',compact('tournaments','tournamentss','m_type','t_format','t_grounds'));
    }

    public function tournamentStats(Request $request, $id)
    {
        $tournament_id = TournamentsReference::where('id',$id)->first()->tournament_id;
        $name = Tournament::where('id',$tournament_id)->first()->name;
        $edition = TournamentsReference::where('id',$id)->first()->edition;
        $total_matches = Match::where('refer_id',$id)->count('matches.id');
        $total_runs = InningScore::where('refer_id',$id)->sum('innings_score.runs');
        $total_sixes = BatsmenScore::where('refer_id',$id)->sum('batsmen_scores.sixes');
        $total_fours = BatsmenScore::where('refer_id',$id)->sum('batsmen_scores.fours');
        $max_f_runs = InningScore::where('refer_id',$id)->where('inning_no',1)->max('innings_score.runs');
        $min_f_runs = InningScore::where('refer_id',$id)->where('inning_no',1)->min('innings_score.runs');
        $max_s_runs = InningScore::where('refer_id',$id)->where('inning_no',2)->max('innings_score.runs');
        $min_s_runs = InningScore::where('refer_id',$id)->where('inning_no',2)->min('innings_score.runs');
        $highscore = BatsmenScore::where('refer_id',$id)->max('batsmen_scores.runs');
        $halfcenturies = sizeof(BowlerScore::where('refer_id',$id)->where('bowler_scores.runs','>','50')->where('bowler_scores.runs','<','100')->get());
        $centuries = sizeof(BowlerScore::where('refer_id',$id)->where('bowler_scores.runs','>','100'));
        $record = BowlerScore::where('refer_id',$id)->orderBy('bowler_scores.wickets','DESC')->limit(1)->first();
        $bestball = $record->wickets. ' / ' .$record->runs;
        return view('admin.tournaments.editions.tournament_stats',compact('name','edition','total_matches','total_runs','total_sixes','total_fours','max_f_runs','min_f_runs','max_s_runs','min_s_runs','highscore','bestball','halfcenturies','centuries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::where('active_status',0)->pluck('name','id');

        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::where('active_status',0)->pluck('format_name','id');
        $t_grounds = Ground::where('active_status',0)->pluck('name','id');

        return view('admin.tournaments.editions.create',compact('tournaments','m_type','t_format','t_grounds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }



        $input['tournament_id'] = $request->tournament_id;
        $input['tournament_format_id'] = $request->tournament_format_id;
        $input['tournament_type_id'] = $request->tournament_type_id;
        $input['number_of_teams'] = $request->number_of_teams;
        $edition = Carbon::parse($request->starting_date)->format('Y');
        $input['edition']= $edition;
        $input['starting_date'] = $request->starting_date;
        //$input['ending_date'] = $request->ending_date;
        $input['rounds'] = $request->rounds;
        $input['ground_id'] = $request->ground_id;
        $input['time'] = $request->time;




        $data = TournamentsReference::where('id')->get();


        /*if ($input['number_of_teams'] >= 4 || $input['number_of_teams'] == 5)
        {
            $input['rounds'] = 3;
        }

        if ($input['number_of_teams'] >= 6 || $input['number_of_teams'] == 7)
        {
            $input['rounds'] = 5;
        }

        if ($input['number_of_teams'] >= 8 || $input['number_of_teams'] == 9)
        {
            $input['rounds'] = 7;
        }

        if ($input['number_of_teams'] >= 10 || $input['number_of_teams'] == 11)
        {
            $input['rounds'] = 9;
        }*/



        $data = TournamentsReference::create($input);


        Session::flash('created_edition','The Request For The Edition Created.');
        return redirect(route('edition.index'));
        // return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$clubs = Club::all();*/
        $editions = TournamentsReference::findOrFail($id)->get();
        // return $editions;
        $clubs = Club::pluck('name','id','')->all();


        $data = TournamentsReference::findOrFail($id);


        return view('admin.tournaments.editions.show',compact('editions','clubs','data'));
    }

    public function clubByClub(Request $request)
    {
        $clubsR = Club::where('id','!=',$request->id)->pluck('name','id');

        echo json_encode($clubsR);

    }

//    public function edition()
//    {
//
//        return json_encode($tour_id);
//    }

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
        $did = decrypt($id);
        $tournament = TournamentsReference::find($did);
        $count = 0;
        $count = TournamentsReference::where('id',$did)->update(['active_status'=>1]);
        if ($count > 0)
        {
            return redirect()->back();
        }
    }

}
