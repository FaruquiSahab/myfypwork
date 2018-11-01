<?php

namespace App\Http\Controllers;

use App\Club;
use App\TeamsRankingT20;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamRankingT20Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamRankingT20s = TeamsRankingT20::all();
        $clubs = Club::pluck('name','id');
        return view('admin.teamRankingt20.index',compact('teamRankingT20s','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamRankingT20s = TeamsRankingT20::all();

        /*$roles = PlayerRole::pluck('name','id')->all();*/


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();




        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.teamRankingt20.create', compact('clubs','teamRankingT20s'));
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

        /*$input['photo_id'] = $request->photo_id;*/

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

        /*$input['role_id'] = $request->role_id;*/

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;






        TeamsRankingT20::create($input);


        Session::flash('created_teamRankingT20','The Ranking for T20 has been created.');
        return redirect('/admin/teamsRankingT20s');
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
        $teamRankingT20s = TeamsRankingT20::findOrFail($id);

        /*$roles = PlayerRole::pluck('name','id')->all();*/


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


/*        $players = Player::pluck('name','id')->all();
*/

        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.teamRankingt20.edit', compact('clubs','teamRankingT20s'));
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
        $teamRankingT20 = TeamsRankingT20::findOrFail($id);

        $input = $request->all();



      /*  $input['photo_id'] = $request->photo_id;*/

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

        /*$input['role_id'] = $request->role_id;*/

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;

        $teamRankingT20->update($input);

        Session::flash('updated_teamRankingT20','The Ranking for T20 has been updated.');

        return redirect('/admin/teamsRankingT20s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamRankingT20 = TeamsRankingT20::findOrFail($id);


        //unlink(public_path() . $player->photo->file);


        $teamRankingT20->delete();


        Session::flash('deleted_teamRankingT20','The Ranking for T20 has been deleted.');


        return redirect('/admin/teamsRankingT20s');
    }
}
