<?php

namespace App\Http\Controllers;

use App\BatsmenScore;
use App\BowlerScore;
use App\Extra;
use App\FallOfWicket;
use App\Lineup;
use App\Match;
use App\Option;
use App\Player;
use App\Club;
use App\Out;
use App\Over;
use App\Tass;
use App\InningScore;
use DB;
use App\PlayerStat;
use DataTables;
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
		$matches = Match::where('id',$match)->get();
		if($matches[0]->status == 0 || $matches[0]->status == 1)
		{
			#cached data
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
				$wides = Extra::where('match_id', $match)->where('inning_no',1)->sum('wides');
				$noballs = Extra::where('match_id', $match)->where('inning_no',1)->sum('no_balls');
				$byes = Extra::where('match_id', $match)->where('inning_no',1)->sum('byes');
				$legbyes = Extra::where('match_id', $match)->where('inning_no',1)->sum('leg_byes');
				$runs = $runs + $wides + $noballs + $byes + $legbyes;


				$total_extras = $wides + $noballs + $byes + $legbyes;

				
				$runs1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('runs');
				$balls1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('balls');
				$overs1 = $helper->convertBallsToOvers($balls1);
				$wicketss1 = BowlerScore::where('match_id',$match)->where('inning_no',2)->sum('wickets');
				$wicketsother = BatsmenScore::where('match_id',$match)->where('inning_no',1)
				->where(function($query) 
				{
					$query->where('out_how', 'ro')
					->orWhere('out_how', 'to');
				})
				->count();
				$wicketss1 = $wicketss1 + $wicketsother;
				$runs1 = $runs1 + $byes +$legbyes;
			#///



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




			#//////////////////////Extra
				Extra::updateOrCreate(
					[
						'match_id'=>$match,
						'inning_no'=>1
					]
				);
				$extra = Extra::where('match_id',$match)->where('inning_no',1)->get();
			#//////////////////////




			#others
						$options = Option::all();
						$optionsE = Option::where('legal','1')->get();
						$wickets = Out::all();
						$format = Match::where('id',$match)->select('match_type_id')->first()->match_type_id;
			#////

			return view('admin.scoringscorecard',compact('format','total_extras','runs','overs','wicketss','runs1','overs1','wicketss1','matches' ,'options','optionsE','wickets','battingfirst','ballingfirst','extra'));
		}
		else{
			return view('unauthorized');
		}	
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
			
			$runss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');

			$ballss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('balls');
			$overs = $helper->convertBallsToOvers($ballss);
			$wicketss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)
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
			$wides = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('wides');
			$noballs = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('no_balls');
			$byes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
			$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
			$runss = $runss + $wides + $noballs + $byes + $legbyes;
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
		
		$byes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
		$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;

		$wicketsother = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)
		->where(function($query) 
		{
			$query->where('out_how', 'ro')
			->orWhere('out_how', 'to');
		})
		->count();
		$wicketss1 = $wicketss1 + $wicketsother;
		
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
			$runss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
			$wides = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('wides');
			$noballs = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('no_balls');
			$byes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
			$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
			$total_extras = $wides + $noballs + $byes + $legbyes;
			$runss = $runss + $total_extras;
			
			$runs1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
			$runs1 = $runs1 + $byes + $legbyes;

			$object = new \stdClass();
			$object->extras = $total_extras;
			$object->runss = $runss;
			$object->runs1 = $runs1;

	    return json_encode($object);

  	}

	public function inningscore($matchId,$inningNo)
	{	
		$playerId =  BatsmenScore::where('match_id',$matchId)->where('inning_no',$inningNo)->first()->batsmen_id;
		$clubid = Player::where('id',$playerId)->first()->club_id;
		$helper = new CricketStatsHelper();
		if($inningNo == 1)
		{
			$runs1 = BowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('runs');
			$balls1 = BowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = BowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('wickets');
		}
		elseif($inningNo == 2)
		{
			$runs1 = BowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('runs');
			$balls1 = BowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = BowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('wickets');
		}
		
		$byes = Extra::where('match_id', $matchId)->where('inning_no',$inningNo)->sum('byes');
		$legbyes = Extra::where('match_id', $matchId)->where('inning_no',$inningNo)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;

		$wicketsother = BatsmenScore::where('match_id',$matchId)->where('inning_no',$inningNo)
		->where(function($query) 
		{
			$query->where('out_how', 'ro')
			->orWhere('out_how', 'to');
		})
		->count();
		$wicketss1 = $wicketss1 + $wicketsother;
		InningScore::updateOrCreate(
			[
				'match_id'=>$matchId,
				'inning_no'=>$inningNo
			],
			[
				'club_id'=>$clubid,
				'runs'=>$runs1,
				'overs'=>$overs1,
				'wickets'=>$wicketss1
			]);
	}

	public function updateandproceed($match)
	{
		Match::where('id',$match)->update([
			'status'=> '1'
			]);
		return redirect(route('scoring.match2',$match));
	}

	public function index2($match)
	{
		$matches = Match::where('id',$match)->get();
		if($matches[0]->status == 1)
		{
			$this->inningscore($match,1);
			$helper = new CricketStatsHelper();
		
			$runs = BatsmenScore::where('match_id',$match)->where('inning_no',2)->sum('runs');
			$balls = BatsmenScore::where('match_id',$match)->where('inning_no',2)->sum('balls');
			$overs = $helper->convertBallsToOvers($balls);
			$wicketss = BatsmenScore::where('match_id',$match)->where('inning_no',2)
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
			$wides = Extra::where('match_id', $match)->where('inning_no',2)->sum('wides');
			$noballs = Extra::where('match_id', $match)->where('inning_no',2)->sum('no_balls');
			$byes = Extra::where('match_id', $match)->where('inning_no',2)->sum('byes');
			$legbyes = Extra::where('match_id', $match)->where('inning_no',2)->sum('leg_byes');
			$runs = $runs + $wides + $noballs + $byes + $legbyes;
		
		
			$total_extras = $wides + $noballs + $byes + $legbyes;
		
				
			$runs1 = BowlerScore::where('match_id',$match)->where('inning_no',1)->sum('runs');
			$balls1 = BowlerScore::where('match_id',$match)->where('inning_no',1)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = BowlerScore::where('match_id',$match)->where('inning_no',1)->sum('wickets');
			$wicketsother = BatsmenScore::where('match_id',$match)->where('inning_no',2)
			->where(function($query) 
			{
				$query->where('out_how', 'ro')
				->orWhere('out_how', 'to');
			})
			->count();
			$wicketss1 = $wicketss1 + $wicketsother;
			$runs1 = $runs1 + $byes +$legbyes;
		
		
				$matches = Match::where('id',$match)->get();
		
		
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
				$extra = Extra::where('match_id',$match)->where('inning_no',2)->get();
			#//////////////////////
		
			#1st Innings Score
				$i1runs = InningScore::where('match_id',$match)->where('inning_no',1)->first()->runs;
				$i1wickets = InningScore::where('match_id',$match)->where('inning_no',1)->first()->wickets;
				$i1overs = InningScore::where('match_id',$match)->where('inning_no',1)->first()->overs;
			#///
		
		
			#others
				$options = Option::all();
				$optionsE = Option::where('legal','1')->get();
				$wickets = Out::all();
				$format = Match::where('id',$match)->select('match_type_id')->first()->match_type_id;
			#////
		
				// return $battingfirst;
				return view('admin.scoringscorecard1',compact('format','i1runs','i1wickets','i1overs','total_extras','runs','overs','wicketss','runs1','overs1','wicketss1','matches' ,'options','optionsE','wickets','battingsecond','ballingsecond','extra'));
		}
		else
		{
			return view('unauthorized');
		}	
	}
	
	public function submitbatsmenscore2(Request $request)
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
				
			$runss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
	
			$ballss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('balls');
			$overs = $helper->convertBallsToOvers($ballss);
			$wicketss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)
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
			$wides = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('wides');
			$noballs = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('no_balls');
			$byes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
			$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
			$runss = $runss + $wides + $noballs + $byes + $legbyes;
		// return $data;
		$object= new \stdClass();
		$object->runs = $runss;
		$object->overs = $overs;
		$object->wickets = $wicketss;
	
		return [$data,json_encode($object)];
	}
	public function submitbowlerscore2(Request $request)
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
		$runs1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
		$balls1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('balls');
		$overs1 = $helper->convertBallsToOvers($balls1);
		$wicketss1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('wickets');
			
		$byes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
		$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;
	
		$wicketsother = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)
		->where(function($query) 
		{
			$query->where('out_how', 'ro')
			->orWhere('out_how', 'to');
		})
		->count();
		$wicketss1 = $wicketss1 + $wicketsother;
			
		$object= new \stdClass();
		$object->runs = $runs1;
		$object->overs = $overs1;
		$object->wickets = $wicketss1;
	
		return [$data,json_encode($object)];
	}
	
	public function submitextrascore2(Request $request)
	{
		// return $request->innings_no;
		$wides 	 = $request->wides;
		$noballs = $request->no_balls;
		$byes 	 = $request->byes;
		$legbyes = $request->leg_byes;
		// return response()->json($request->match_id)
	
	
		Extra::where('match_id',$request->match_id)
			->where('inning_no',2)
			->update([
				'wides'=>$wides,
				'no_balls'=>$noballs,
				'byes'=>$byes,
				'leg_byes'=>$legbyes,
			]);
			$runss = BatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
			$wides = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('wides');
			$noballs = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('no_balls');
			$byes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
			$legbyes = Extra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
			$total_extras = $wides + $noballs + $byes + $legbyes;
			$runss = $runss + $total_extras;
				
			$runs1 = BowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
			$runs1 = $runs1 + $byes + $legbyes;
	
			$object = new \stdClass();
			$object->extras = $total_extras;
			$object->runss = $runss;
			$object->runs1 = $runs1;
	
		return json_encode($object);	
	}

	public function statsupdate($matchId,$formatId)
	{
		$status = Match::where('id',$matchId)->select('status')->first()->status;
		if ($status == '0' || $status == '1')
		{
			$count = 0;
			// updating batting stats
			$records = BatsmenScore::where('match_id',$matchId)->get();
			foreach ($records as $key => $value)
			{
				$playerId = $value->batsmen_id;
				// return $playerId; ID Found
				$stats = PlayerStat::where('player_id',$playerId)->where('format',$formatId)->get();
				if(count($stats) > 0 ) {
					$count++;
				}
				else{
					$stats = new PlayerStat;
					$stats->player_id = $playerId;
					$stats->format = $formatId;
					$stats->matches = '0';
					$stats->save();
					$stats = PlayerStat::where('player_id',$playerId)->get();
				}
				// echo "key".$key."<br>";
				// echo "stat:".$stats[0]->balls_played."<br>";
				$matches = $stats[0]->matches;
				$innings = $stats[0]->innings;
				$notouts = $stats[0]->notouts;
				$runs = $stats[0]->runs;
				$highscore = $stats[0]->highscore;
				$balls_played = $stats[0]->balls_played;
				$average_bat = $stats[0]->average_bat;
				$strikerate= $stats[0]->strikerate;
				$centuries = $stats[0]->centuries;
				$halfcenturies = $stats[0]->halfcenturies;
				$fours = $stats[0]->fours;
				$sixes = $stats[0]->sixes;

				
				if ($value->out_how == 'dnb'){
					$player_stat = PlayerStat::where('player_id',$playerId)->first();
					$matches = $matches + 1;
					$player_stat->matches = $matches;
					$player_stat->save();
				}
				elseif ($value->out_how == 'nt') {
					$player_stat = PlayerStat::where('player_id',$playerId)->first();
					$matches = $matches + 1;
					$player_stat->matches = $matches;

					$notouts = $notouts + 1;
					$player_stat->notouts = $notouts;

					$runs = $runs + $value->runs;
					$player_stat->runs = $runs;

					if ($value->runs > $highscore) {
						$highscore = $value->runs;
					}
					$player_stat->highscore=$highscore;
					if ($innings == 0) {
						$player_stat->average_bat = 0.00;
					}
					else{
						$average_bat = $runs/$innings;
						$player_stat->average_bat = $average_bat;
					}
					$balls_played = $balls_played + $value->balls;
					$player_stat->balls_played = $balls_played;
					if ($balls_played == "0"){
						// echo "ball played aaj tk 1:". $balls_played ."<br>";
						if ($value->balls > 0){
							// echo "ball value match ma: ".$value->balls."<br>";
							$player_stat->strikerate = ($value->runs/$value->balls)*100;
							// echo "SR1:". ($value->runs/$value->balls)*100 ."<br>" ;
						}
						else{
							// echo "aaj k match ma zero balls: ".$value->balls."<br>";
							$player_stat->strikerate = 0;
						}
					}
					else{
						$player_stat->strikerate = ($runs/$balls_played)*100;
					}
					if ($value->runs >= 100) {
						$player_stat->centuries = $centuries + 1;
					}
					if ($value->runs >= 50 && $value->runs < 100 ) {
						$player_stat->halfcenturies = $halfcenturies + 1;
					}
					$player_stat->fours = $fours + $value->fours;
					$player_stat->sixes = $sixes + $value->sixes;
					$player_stat->save();
				}
				else
				{
					$player_stat = PlayerStat::where('player_id',$playerId)->first();
					$matches = $matches + 1;
					$player_stat->matches = $matches;

					$innings = $innings + 1;
					$player_stat->innings = $innings;

					$runs = $runs + $value->runs;
					$player_stat->runs = $runs;

					if ($value->runs > $highscore) {
						$highscore = $value->runs;
					}
					$player_stat->highscore= $highscore;
					if ($innings == 0) {
						$average_bat = $runs;
					}
					else{
						$average_bat = $runs/$innings;
					}
					$player_stat->average_bat = $average_bat;

					$player_stat->balls_played = $balls_played + $value->balls;
					if ($balls_played == 0){
						// echo "ball played aaj tk: ". $balls_played."<br>";
						if ($value->balls > 0){
							// echo "ball value match ma: ".$value->balls."<br>";
							$player_stat->strikerate = ($value->runs/$value->balls)*100;
							// echo "SR:". ($value->runs/$value->balls)*100 ."<br>" ;
						}
						else{
							// echo "aj k match ma zero balls: ".$value->balls."<br>";
							$player_stat->strikerate = 0;
						}
					}
					else{
						$player_stat->strikerate = ($runs/$balls_played)*100;
					}
					if ($value->runs >= 100) {
						$player_stat->centuries = $centuries + 1;
					}
					if ($value->runs >= 50 && $value->runs < 100 ) {
						$player_stat->halfcenturies = $halfcenturies + 1;
					}
					$player_stat->fours = $fours + $value->fours;
					$player_stat->sixes = $sixes + $value->sixes;
					$player_stat->save();
				}
				// echo "-----------"."<br>";
			}
			// updating balling stats
			$records = BowlerScore::where('match_id',$matchId)->get();
			foreach ($records as $key => $value) 
			{
				$playerId = $value->bowler_id;
				$stats = PlayerStat::where('player_id',$playerId)->where('format',$formatId)->get();
				if (count($stats)>0) {
					$count++;
				}
				else{
					$stats = new PlayerStat;
					$stats->player_id = $playerId;
					$stats->format = $formatId;
					$stats->matches = '0';
					$stats->save();
					$stats = PlayerStat::where('player_id',$playerId)->where('format',$formatId)->get();
				}
				$matches = $stats[0]->matches;
				$innings_bowl = $stats[0]->innings_bowl;
				$overs = $stats[0]->overs;
				$runs_ball =$stats[0]->runs_ball;
				$wickets =$stats[0]->wickets;
				$average_ball = $stats[0]->average_ball;
				$best_ball = $stats[0]->best_ball;
				$economy = $stats[0]->economy;
				$five_wickets = $stats[0]->five_wickets;

				if ($value->overs == '0' || $value->overs == NULL) {
					$count++;
				}
				else
				{
					$player_stat = PlayerStat::where('player_id',$playerId)->first();

					$innings_bowl = $innings_bowl + 1;
					$player_stat->innings_bowl = $innings_bowl;

					$overs = $overs + $value->overs;
					$player_stat->overs = $overs;
					
					$runs_ball = $runs_ball + $value->runs;
					$player_stat->runs_ball = $runs_ball;

					$wickets = $wickets + $value->wickets;
					$player_stat->wickets = $wickets;

					if ($wickets == 0) {
						$average_ball = $average_ball;
					}
					else{
						$average_ball = $runs_ball/$wickets;
					}
					$player_stat->average_ball = $average_ball;


					list($a, $b) = explode("/",$best_ball);
					if ($value->wickets > $a) {
						$best_ball = $value->wickets.'/'.$value->runs;
					}
					elseif ($value->wickets == $a) {
						if ($b < $value->runs) {
							$best_ball = $best_ball;
						}
						elseif ($b > $value->runs) {
							$best_ball = $a.'/'.$value->runs;
						}
					}
					elseif ($value->wickets < $a) {
						$best_ball = $best_ball;
					}
					$player_stat->best_ball = $best_ball;

					if($overs > 0){
						$economy = $runs_ball/$overs;
					}
					$player_stat->economy = $economy;

					if ($value->wickets >4) {
						$five_wickets = $five_wickets + 1;
					}
					$player_stat->five_wickets = $five_wickets;

					$player_stat->save();


				}
			}
		}
		else{
			return view('unauthorized');
		}
	}

	public function generateResult($matchId)
	{
		$runsone = InningScore::where('match_id',$matchId)
					 		  ->where('inning_no','1')
					 		  ->select('runs')
					 		  ->first()->runs;
		$wicketsone = InningScore::where('match_id',$matchId)
					 		  ->where('inning_no','1')
					 		  ->select('wickets')
					 		  ->first()->wickets;
		$winner = '0';
		$runstwo = InningScore::where('match_id',$matchId)
					 		  ->where('inning_no','2')
					 		  ->select('runs')
					 		  ->first()->runs;
		$wicketstwo = InningScore::where('match_id',$matchId)
					 		  ->where('inning_no','2')
					 		  ->select('wickets')
					 		  ->first()->wickets;

		
		$club1 = InningScore::where('match_id',$matchId)->where('inning_no',1)->select('club_id')->first()->club_id;
		echo "CLUB 1: ".$club1."<br>";
		$club2 = InningScore::where('match_id',$matchId)->where('inning_no',2)->select('club_id')->first()->club_id;
		echo "CLUB 2: ".$club2."<br>";

		$clubname1 = Club::where('id',$club1)->select('name')->first()->name;
		echo "CLUB 1: ".$clubname1."<br>";
		$clubname2 = Club::where('id',$club2)->select('name')->first()->name;
		echo "CLUB 2: ".$clubname2."<br>";

		$toss = Match::where('id',$matchId)->select('toss')->first()->toss;
		echo "TOSS: ". $toss . "<br>";

		$action = Match::where('id',$matchId)->select('choose_to')->first()->choose_to;
		echo "Action: ". $action . "<br>";

		$winnerclub = '0';
		$winnerclubname= 'Name';
		$result = 'empty';

		if ($runsone > $runstwo)
		{
			echo "If"."<br>";
			$winner = '1st Inning';
			$winnerclub = $club1;
			$winnerclubname = $clubname1;
			$result = '"' .$winnerclubname. '" Won By ' .($runsone-$runstwo). ' Runs'; 
		}
		elseif ($runsone < $runstwo)
		{
			echo "ELSE If"."<br>";
			$winner = '2nd Inning';
			$winnerclub = $club2;
			$winnerclubname = $clubname2;
			$result = '"' .$winnerclubname. '" Won By ' .(10 - $wicketstwo). ' Wickets'; 
		}
		else
		{
			$winner = 'Draw';
			$winnerclub = '0';
			$result = 'Match Tied';
		}
		Match::where('id',$matchId)->update([
			'winner_club_id'=>$winnerclub,
			'result'=>$result,
			'status'=>'2'
		]);
		echo "Result: ". $result ."<br>";
		return "<br>"."END"."<br>";
	}

	public function finishmatch(Request $request, $matchId)
	{
		$this->inningscore($matchId,2);
		$this->statsupdate($matchId,$request->format);
		$this->generateResult($matchId);
		return redirect(route('scorecard',$matchId));
	}

	public function scorecard($match)
	{
		$status = Match::where('id',$match)->select('status')->first()->status;
		// return $status;
		if ($status == 2) {
			$club1 = InningScore::where('match_id',$match)->where('inning_no',1)->select('club_id')->first()->club_id;
			$club2 = InningScore::where('match_id',$match)->where('inning_no',2)->select('club_id')->first()->club_id;
			$clubname1 = Club::where('id',$club1)->select('name')->first()->name;
			$clubname2 = Club::where('id',$club2)->select('name')->first()->name;
			$batfirst = BatsmenScore::where('match_id',$match)->where('inning_no',1)->get();
			$batsecond = BatsmenScore::where('match_id',$match)->where('inning_no',2)->get();
			$ballfirst = BowlerScore::where('match_id',$match)->where('inning_no',2)->get();
			$ballsecond = BowlerScore::where('match_id',$match)->where('inning_no',1)->get();
			$extrafirst = Extra::where('match_id',$match)->where('inning_no',1)->first();
			$extrasecond = Extra::where('match_id',$match)->where('inning_no',2)->first();
			$inningscorefirst = InningScore::where('match_id',$match)->where('inning_no',1)->first();
			$inningscoresecond = InningScore::where('match_id',$match)->where('inning_no',2)->first();
			$result = Match::where('id',$match)->select('result')->first()->result;
			return view('admin.scorecard',compact('batfirst','batsecond','ballfirst','ballsecond','extrafirst','extrasecond','inningscorefirst','inningscoresecond','result','wickets','format','club1','club2','clubname1','clubname2'));

		}
		else{
			return view('unauthorized');
		}

	}

	
#right now not in use 13-Feb-2019
	public function batsmenScore($id)
	{
		$batsmenScores = BatsmenScore::where('match_id',$id)->get();
		return DataTables::of($batsmenScores)
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
		return DataTables::of($bowlerScores)
		->addColumn('bowler',function($bowlerScore){
			return '<strong>'.$bowlerScore->batsmen->name.'</strong>';
		})
		->rawColumns(['bowler'])
		->make(true);
	}

	public function fallofwickets($id)
	{
		$fallofwickets = FallOfWicket::select(['score'])->where('match_id',$id)->get();
		return DataTables::of($fallofwickets)
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
		return DataTables::of($runsovers)
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
		return DataTables::of($extras)->make(true);
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
