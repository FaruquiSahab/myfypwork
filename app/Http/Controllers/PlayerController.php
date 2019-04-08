<?php

namespace App\Http\Controllers;

use App\BattingStyle;
use App\BowlingStyle;
use App\Club;
use App\Photo;
use App\Player;
use App\PlayerRole;
use App\PlayerStat;
use DataTables;
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
        $players = Player::where('active_status',0);
        return DataTables::of($players)
        ->addColumn('names',function($player)
        {
            return '<strong>'.$player->name. '</strong>';
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
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->button_action == 0)
            {
                $player = new Player([
                    'name' => $request->name,
                    'age' => \Carbon\Carbon::parse($request->date_of_birth)->age,
                    'date_of_birth' => $request->date_of_birth,
                    'club_id' => $request->club_id,
                    'role_id' => $request->role_id,
                    'batting_style_id' => $request->batting_style_id,
                    'bowling_style_id' => $request->bowling_style_id,
                    'active_status'=>0
                ]);
                $player->save();
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
                $success_output = 'Player '.$request->name.' Updated';
            }
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

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

    public function statsindex()
    {
        return view('admin.players.stats.index');
    }
    //twenty 20
    public function statsdata1()
    {
        $stats = PlayerStat::where('format',1)->get();
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
        $stats = PlayerStat::where('format',2)->get();
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
}
