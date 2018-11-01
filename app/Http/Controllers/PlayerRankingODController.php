<?php

namespace App\Http\Controllers;

use App\Club;
use App\Player;
use App\PlayerRole;
use App\PlayersRankingOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayerRankingODController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerRankingODs = PlayersRankingOD::all();
        return view('admin.playerRankingOds.index',compact('playerRankingODs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playerRankingODs = PlayersRankingOD::all();

        $roles = PlayerRole::pluck('name','id')->all();


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


        $players = Player::pluck('name','id')->all();


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.playerRankingOds.create', compact('players','roles','clubs','playerRankingODs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input = $request->all();

        $input['photo_id'] = $request->photo_id;

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

        $input['role_id'] = $request->role_id;

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;






        PlayersRankingOD::create($input);


        Session::flash('created_playerRankingOD','The Ranking for OD has been created.');
        return redirect('/admin/playersRankingODs');

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
        $playerRankingODs = PlayersRankingOD::findOrFail($id);

        $roles = PlayerRole::pluck('name','id')->all();


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


        $players = Player::pluck('name','id')->all();


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.playerRankingOds.edit', compact('players','roles','clubs','playerRankingODs'));
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
        $playerRankingOD = PlayersRankingOD::findOrFail($id);

        $input = $request->all();



        $input['photo_id'] = $request->photo_id;

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

        $input['role_id'] = $request->role_id;

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;

        $playerRankingOD->update($input);

        Session::flash('updated_playerRankingOD','The Ranking for OD has been updated.');

        return redirect('/admin/playersRankingODs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playerRankingOD = PlayersRankingOD::findOrFail($id);


        //unlink(public_path() . $player->photo->file);


        $playerRankingOD->delete();


        Session::flash('deleted_playerRankingOD','The Ranking for OD has been deleted.');


        return redirect('/admin/playersRankingODs');
    }
}






