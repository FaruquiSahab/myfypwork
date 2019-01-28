<?php

namespace App\Http\Controllers;

use App\BatsmenScore;
use App\BowlerScore;
use App\Extra;
use App\FallOfWicket;
use App\Option;
use App\Out;
use App\Over;
use App\Tass;
use DB;
use Datatables;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
	public function index()
	{
		$options = Option::all();
		$optionsE = Option::where('legal','1')->get();
		$wickets = Out::all();
		return view('admin.scoringajax',compact('options','optionsE','wickets'));
	}
    public function index1()
    {
        $options = Option::all();
        $optionsE = Option::where('legal','1')->get();
        $wickets = Out::all();
        return view('admin.scoringajax',compact('options','optionsE','wickets'));
    }

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
