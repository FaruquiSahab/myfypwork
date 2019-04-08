<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::where('active_status',0);
        return view('admin.tournaments.index',compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::where('active_status',0);

        return view('admin.tournaments.create', compact('tournaments'));
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

            //$input['type_id'] = $request->type_id;




        }


        Tournament::create($input);


        Session::flash('created_tournament','The tournament has been added.');
        return redirect('/admin/tournaments');

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
        $tournament = Tournament::findOrFail($id);

        //$roles = Role::pluck('name','id')->all();
        //$types = GroundType::pluck('name','id')->all();


        return view('admin.tournaments.edit', compact('tournament'));
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
        $tournament = Tournament::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

            //$input['type_id'] = $request->type_id;



        }



        $tournament->update($input);

        Session::flash('updated_tournament','The tournament has been updated.');

        return redirect('/admin/tournaments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $count =0;
        $count = Tournament::where('id',$id)->update(['active_status'=>1]);
        if ($count > 0 ) {
            Session::flash('deleted_tournament','The tournament has been deleted.');
            return redirect('/admin/tournaments');
        }
    }
}
