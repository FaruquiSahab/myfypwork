<?php

namespace App\Http\Controllers;

use App\BatsmenScore;
use App\BowlerScore;
use App\Extra;
use App\FallOfWicket;
use App\Lineup;
use App\Match;
use App\Option;
use App\Out;
use App\Over;
use App\Tass;
use DB;
use Datatables;
use Illuminate\Http\Request;
use Garethellis\CricketStatsHelper\CricketStatsHelper;

class ScoringController extends Controller
{
	public function index()
	{
		$options = Option::all();
		$optionsE = Option::where('legal','1')->get();
		$wickets = Out::all();
		return view('admin.scoringajax',compact('options','optionsE','wickets'));
	}
    public function index1($match)
    {
		$helper = new CricketStatsHelper();

		$runs = BatsmenScore::where('match_id',$match)->where('inning_no',1)->sum('runs');
		$balls = BatsmenScore::where('match_id',$match)->where('inning_no',1)->sum('balls');
		$overs = $helper->convertBallsToOvers($balls);
		$wicketss = BatsmenScore::where('match_id',$match)->where('inning_no',1)
							   ->where(function($query) 
							   {
								$query->where('out_how', 'b')
								->orWhere('out_how', 'ct')
								->orWhere('out_how', 'lbw')
								->orWhere('out_how', 'otf')
								->orWhere('out_how', 'hw')
								->orWhere('out_how', 'hb')
								->orWhere('out_how', 'ht')
								->orWhere('out_how', 'to')
								->orWhere('out_how', 'ro');
							   })
							   ->count();
		$runs1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('runs');
		$balls1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('balls');
		$overs1 = $helper->convertBallsToOvers($balls1);
		$wicketss1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('wickets');


	    	$matches = Match::where('id',$match)->get();
	    #////////////////////// Batting First
	    	$battingfirst = Lineup::where('match_id',$match)->where('innings_no',1)->get();
		    	for ($i=0; $i < sizeof($battingfirst) ; $i++)
		    	{
		    		BatsmenScore::updateOrCreate
		    		(
		    		 	[
			    		 	'match_id'=>$matches[0]->id,
			    		 	'batsmen_id'=>$battingfirst[$i]->player->id,
			    		 	'inning_no'=>1
		    		 	]
		    		);
		    	}
	    	$battingfirst = BatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
	    	// return $battingfirst[0]->balls;
	    #//////////////////////




	    #////////////////////// Batting Second
	    	$battingsecond = Lineup::where('match_id',$match)->where('innings_no',2)->get();
		    	for ($i=0; $i < sizeof($battingsecond) ; $i++)
		    	{
		    		BatsmenScore::updateOrCreate
		    		(
		    		 	[
			    		 	'match_id'=>$matches[0]->id,
			    		 	'batsmen_id'=>$battingsecond[$i]->player->id,
			    		 	'inning_no'=>2
		    		 	]
		    		);
		    	}
	    	$battingsecond = BatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
	    #//////////////////////





	    #////////////////////// Balling First
	        $ballingfirst = Lineup::where('match_id',$match)->where('innings_no',2)->get();
	        // return sizeof($ballingfirst);
	        	for ($i=0; $i < sizeof($ballingfirst) ; $i++)
		    	{
		    		// echo 'i(F) =>'. $i . '<br>';
		    		// echo 'role =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    		if ($ballingfirst[$i]->player->role_id == 2)
		    		{
		    			// echo 'roleReqq1 =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingfirst[$i]->player->id,
				    		 	'inning_no'=>2
			    		 	]
			    		);
		    		}
		    		elseif ($ballingfirst[$i]->player->role_id == 3)
		    		{
		    			// echo 'roleReqq2 =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingfirst[$i]->player->id,
				    		 	'inning_no'=>2
			    		 	]
			    		);
		    		}
		    	}
		    	// return"";
		    $ballingfirst = BowlerScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
		#//////////////////////




	    #////////////////////// Balling Second
	    	$ballingsecond = Lineup::where('match_id',$match)->where('innings_no',1)->get();
	    	// return sizeof($ballingsecond);
	    		for ($i=0; $i< sizeof($ballingsecond); $i++)
		    	{
		    		// echo 'i(S) =>'. $i . '<br>';
		    		// echo 'role =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    		if ($ballingsecond[$i]->player->role_id == 2)
		    		{
		    			// echo 'roleReq1 =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingsecond[$i]->player->id,
				    		 	'inning_no'=>1
			    		 	]
			    		);
		    		}
		    		elseif ($ballingsecond[$i]->player->role_id == 3)
		    		{
		    			// echo 'roleReq2 =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingsecond[$i]->player->id,
				    		 	'inning_no'=>1
			    		 	]
			    		);
		    		}
		    	}
		    	// return"";
		    $ballingsecond = BowlerScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
		#//////////////////////



		#//////////////////////Extra
			Extra::updateOrCreate(
				[
					'match_id'=>$match,
					'inning_no'=>1
				]
			);
			$extra = Extra::where('match_id',$match)->get();
		#//////////////////////




		#others
	        $options = Option::all();
	        $optionsE = Option::where('legal','1')->get();
	        $wickets = Out::all();
	    #////

	        // return $battingfirst;
	        return view('admin.scoringscorecard',compact('runs','overs','wicketss','runs1','overs1','wicketss1','matches' ,'options','optionsE','wickets','battingfirst','battingsecond','ballingfirst','ballingsecond','extra'));
    }

    public function submitbatsmenscore(Request $request)
    {
		// return $request;
    	$dots 	=  0 + $request->dots;
    	$ones 	=  0 + $request->ones;
    	$twos 	=  0 + $request->twos;
    	$threes =  0 + $request->threes;
    	$fours 	=  0 + $request->fours;
    	$sixes 	=  0 + $request->sixes;

    	$balls= 0;
    	$runs = 0;

    	$balls = $dots+ $ones+ $twos+ $threes+ $fours+ $sixes;
		$runs = ($ones*1)+($twos*2)+($threes*3)+($fours*4)+($sixes*6);

    	DB::table('batsmen_scores')
	    	->where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('batsmen_id',$request->batsmen_id)
	    	->update([
	    		'out_how'=>$request->out_how,
	    		'out_by'=>$request->out_by,
	    		'runs'=>$runs,
	    		'balls'=>$balls,
	    		'dots'=>$request->dots,
	    		'ones'=>$request->ones,
	    		'twos'=>$request->twos,
	    		'threes'=>$request->threes,
	    		'fours'=>$request->fours,
	    		'sixes'=>$request->sixes,
	    	]);
			$data = BatsmenScore::where('match_id',$request->match_id)
			->where('inning_no',$request->innings_no)
			->where('batsmen_id',$request->batsmen_id)
			->get(['runs','balls']);
			
			$helper = new CricketStatsHelper();
			
			$runss = BatsmenScore::where('match_id',$request->match_id)->sum('runs');

			$ballss = BatsmenScore::where('match_id',$request->match_id)->sum('balls');
			$overs = $helper->convertBallsToOvers($ballss);
			$wicketss = BatsmenScore::where('match_id',$request->match_id)
			->where(function($query) 
			{
				$query->where('out_how', 'b')
				->orWhere('out_how', 'ct')
				->orWhere('out_how', 'lbw')
				->orWhere('out_how', 'otf')
				->orWhere('out_how', 'hw')
				->orWhere('out_how', 'hb')
				->orWhere('out_how', 'ht')
				->orWhere('out_how', 'to')
				->orWhere('out_how', 'ro');
			})
			->count();
		// return $data;
		$object= new \stdClass();
		$object->runs = $runss;
		$object->overs = $overs;
		$object->wickets = $wicketss;

		return [$data,json_encode($object)];


    }
    public function submitbowlerscore(Request $request)
    {
    	// return $request->innings_no;
    	$overs 	 = $request->overs;
    	$maidens = $request->maidens;
    	$runs 	 = $request->runs;
    	$wickets = $request->wickets;
    	$economy = $runs / $overs;

		$helper = new CricketStatsHelper();
		$balls = $helper->convertOversToBalls($overs);

    	BowlerScore::where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('bowler_id',$request->bowler_id)
	    	->update([
				'overs'=>$overs,
				'balls'=>$balls,
	    		'maidens'=>$maidens,
	    		'runs'=>$runs,
	    		'wickets'=>$wickets,
	    		'economy'=>$economy,
	    	]);
    	$data = BowlerScore::where('match_id',$request->match_id)
	    					->where('inning_no',$request->innings_no)
	    					->where('bowler_id',$request->bowler_id)
							->get(['economy']);
		$runs1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
		$balls1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('balls');
		$overs1 = $helper->convertBallsToOvers($balls1);
		$wicketss1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('wickets');
		$object= new \stdClass();
		$object->runs = $runs1;
		$object->overs = $overs1;
		$object->wickets = $wicketss1;

		return [$data,json_encode($object)];

    }

     public function submitextrascore(Request $request)
    {
    	// return $request->innings_no;
    	$wides 	 = $request->wides;
    	$noballs = $request->no_balls;
    	$byes 	 = $request->byes;
    	$legbyes = $request->leg_byes;
    	// return response()->json($request->match_id)


    	Extra::where('match_id',$request->match_id)
	    	->where('inning_no',$request->inning_no)
	    	->update([
	    		'wides'=>$wides,
	    		'no_balls'=>$noballs,
	    		'byes'=>$byes,
	    		'leg_byes'=>$legbyes,
	    	]);
	    return response()->json('success');

	}

	public function index2($match)
    {
	    	$matches = Match::where('id',$match)->get();
	    #////////////////////// Batting First
	    	$battingfirst = Lineup::where('match_id',$match)->where('innings_no',1)->get();
		    	for ($i=0; $i < sizeof($battingfirst) ; $i++)
		    	{
		    		BatsmenScore::updateOrCreate
		    		(
		    		 	[
			    		 	'match_id'=>$matches[0]->id,
			    		 	'batsmen_id'=>$battingfirst[$i]->player->id,
			    		 	'inning_no'=>1
		    		 	]
		    		);
		    	}
	    	$battingfirst = BatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
	    	// return $battingfirst[0]->balls;
	    #//////////////////////




	    #////////////////////// Batting Second
	    	$battingsecond = Lineup::where('match_id',$match)->where('innings_no',2)->get();
		    	for ($i=0; $i < sizeof($battingsecond) ; $i++)
		    	{
		    		BatsmenScore::updateOrCreate
		    		(
		    		 	[
			    		 	'match_id'=>$matches[0]->id,
			    		 	'batsmen_id'=>$battingsecond[$i]->player->id,
			    		 	'inning_no'=>2
		    		 	]
		    		);
		    	}
	    	$battingsecond = BatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
	    #//////////////////////





	    #////////////////////// Balling First
	        $ballingfirst = Lineup::where('match_id',$match)->where('innings_no',2)->get();
	        // return sizeof($ballingfirst);
	        	for ($i=0; $i < sizeof($ballingfirst) ; $i++)
		    	{
		    		// echo 'i(F) =>'. $i . '<br>';
		    		// echo 'role =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    		if ($ballingfirst[$i]->player->role_id == 2)
		    		{
		    			// echo 'roleReqq1 =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingfirst[$i]->player->id,
				    		 	'inning_no'=>2
			    		 	]
			    		);
		    		}
		    		elseif ($ballingfirst[$i]->player->role_id == 3)
		    		{
		    			// echo 'roleReqq2 =>'. $ballingfirst[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingfirst[$i]->player->id,
				    		 	'inning_no'=>2
			    		 	]
			    		);
		    		}
		    	}
		    	// return"";
		    $ballingfirst = BowlerScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
		#//////////////////////




	    #////////////////////// Balling Second
	    	$ballingsecond = Lineup::where('match_id',$match)->where('innings_no',1)->get();
	    	// return sizeof($ballingsecond);
	    		for ($i=0; $i< sizeof($ballingsecond); $i++)
		    	{
		    		// echo 'i(S) =>'. $i . '<br>';
		    		// echo 'role =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    		if ($ballingsecond[$i]->player->role_id == 2)
		    		{
		    			// echo 'roleReq1 =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingsecond[$i]->player->id,
				    		 	'inning_no'=>1
			    		 	]
			    		);
		    		}
		    		elseif ($ballingsecond[$i]->player->role_id == 3)
		    		{
		    			// echo 'roleReq2 =>'. $ballingsecond[$i]->player->role_id . '<br>';
		    			BowlerScore::updateOrCreate
			    		(
			    		 	[
				    		 	'match_id'=>$matches[0]->id,
				    		 	'bowler_id'=>$ballingsecond[$i]->player->id,
				    		 	'inning_no'=>1
			    		 	]
			    		);
		    		}
		    	}
		    	// return"";
		    $ballingsecond = BowlerScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
		#//////////////////////



		#//////////////////////Extra
			Extra::updateOrCreate(
				[
					'match_id'=>$match,
					'inning_no'=>2
				]
			);
			$extra = Extra::where('match_id',$match)->get();
		#//////////////////////




		#others
	        $options = Option::all();
	        $optionsE = Option::where('legal','1')->get();
	        $wickets = Out::all();
	    #////

	        // return $battingfirst;
	        return view('admin.scoringscorecard2',compact( 'matches' ,'options','optionsE','wickets','battingfirst','battingsecond','ballingfirst','ballingsecond','extra'));
    }
