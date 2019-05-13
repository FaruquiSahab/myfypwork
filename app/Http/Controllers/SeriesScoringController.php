<?php

namespace App\Http\Controllers;

use App\SeriesBatsmenScore;
use App\SeriesBowlerScore;
use App\SeriesExtra;
use App\FallOfWicket;
use App\Series_Lineups;
use App\Series_Matches;
use App\Option;
use App\Player;
use App\Club;
use App\Out;
use App\Over;
use App\Tass;
use App\SeriesInningScore;
use App\CheckNotOut;
use DB;
use App\RoundrobinTournament;
use App\Series_Fixtures;
use App\PlayerStat;
use App\Team_Stats;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Garethellis\CricketStatsHelper\CricketStatsHelper;

class SeriesScoringController extends Controller
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
  		// return "hello";
		$matches = Series_Matches::where('id',$match)->get();
		// return $matches;
		if($matches[0]->status == 0 || $matches[0]->status == 1)
		{

			#cached data
				$checknotout = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)->sum('checknotout');
				$helper = new CricketStatsHelper();
				$runs = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)->sum('runs');
				$balls = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)->sum('balls');
				$overs = $helper->convertBallsToOvers($balls);
				$wicketss = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)
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
				$wides = SeriesExtra::where('match_id', $match)->where('inning_no',1)->sum('wides');
				$noballs = SeriesExtra::where('match_id', $match)->where('inning_no',1)->sum('no_balls');
				$byes = SeriesExtra::where('match_id', $match)->where('inning_no',1)->sum('byes');
				$legbyes = SeriesExtra::where('match_id', $match)->where('inning_no',1)->sum('leg_byes');
				$runs = $runs + $wides + $noballs + $byes + $legbyes;


				$total_extras = $wides + $noballs + $byes + $legbyes;

				
				$runs1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',2)->sum('runs');
				$balls1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',2)->sum('balls');
				$overs1 = $helper->convertBallsToOvers($balls1);
				$wicketss1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',2)->sum('wickets');
				$wicketsother = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)
				->where(function($query) 
				{
					$query->where('out_how', 'ro')
					->orWhere('out_how', 'to');
				})
				->count();
				$wicketss1 = $wicketss1 + $wicketsother;
				$runs1 = $runs1 + $byes + $legbyes;
			#///


			#////////////////////// Batting First
					$battingfirst = Series_Lineups::where('match_id',$match)->where('innings_no',1)->get();
						for ($i=0; $i < sizeof($battingfirst) ; $i++)
						{
							SeriesBatsmenScore::updateOrCreate
							(
								[
									'match_id'=>$matches[0]->id,
									'batsmen_id'=>$battingfirst[$i]->player->id,
									'inning_no'=>1
								]
							);
						}
					$battingfirst = SeriesBatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
					// return $battingfirst[0]->balls;
			#//////////////////////



			#////////////////////// Balling First
						$ballingfirst = Series_Lineups::where('match_id',$match)->where('innings_no',2)->get();
						// return sizeof($ballingfirst);
							for ($i=0; $i < sizeof($ballingfirst) ; $i++)
						{
							// echo 'i(F) =>'. $i . '<br>';
							// echo 'role =>'. $ballingfirst[$i]->player->role_id . '<br>';
							if ($ballingfirst[$i]->player->role_id == 2)
							{
								// echo 'roleReqq1 =>'. $ballingfirst[$i]->player->role_id . '<br>';
								SeriesBowlerScore::updateOrCreate
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
								SeriesBowlerScore::updateOrCreate
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
						$ballingfirst = SeriesBowlerScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
			#//////////////////////




			#//////////////////////Extra
				SeriesExtra::updateOrCreate(
					[
						'match_id'=>$match,
						'inning_no'=>1
					]
				);
				$extra = SeriesExtra::where('match_id',$match)->where('inning_no',1)->get();
			#//////////////////////




			#others
					$options = Option::all();
					$optionsE = Option::where('legal','1')->get();
					$wickets = Out::all();
					$format = Series_Matches::where('id',$match)->first()->series_type_id;
			#////

			return view('admin.series_scoringscorecard',compact('checknotout','format','total_extras','runs','overs','wicketss','runs1','overs1','wicketss1','matches' ,'options','optionsE','wickets','battingfirst','ballingfirst','extra'));
		}
		elseif ($matches[0]->status == 2) {
			try{
				return redirect(route('scorecard',$match));
			}
			catch(Exception $ex){
				return view('unauthorized');
			}
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

    	
    	DB::table('series_batsmen_scores')
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
	    if ($request->out_how == 'nt') {
	    	DB::table('series_batsmen_scores')
	    	->where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('batsmen_id',$request->batsmen_id)
	    	->update(['checknotout'=>'1']);
	    }
	    else{
	    	DB::table('series_batsmen_scores')
	    	->where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('batsmen_id',$request->batsmen_id)
	    	->update(['checknotout'=>'0']);
	    }
			$data = SeriesBatsmenScore::where('match_id',$request->match_id)
			->where('inning_no',$request->innings_no)
			->where('batsmen_id',$request->batsmen_id)
			->get(['runs','balls']);
			
			$helper = new CricketStatsHelper();
			
			$runss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');

			$ballss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('balls');
			$overs = $helper->convertBallsToOvers($ballss);
			$wicketss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)
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
			$wides = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('wides');
			$noballs = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('no_balls');
			$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
			$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
			$runss = $runss + $wides + $noballs + $byes + $legbyes;
			$checknotout = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('checknotout');
		// return $data;
		$object= new \stdClass();
		$object->runs = $runss;
		$object->overs = $overs;
		$object->wickets = $wicketss;
		$object->checknotout = $checknotout;

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

    	SeriesBowlerScore::where('match_id',$request->match_id)
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
    	$data = SeriesBowlerScore::where('match_id',$request->match_id)
	    					->where('inning_no',$request->innings_no)
	    					->where('bowler_id',$request->bowler_id)
							->get(['economy']);
		$runs1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
		$balls1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('balls');
		$overs1 = $helper->convertBallsToOvers($balls1);
		$wicketss1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('wickets');
		
		$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
		$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;

		$wicketsother = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)
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


    	SeriesExtra::where('match_id',$request->match_id)
	    	->where('inning_no',$request->inning_no)
	    	->update([
	    		'wides'=>$wides,
	    		'no_balls'=>$noballs,
	    		'byes'=>$byes,
	    		'leg_byes'=>$legbyes,
			]);
			$runss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
			$wides = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('wides');
			$noballs = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('no_balls');
			$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('byes');
			$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',1)->sum('leg_byes');
			$total_extras = $wides + $noballs + $byes + $legbyes;
			$runss = $runss + $total_extras;
			
			$runs1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
			$runs1 = $runs1 + $byes + $legbyes;

			$object = new \stdClass();
			$object->extras = $total_extras;
			$object->runss = $runss;
			$object->runs1 = $runs1;

	    return json_encode($object);

  	}

	public function inningscore($matchId,$inningNo)
	{	
		$playerId =  SeriesBatsmenScore::where('match_id',$matchId)->where('inning_no',$inningNo)->first()->batsmen_id;
		$clubid = Player::where('id',$playerId)->first()->club_id;
		$helper = new CricketStatsHelper();
		if($inningNo == 1)
		{
			$runs1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('runs');
			$balls1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',2)->sum('wickets');
		}
		elseif($inningNo == 2)
		{
			$runs1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('runs');
			$balls1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = SeriesBowlerScore::where('match_id',$matchId)->where('inning_no',1)->sum('wickets');
		}
		
		$byes = SeriesExtra::where('match_id', $matchId)->where('inning_no',$inningNo)->sum('byes');
		$legbyes = SeriesExtra::where('match_id', $matchId)->where('inning_no',$inningNo)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;

		$wicketsother = SeriesBatsmenScore::where('match_id',$matchId)->where('inning_no',$inningNo)
		->where(function($query) 
		{
			$query->where('out_how', 'ro')
			->orWhere('out_how', 'to');
		})
		->count();
		$wicketss1 = $wicketss1 + $wicketsother;
		SeriesInningScore::updateOrCreate(
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
		Series_Matches::where('id',$match)->update([
			'status'=> '1'
			]);
		return redirect(route('series.scoring.match2',$match));
	}

	public function index2($match)
	{
		$matches = Series_Matches::where('id',$match)->get();
		if($matches[0]->status == 1)
		{
			$this->inningscore($match,1);
			$helper = new CricketStatsHelper();
			$checknotout = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)->sum('checknotout');
			$runs = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)->sum('runs');
			$balls = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)->sum('balls');
			$overs = $helper->convertBallsToOvers($balls);
			$wicketss = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)
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
			$wides = SeriesExtra::where('match_id', $match)->where('inning_no',2)->sum('wides');
			$noballs = SeriesExtra::where('match_id', $match)->where('inning_no',2)->sum('no_balls');
			$byes = SeriesExtra::where('match_id', $match)->where('inning_no',2)->sum('byes');
			$legbyes = SeriesExtra::where('match_id', $match)->where('inning_no',2)->sum('leg_byes');
			$runs = $runs + $wides + $noballs + $byes + $legbyes;
		
		
			$total_extras = $wides + $noballs + $byes + $legbyes;
		
				
			$runs1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',1)->sum('runs');
			$balls1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',1)->sum('balls');
			$overs1 = $helper->convertBallsToOvers($balls1);
			$wicketss1 = SeriesBowlerScore::where('match_id',$match)->where('inning_no',1)->sum('wickets');
			$wicketsother = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)
			->where(function($query) 
			{
				$query->where('out_how', 'ro')
				->orWhere('out_how', 'to');
			})
			->count();
			$wicketss1 = $wicketss1 + $wicketsother;
			$runs1 = $runs1 + $byes +$legbyes;
		
		
				$matches = Series_Matches::where('id',$match)->get();
		
		
			#////////////////////// Batting Second
				$battingsecond = Series_Lineups::where('match_id',$match)->where('innings_no',2)->get();
					for ($i=0; $i < sizeof($battingsecond) ; $i++)
					{
						SeriesBatsmenScore::updateOrCreate
						(
							[
								'match_id'=>$matches[0]->id,
								'batsmen_id'=>$battingsecond[$i]->player->id,
								'inning_no'=>2
							]
						);
					}
				$battingsecond = SeriesBatsmenScore::where('match_id',$matches[0]->id)->where('inning_no',2)->get();
			#//////////////////////
		
		
		
			#////////////////////// Balling Second
				$ballingsecond = Series_Lineups::where('match_id',$match)->where('innings_no',1)->get();
				// return sizeof($ballingsecond);
					for ($i=0; $i< sizeof($ballingsecond); $i++)
					{
						// echo 'i(S) =>'. $i . '<br>';
						// echo 'role =>'. $ballingsecond[$i]->player->role_id . '<br>';
						if ($ballingsecond[$i]->player->role_id == 2)
						{
							// echo 'roleReq1 =>'. $ballingsecond[$i]->player->role_id . '<br>';
							SeriesBowlerScore::updateOrCreate
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
							SeriesBowlerScore::updateOrCreate
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
				$ballingsecond = SeriesBowlerScore::where('match_id',$matches[0]->id)->where('inning_no',1)->get();
			#//////////////////////
		
		
		
			#//////////////////////Extra
				SeriesExtra::updateOrCreate(
					[
						'match_id'=>$match,
						'inning_no'=>2
					]
				);
				$extra = SeriesExtra::where('match_id',$match)->where('inning_no',2)->get();
			#//////////////////////
		
			#1st Innings Score
				$i1runs = SeriesInningScore::where('match_id',$match)->where('inning_no',1)->first()->runs;
				$i1wickets = SeriesInningScore::where('match_id',$match)->where('inning_no',1)->first()->wickets;
				$i1overs = SeriesInningScore::where('match_id',$match)->where('inning_no',1)->first()->overs;
			#///
		
		
			#others
				$options = Option::all();
				$optionsE = Option::where('legal','1')->get();
				$wickets = Out::all();
				$format = Series_Matches::where('id',$match)->select('series_type_id')->first()->series_type_id;
			#////
		
				// return $battingfirst;
				return view('admin.series_scoringscorecard1',compact('checknotout','format','i1runs','i1wickets','i1overs','total_extras','runs','overs','wicketss','runs1','overs1','wicketss1','matches' ,'options','optionsE','wickets','battingsecond','ballingsecond','extra'));
		}
		elseif ($matches[0]->status == 2) 
		{
			try{
				return redirect(route('series.scorecard',$match));
			}
			catch(Exception $ex){
				return view('unauthorized');
			}
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
	
		DB::table('series_batsmen_scores')
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
		if ($request->out_how == 'nt') {
	    	DB::table('series_batsmen_scores')
	    	->where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('batsmen_id',$request->batsmen_id)
	    	->update(['checknotout'=>'1']);
	    }
	    else{
	    	DB::table('series_batsmen_scores')
	    	->where('match_id',$request->match_id)
	    	->where('inning_no',$request->innings_no)
	    	->where('batsmen_id',$request->batsmen_id)
	    	->update(['checknotout'=>'0']);
	    }
			$data = SeriesBatsmenScore::where('match_id',$request->match_id)
			->where('inning_no',$request->innings_no)
			->where('batsmen_id',$request->batsmen_id)
			->get(['runs','balls']);
				
			$helper = new CricketStatsHelper();
				
			$runss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
	
			$ballss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('balls');
			$overs = $helper->convertBallsToOvers($ballss);
			$wicketss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)
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
			$wides = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('wides');
			$noballs = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('no_balls');
			$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
			$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
			$runss = $runss + $wides + $noballs + $byes + $legbyes;
			$checknotout = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('checknotout');
		// return $data;
		$object= new \stdClass();
		$object->runs = $runss;
		$object->overs = $overs;
		$object->wickets = $wicketss;
		$object->checknotout = $checknotout;
	
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
	
		SeriesBowlerScore::where('match_id',$request->match_id)
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
		$data = SeriesBowlerScore::where('match_id',$request->match_id)
							->where('inning_no',$request->innings_no)
							->where('bowler_id',$request->bowler_id)
							->get(['economy']);
		$runs1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
		$balls1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('balls');
		$overs1 = $helper->convertBallsToOvers($balls1);
		$wicketss1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('wickets');
			
		$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
		$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
		$runs1 = $runs1 + $byes + $legbyes;
	
		$wicketsother = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)
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
	
	
		SeriesExtra::where('match_id',$request->match_id)
			->where('inning_no',2)
			->update([
				'wides'=>$wides,
				'no_balls'=>$noballs,
				'byes'=>$byes,
				'leg_byes'=>$legbyes,
			]);
			$runss = SeriesBatsmenScore::where('match_id',$request->match_id)->where('inning_no',2)->sum('runs');
			$wides = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('wides');
			$noballs = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('no_balls');
			$byes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('byes');
			$legbyes = SeriesExtra::where('match_id', $request->match_id)->where('inning_no',2)->sum('leg_byes');
			$total_extras = $wides + $noballs + $byes + $legbyes;
			$runss = $runss + $total_extras;
				
			$runs1 = SeriesBowlerScore::where('match_id',$request->match_id)->where('inning_no',1)->sum('runs');
			$runs1 = $runs1 + $byes + $legbyes;
	
			$object = new \stdClass();
			$object->extras = $total_extras;
			$object->runss = $runss;
			$object->runs1 = $runs1;
	
		return json_encode($object);	
	}

	public function statsupdate($matchId,$formatId)
	{
		$status = Series_Matches::where('id',$matchId)->select('status')->first()->status;
		if ($status == '0' || $status == '1')
		{
			$count = 0;
				// updating batting stats
			$records = SeriesBatsmenScore::where('match_id',$matchId)->get();
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
				$ducks = $stats[0]->ducks;
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
					if ($value->runs == 0) {
						$ducks = $ducks + 1;
						$player_stat->ducks = $ducks;
					}

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
			$records = SeriesBowlerScore::where('match_id',$matchId)->get();
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
				$wides = $stats[0]->wides;
				$noballs = $stats[0]->noballs;
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

					$helper = new CricketStatsHelper();
					$ballsBowled = $helper->convertOversToBalls($overs);
					$inMatch = $helper->convertOversToBalls($value->overs);
					$totalBalls = $ballsBowled + $inMatch;
					$overs = $helper->convertBallsToOvers($totalBalls);
					$player_stat->overs = $helper->convertBallsToOvers($totalBalls);
					
					$runs_ball = $runs_ball + $value->runs;
					$player_stat->runs_ball = $runs_ball;

					$wides = $wides + mt_rand(0,5);
					$player_stat->wides = $wides;

					$noballs = $noballs + mt_rand(0,3);
					$player_stat->noballs = $noballs;

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

			// $pastRuns = Team_Stats::where('club_id',$club1)->select('runs')->first()->runs;
		}
		else{
			return view('unauthorized');
		}
	}

	public function generateResult($matchId)
	{
		$runsone = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','1')
					 		  ->select('runs')
					 		  ->first()->runs;
		$wicketsone = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','1')
					 		  ->select('wickets')
					 		  ->first()->wickets;
		$oversone = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','1')
					 		  ->select('overs')
					 		  ->first()->overs;			 		  
		$winner = '0';
		$runstwo = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','2')
					 		  ->select('runs')
					 		  ->first()->runs;
		$wicketstwo = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','2')
					 		  ->select('wickets')
					 		  ->first()->wickets;
		$overstwo = SeriesInningScore::where('match_id',$matchId)
					 		  ->where('inning_no','2')
					 		  ->select('overs')
					 		  ->first()->overs;

		
		$club1 = SeriesInningScore::where('match_id',$matchId)->where('inning_no',1)->select('club_id')->first()->club_id;
		echo "CLUB 1: ".$club1."<br>";
		$club2 = SeriesInningScore::where('match_id',$matchId)->where('inning_no',2)->select('club_id')->first()->club_id;
		echo "CLUB 2: ".$club2."<br>";

		$clubname1 = Club::where('id',$club1)->select('name')->first()->name;
		echo "CLUB 1: ".$clubname1."<br>";
		$clubname2 = Club::where('id',$club2)->select('name')->first()->name;
		echo "CLUB 2: ".$clubname2."<br>";

		$toss = Series_Matches::where('id',$matchId)->select('toss')->first()->toss;
		echo "TOSS: ". $toss . "<br>";

		$action = Series_Matches::where('id',$matchId)->select('choose_to')->first()->choose_to;
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
		Series_Matches::where('id',$matchId)->update([
			'winner_club_id'=>$winnerclub,
			'result'=>$result,
			'status'=>'2'
		]);

		$fixture_id = Series_Matches::where('id',$matchId)->first()->fixture_id;
		$refer_id = Series_Fixtures::where('id',$fixture_id)->first()->refer_id;
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club1)->increment('total_matches');
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club2)->increment('total_matches');

		// if ($winnerclub == $club1){
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club1)->increment('win_matches');
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club2)->increment('loss_matches');
		// }
		// elseif ($winnerclub == $club2){
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club2)->increment('win_matches');
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club1)->increment('loss_matches');
		// }
		// elseif ($winnerclub == '0'){
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club1)->increment('tie_matches');
		// RoundrobinTournament::where('refer_id',$refer_id)->where('club_id',$club2)->increment('tie_matches');
		// }
		///////////////////////////////Team Stats 1/////////////////////////////////////
			$allRunsScored = Team_Stats::where('club_id',$club1)->first()->total_runs_scored;
			$allOversFaced = Team_Stats::where('club_id',$club1)->first()->total_overs_faced;
			$allRunsConceed = Team_Stats::where('club_id',$club1)->first()->total_runs_conceded;
			$allOversBowled = Team_Stats::where('club_id',$club1)->first()->total_overs_bowled;
			$matches = Team_Stats::where('club_id',$club1)->first()->matches;
			$wins = Team_Stats::where('club_id',$club1)->first()->win;
			$lost = Team_Stats::where('club_id',$club1)->first()->loss;
			$nr = Team_Stats::where('club_id',$club1)->first()->nr;
			///////////////////////////////CALCULATIONS///////////////////////////////////////
			$allRunsScored = (int)$runsone + (int)$allRunsScored;

				$helper = new CricketStatsHelper();
				$numberOfAllBalls = $helper->convertOversToBalls($allOversFaced);
				$numberOfBalls = $helper->convertOversToBalls($oversone);
				$totalBalls = $numberOfAllBalls + $numberOfBalls;
			$allOversFaced = $helper->convertBallsToOvers($totalBalls);

			$allRunsConceed = (int)$runstwo + (int)$allRunsConceed;

				$helper = new CricketStatsHelper();
				$numberOfAllBalls = $helper->convertOversToBalls($allOversBowled);
				$numberOfBalls = $helper->convertOversToBalls($overstwo);
				$totalBalls = $numberOfAllBalls + $numberOfBalls;
			$allOversBowled = $helper->convertBallsToOvers($totalBalls);

			$runsrateA = $allRunsScored / $allOversFaced;
			$runrateB = $allRunsConceed / $allOversBowled;
			$matches = $matches + 1;
			if ($winnerclub == $club1) 		{ $wins = $wins + 1; }
			elseif($winnerclub == 0) 		{ $nr = $nr+1; }
			elseif($winnerclub == $club2) 	{ $lost = $lost + 1; }
			////////////////////////////UPDATING//////////////////////////////////
			$team_stats = Team_Stats::where('club_id',$club1)->first();
			$team_stats->total_runs_scored = $allRunsScored;
			$team_stats->total_overs_faced = $allOversFaced;
			$team_stats->total_runs_conceded = $allRunsConceed;
			$team_stats->total_overs_bowled = $allOversBowled;
			$team_stats->nrr = $runsrateA - $runrateB;
			$team_stats->matches = $matches;
			$team_stats->win = $wins;
			$team_stats->loss = $lost;
			$team_stats->nr = $nr;
			$team_stats->save();
		/////////////////////////////////////END////////////////////////////////////////

		///////////////////////////////Team Stats 2/////////////////////////////////////
			$allRunsScored = Team_Stats::where('club_id',$club2)->first()->total_runs_scored;
			$allOversFaced = Team_Stats::where('club_id',$club2)->first()->total_overs_faced;
			$allRunsConceed = Team_Stats::where('club_id',$club2)->first()->total_runs_conceded;
			$allOversBowled = Team_Stats::where('club_id',$club2)->first()->total_overs_bowled;
			$matches = Team_Stats::where('club_id',$club2)->first()->matches;
			$wins = Team_Stats::where('club_id',$club2)->first()->win;
			$lost = Team_Stats::where('club_id',$club2)->first()->loss;
			$nr = Team_Stats::where('club_id',$club2)->first()->nr;
			///////////////////////////////CALCULATIONS///////////////////////////////////////
			$allRunsScored = (int)$runstwo + (int)$allRunsScored;

				$helper = new CricketStatsHelper();
				$numberOfAllBalls = $helper->convertOversToBalls($allOversFaced);
				$numberOfBalls = $helper->convertOversToBalls($overstwo);
				$totalBalls = $numberOfAllBalls + $numberOfBalls;
			$allOversFaced = $helper->convertBallsToOvers($totalBalls);

			$allRunsConceed = (int)$runsone + (int)$allRunsConceed;

				$helper = new CricketStatsHelper();
				$numberOfAllBalls = $helper->convertOversToBalls($allOversBowled);
				$numberOfBalls = $helper->convertOversToBalls($oversone);
				$totalBalls = $numberOfBalls + $numberOfAllBalls;
			$allOversBowled = $helper->convertBallsToOvers($totalBalls);

			$runsrateA = $allRunsScored / $allOversFaced;
			$runrateB = $allRunsConceed / $allOversBowled;

			$matches = $matches + 1;
			if ($winnerclub == $club2) 		{ $wins = $wins + 1; }
			elseif($winnerclub == 0) 		{ $nr = $nr+1; }
			elseif($winnerclub == $club1) 	{ $lost = $lost + 1; }
			////////////////////////////UPDATING//////////////////////////////////
			$team_stats = Team_Stats::where('club_id',$club2)->first();
			$team_stats->total_runs_scored = $allRunsScored;
			$team_stats->total_overs_faced = $allOversFaced;
			$team_stats->total_runs_conceded = $allRunsConceed;
			$team_stats->total_overs_bowled = $allOversBowled;
			$team_stats->nrr = $runsrateA - $runrateB;
			$team_stats->matches = $matches;
			$team_stats->win = $wins;
			$team_stats->loss = $lost;
			$team_stats->nr = $nr;
			$team_stats->save();
		/////////////////////////////////////END////////////////////////////////////////



		echo "Result: ". $result ."<br>";
		return "<br>"."END"."<br>";
	}

	public function finishmatch(Request $request, $matchId)
	{
		$matches = Series_Matches::where('id',$matchId)->get();
		if($matches[0]->status == 1)
		{
			$this->inningscore($matchId,2);
			$this->statsupdate($matchId,$request->format);
			$this->generateResult($matchId);
			return redirect(route('series.scorecard',$matchId));
		}
	}

	public function scorecard($match)
	{
		$status = Series_Matches::where('id',$match)->first()->status;
		if ($status == 2)
		{
			$club1 = SeriesInningScore::where('match_id',$match)->where('inning_no',1)->select('club_id')->first()->club_id;
			$club2 = SeriesInningScore::where('match_id',$match)->where('inning_no',2)->select('club_id')->first()->club_id;
			$clubname1 = Club::where('id',$club1)->select('name')->first()->name;
			$clubname2 = Club::where('id',$club2)->select('name')->first()->name;
			$batfirst = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',1)->get();
			$batsecond = SeriesBatsmenScore::where('match_id',$match)->where('inning_no',2)->get();
			$ballfirst = SeriesBowlerScore::where('match_id',$match)->where('inning_no',2)->get();
			$ballsecond = SeriesBowlerScore::where('match_id',$match)->where('inning_no',1)->get();
			$extrafirst = SeriesExtra::where('match_id',$match)->where('inning_no',1)->first();
			$extrasecond = SeriesExtra::where('match_id',$match)->where('inning_no',2)->first();
			$inningscorefirst = SeriesInningScore::where('match_id',$match)->where('inning_no',1)->first();
			$inningscoresecond = SeriesInningScore::where('match_id',$match)->where('inning_no',2)->first();
			$result = Series_Matches::where('id',$match)->first()->result;
			return view('admin.series_scorecard',compact('batfirst','batsecond','ballfirst','ballsecond','extrafirst','extrasecond','inningscorefirst','inningscoresecond','result','wickets','format','club1','club2','clubname1','clubname2'));
		}
		else
		{
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
		$bowlerScores = SeriesBowlerScore::where('match_id',$id)->get();
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
		$extras = SeriesExtra::where('match_id',$id)->get();
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
