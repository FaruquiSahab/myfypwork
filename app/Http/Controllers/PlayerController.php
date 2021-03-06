<?php

namespace App\Http\Controllers;

use App\BattingStyle;
use App\BowlingStyle;
use App\Club;
use App\Photo;
use App\Player;
use App\PlayerRole;
use App\PlayerStat;
use App\BatsmenScore;
use App\BowlerScore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Excel;
use Response;
use DataTables;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = PlayerRole::pluck('name','id')->all();
        $batting_styles = BattingStyle::pluck('name','id')->all();
        $clubs = Club::where('active_status',0)->pluck('name','id')->all();
        $bowling_styles = BowlingStyle::pluck('name','id')->all();
        return view('admin.players.index',compact('roles','batting_styles','bowling_styles','clubs'));
    }
    public function playersData()
    {
        $players = Player::where('active_status',0)->get();
        return DataTables::of($players)
        ->addColumn('names',function($player)
        {
            return 
            '<strong>'.$player->name. 
            '<a href="'.route('recordplayer',$player->id).'">
            <i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i>
            </a>
            </strong>';
        })
        ->addColumn('role',function($player)
        {
            return $player->role->name;
        })
        ->addColumn('bat',function($player)
        {
            return $player->batting_style->name;
        })
        ->addColumn('ball',function($player)
        {
            return $player->bowling_style->name;
        })
        ->addColumn('club',function($player)
        {
            return $player->club->name;
        })
        ->addColumn('action',function($player)
        {
            return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
            data-id="' .$player->id. '"
            data-name="' .$player->name. '"
            data-date_of_birth="' .$player->date_of_birth. '"
            data-club="' .$player->club_id. '"
            data-role="' .$player->role_id. '"
            data-bat="' .$player->batting_style_id. '"
            data-ball="' .$player->bowling_style_id. '">
            <i class="glyphicon glyphicon-edit"></i> Change </a>
            <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$player->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
        })

        ->rawColumns(['names','action'])
        ->make(true);
    }

    public function record($id)
    {
        $player = Player::where('id',$id)->first()->name;
        $role_id = Player::where('id',$id)->first()->role_id;
        $stats_t = PlayerStat::where('player_id',$id)->where('format',1)->first();
        $batsmen = BatsmenScore::join('matches','batsmen_scores.match_id','matches.id')
                                ->where('batsmen_scores.batsmen_id',$id)
                                ->orderBy('batsmen_scores.updated_at','DESC')
                                ->where('matches.status',2)->get();
        $bowler = BowlerScore::join('matches','bowler_scores.match_id','matches.id')
                                ->where('bowler_scores.bowler_id',$id)
                                ->orderBy('bowler_scores.updated_at','DESC')
                                ->where('matches.status',2)->get();
        return view('admin.players.recordsandstats',compact('player','role_id','stats_t','batsmen','bowler'));
    }

    public function club($id)
    {
        $players = Player::where('club_id',$id)->where('active_status',0)->get();
        $roles = PlayerRole::pluck('name','id')->all();
        $batting_styles = BattingStyle::pluck('name','id')->all();
        $clubs = Club::where('id',$id)->pluck('name','id');
        $bowling_styles = BowlingStyle::pluck('name','id')->all();
        return view('admin.players.index',compact('players','roles','batting_styles','bowling_styles','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::where('active_status',0);
        $roles = PlayerRole::pluck('name','id')->all();
        $batting_styles = BattingStyle::pluck('name','id')->all();
        $clubs = Club::pluck('name','id')->all();
        $bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.players.create', compact('players','roles','batting_styles','bowling_styles','clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($file = $request->file('photo_id'))
        // {
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $photo = Photo::create(['file'=>$name]);
        // }

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'date_of_birth'  => 'required',
            'club_id'  => 'required',
            'role_id'  => 'required',
            'batting_style_id'  => 'required',
            'bowling_style_id'  => 'required',

        ]);
        $dateOfBirth = Validator::make($request->all(), [
            'date_of_birth'  => ['before:5 years ago'],

        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        elseif($dateOfBirth->fails())
        {
            return 'k';
        }
        else
        {
            if($request->button_action == 0)
            {
                $player = new Player([
                    'name' => $request->name,
                    'age' => \Carbon\Carbon::parse($request->date_of_birth)->age,
                    'date_of_birth' => \Carbon\Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                    'club_id' => $request->club_id,
                    'role_id' => $request->role_id,
                    'batting_style_id' => $request->batting_style_id,
                    'bowling_style_id' => $request->bowling_style_id,
                    'active_status'=>0
                ]);
                $player->save();
                $stats = new PlayerStat;
                $stats->format = '1';
                $stats->player_id = $player->id;
                $stats->role_id = $player->role_id;
                $stats->save();
                $stat = new PlayerStat;
                $stat->format = '2';
                $stat->player_id = $player->id;
                $stat->role_id = $player->role_id;
                $stat->save();
                $success_output = 'Player '.$request->name.' Inserted';
                
            }
            elseif ($request->button_action == 1) 
            {
                $player = Player::findOrFail($request->id);
                $player->name = $request->name;
                $player->age = \Carbon\Carbon::parse($request->date_of_birth)->age;
                $player->date_of_birth = $request->date_of_birth;
                $player->club_id = $request->club_id;
                $player->role_id = $request->role_id;
                $player->batting_style_id = $request->batting_style_id;
                $player->bowling_style_id = $request->bowling_style_id;
                $player->save();
                $stat = PlayerStat::updateOrCreate(
                    ['player_id'=>$player->id,'format'=>'1'],['player_id'=>$player->id,'role_id'=>$player->role_id]);
                $stat = PlayerStat::updateOrCreate(
                    ['player_id'=>$player->id,'format'=>'2'],['player_id'=>$player->id,'role_id'=>$player->role_id]);
                $success_output = 'Player '.$request->name.' Updated';
            }
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

    }

    public function import(Request $request)
    {
        $required = Validator::make($request->all(), [
            'select_file' => 'required',

        ]);
        $format = Validator::make($request->all(), [
            'select_file' => 'mimes:xls,xlsx,csv',
        ]);

        if ($required->fails()) {
            return 'required';
        }
        // elseif ($format->fails()) {
        //     return 'format';
        // }
        else
        {
            // return 'Else';
            if ($request->hasFile('select_file'))
            {
                // return "File";
                $file = $request->file('select_file');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
                $path = $request->file('select_file')->getRealPath();
                $data = Excel::load($path)->toArray();
                if(count($data) > 0)
                {
                    foreach ($data as $key => $value) {
                        #role
                            if (strtolower($value['role']) == 'batsmen') {
                                $role = '1';
                                // echo "Qeemat: ".$role."<br>";
                            }
                            elseif (strtolower($value['role']) == 'bowler') {
                                $role = '2';
                                // echo "Qeemat: ".$role."<br>";
                            }
                            elseif (strtolower($value['role']) == 'all-rounder') {
                                $role = '3';
                                // echo "Qeemat: ".$role."<br>";
                            }
                            elseif (strtolower($value['role']) == 'wicket-keeper') {
                                $role = '4';
                                // echo "Qeemat: ".$role."<br>";
                            }
                        #end

                        #battinghand
                                if (strtolower($value['batting_hand']) == 'right') {
                                    $batting_style = '1';
                                    // echo "Qeemat: ".$batting_style."<br>";
                                }
                                elseif (strtolower($value['batting_hand']) == 'left') {
                                    $batting_style = '2';
                                    // echo "Qeemat: ".$batting_style."<br>";
                                }
                        #end

                        #bowlingstyle
                                if (strtolower($value['bowling_style']) == 'right arm fast') {
                                    $bowling_style = 1;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'right arm fast medium') {
                                    $bowling_style = 2;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'left arm fast') {
                                    $bowling_style = 3;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'left arm fast medium') {
                                    $bowling_style = 4;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'right arm off break') {
                                    $bowling_style = 5;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'right arm leg break') {
                                    $bowling_style = 6;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'left arm orthodox') {
                                    $bowling_style = 7;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                                if (($value['bowling_style']) == 'left arm chinaman') {
                                    $bowling_style = 8;
                                    // echo "Qeemat: ".$bowling_style."<br>";
                                }
                        #end
                        $player = new PLayer;
                        $player->shirt_no = $value['shirt_no'];
                        $player->name = $value['name'];
                        $player->date_of_birth = Carbon::parse($value['date_of_birth'])->format('Y-m-d');
                        $player->club_id = $request->club_id;
                        $player->role_id = $role;
                        $player->batting_style_id = $batting_style;
                        $player->bowling_style_id = $bowling_style;
                        $player->age = \Carbon\Carbon::parse($value['date_of_birth'])->age;
                        $player->active_status = '0';
                        $player->save();
                        $stats = new PlayerStat;
                        $stats->format = '1';
                        $stats->player_id = $player->id;
                        $stats->role_id = $player->role_id;
                        $stats->save();
                        $stat = new PlayerStat;
                        $stat->format = '2';
                        $stat->player_id = $player->id;
                        $stat->role_id = $player->role_id;
                        $stat->save();
                            }
                    return 'success';
                }
                else
                {
                    return "No Data";
                }   
            }
            else
            {
                return "No File";
            }
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
        $player = Player::findOrFail($id);

        $roles = PlayerRole::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


        $batting_styles = BattingStyle::pluck('name','id')->all();


        $bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.players.edit', compact('player','roles','batting_styles','bowling_styles','clubs'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $count = 0;
        $count = Player::where('id',$id)->update(['active_status'=>'1']);
        if($count > 0)
        {
            echo 'Player '.$player->name.' Deleted Successfully';
        }
        else
        {
            echo 'An Error Ocurred Cannot Delete';
        }
    }

    public function statsindexBatsmen()
    {

        return view('admin.players.stats.batsmen');
    }
    public function statsindexBowler()
    {

        return view('admin.players.stats.bowlers');
    }
    public function statsindexAllrounders()
    {

        return view('admin.players.stats.allrounders');
    }
    //twenty 20
    public function statsdata1()
    {
        $stats = PlayerStat::where('format',1)->where('matches','>',0)->get();
        return DataTables::of($stats)
        ->addColumn('names',function($stat){
            return '<h2><strong style="font-size:12px">'.$stat->player->name ?? '--'.'</strong></h2>';
        })
        ->addColumn('format',function($stat){
            return '<strong style="font-size:10px">T20</strong>';
        })
        ->rawColumns(['names','format'])
        ->make(true);
    }
    //one day
    public function statsdata2()
    {
        $stats = PlayerStat::where('format',2)->where('matches','>',0)->get();
        return DataTables::of($stats)
        ->addColumn('names',function($stat){
            return '<h2><strong style="font-size:10px">'.$stat->player->name ?? 'NULL'.'</strong></h2>';
        })
        ->addColumn('format',function($stat){
            return '<strong style="font-size:10px">One Day</strong>';
        })
        ->rawColumns(['names','format'])
        ->make(true);
    }
    public function download()
    {
        $file= storage_path(). "/app/public/sample/Sample.csv";

        $headers = array(
                'Content-Type: application/csv',
                );

        return Response::download($file, 'Samples.csv', $headers);
    }
}
