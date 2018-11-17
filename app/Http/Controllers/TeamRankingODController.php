<?php

namespace App\Http\Controllers;

use App\Club;
use App\TeamsRankingOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamRankingODController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamRankingODs = TeamsRankingOD::all();
        $clubs = Club::pluck('name','id')->all();
        return view('admin.teamRankingOds.index',compact('teamRankingODs','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamRankingODs = TeamsRankingOD::all();

        /*$roles = PlayerRole::pluck('name','id')->all();
*/

        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


/*        $players = Player::pluck('name','id')->all();*/


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.teamRankingOds.create', compact('clubs','teamRankingODs'));
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

        /*$input['role_id'] = $request->role_id;*/

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;






        TeamsRankingOD::create($input);


        Session::flash('created_teamRankingOD','The Ranking for OD has been created.');
        return redirect('/admin/teamsRankingODs');
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
        $teamRankingODs = TeamsRankingOD::findOrFail($id);

       /* $roles = PlayerRole::pluck('name','id')->all();*/


        //$batting_styles = BattingStyle::pluck('name','id')->all();

        $clubs = Club::pluck('name','id')->all();


/*        $players = Player::pluck('name','id')->all();*/


        //$bowling_styles = BowlingStyle::pluck('name','id')->all();

        return view('admin.teamRankingOds.edit', compact('clubs','teamRankingODs'));
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
        $teamRankingOD = TeamsRankingOD::findOrFail($id);

        $input = $request->all();



        $input['photo_id'] = $request->photo_id;

        $input['points'] = $request->points;

        //$input['age'] = $request->age;

        //$input['date_of_birth'] = $request->date_of_birth;

        $input['club_id'] = $request->club_id;

       /* $input['role_id'] = $request->role_id;*/

        //$input['batting_style_id'] = $request->batting_style_id;

        //$input['bowling_style_id'] = $request->bowling_style_id;

        $teamRankingOD->update($input);

        Session::flash('updated_teamRankingOD','The Ranking for OD has been updated.');

        return redirect('/admin/teamsRankingODs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamRankingOD = TeamsRankingOD::findOrFail($id);


        //unlink(public_path() . $player->photo->file);


        $teamRankingOD->delete();


        Session::flash('deleted_teamRankingOD','The Ranking for OD has been deleted.');


        return redirect('/admin/teamsRankingODs');
    }
}
