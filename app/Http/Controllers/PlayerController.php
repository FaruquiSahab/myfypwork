<?php

namespace App\Http\Controllers;

use App\BattingStyle;
use App\BowlingStyle;
use App\Club;
use App\Photo;
use App\Player;
use App\PlayerRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('admin.players.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();

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
        if($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);



            $input['photo_id'] = $photo->id;

            $input['name'] = $request->name;

            $input['age'] = $request->age;

            $input['date_of_birth'] = $request->date_of_birth;

            $input['club_id'] = $request->club_id;

            $input['role_id'] = $request->role_id;

            $input['batting_style_id'] = $request->batting_style_id;

            $input['bowling_style_id'] = $request->bowling_style_id;



        }


        Player::create($input);


        Session::flash('created_player','The player has been created.');
        return redirect('/admin/players');


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
        $player = Player::findOrFail($id);

        $input = $request->all();


        if($file = $request->file('photo_id')) {


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);



            $input['photo_id'] = $photo->id;

            $input['name'] = $request->name;

            $input['age'] = $request->age;

            $input['date_of_birth'] = $request->date_of_birth;

            $input['club_id'] = $request->club_id;

            $input['role_id'] = $request->role_id;

            $input['batting_style_id'] = $request->batting_style_id;

            $input['bowling_style_id'] = $request->bowling_style_id;

        }




        $player->update($input);

        Session::flash('updated_player','The player has been updated.');

        return redirect('/admin/players');




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


        unlink(public_path() . $player->photo->file);


        $player->delete();


        Session::flash('deleted_player','The player has been deleted.');


        return redirect('/admin/players');
    }
}