#right now not in use 13-Feb-2019
	public function batsmenScore($id)
	{
		$batsmenScores = BatsmenScore::where('match_id',$id)->get();
		return Datatables::of($batsmenScores)
		->addColumn('batsmen',function($batsmenScore){
			return '<strong>'.$batsmenScore->batsmen->name.'</strong>';
		})
		->addColumn('out_how',function($batsmenScore){
			if($batsmenScore->out_how == 0)
					return '-';
				else
					return $batsmenScore->out_how;
		})
		->addColumn('out_by',function($batsmenScore){
			if($batsmenScore->out_by == 0)
					return '-';
				else
					return $batsmenScore->out_by;
		})
		->rawColumns(['batsmen'])
		->make(true);
	}
	public function bowlerScore($id)
	{
		$bowlerScores = BowlerScore::where('match_id',$id)->get();
		return Datatables::of($bowlerScores)
		->addColumn('bowler',function($bowlerScore){
			return '<strong>'.$bowlerScore->batsmen->name.'</strong>';
		})
		->rawColumns(['bowler'])
		->make(true);
	}

	public function fallofwickets($id)
	{
		$fallofwickets = FallOfWicket::select(['score'])->where('match_id',$id)->get();
		return Datatables::of($fallofwickets)
		// ->addColumn('batsmen',function($fallofwicket){
		// 	return '<strong>'.$fallofwicket->batsmen->name.'</strong>';
		// })
		->addColumn('score',function($fallofwicket){
			return $fallofwicket->score;
		})
		->addColumn('count',function($fallofwicket){
			return 1;
		})
		// ->rawColumns(['batsmen'])
		->make(true);
	}

	public function runsovers($id)
	{
		$runsovers = Over::select(['runs'])->where('match_id',$id)->get();
		return Datatables::of($runsovers)
		->addColumn('runs',function($runsover){
			return $runsover->runs;
		})
		->addColumn('count',function($runsover){
			return 1;
		})
		// ->rawColumns(['batsmen'])
		->make(true);
	}

	public function extras($id)
	{
		$extras = Extra::where('match_id',$id)->get();
		return Datatables::of($extras)->make(true);
	}
#end



















































	public function taskI()
	{
		$tass = Tass::all();
		return view('task',compact('tass'));
	}

	public function taskA(Request $request)
	{
		$e = new Tass;
		$e['e1']= $request->name;
		$e['e2']=$request->email;
		$e['e3']=$request->password;
		$e->save();
		return redirect(route('task'));
	}




}
