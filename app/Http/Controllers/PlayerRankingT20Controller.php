<?php

namespace App\Http\Controllers;

use App\Club;
use App\Player;
use App\PlayerRole;
use App\PlayersRankingT20;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayerRankingT20Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerRankingT20s = PlayersRankingT20::all();
        return view('admin.playerRankingt20.index',compact('playerRankingT20s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playerRankingT20s = PlayersRankingT20::all();

        $roles = PlayerRole::pluck('name','id')->all();


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


        $players = Player::pluck('name','id')->all();


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.playerRankingt20.create', compact('players','roles','clubs','playerRankingT20s'));
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






        PlayersRankingT20::create($input);


        Session::flash('created_playerRankingT20','The Ranking for T20 has been created.');
        return redirect('/admin/playersRankingT20s');
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
        $playerRankingT20s = PlayersRankingT20::findOrFail($id);

        $roles = PlayerRole::pluck('name','id')->all();


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


        $players = Player::pluck('name','id')->all();


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.playerRankingt20.edit', compact('players','roles','clubs','playerRankingT20s'));
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
        $playerRankingT20 = PlayersRankingT20::findOrFail($id);

        $input = $request->all();



        $input['photo_id'] = $request->photo_id;

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

        $input['role_id'] = $request->role_id;

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;

        $playerRankingT20->update($input);

        Session::flash('updated_playerRankingT20','The Ranking for T20 has been updated.');

        return redirect('/admin/playersRankingT20s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playerRankingT20 = PlayersRankingT20::findOrFail($id);


        //unlink(public_path() . $player->photo->file);


        $playerRankingT20->delete();


        Session::flash('deleted_playerRankingT20','The Ranking for T20 has been deleted.');


        return redirect('/admin/playersRankingT20s');
    }
}
