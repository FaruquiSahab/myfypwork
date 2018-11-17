<?php

namespace App\Http\Controllers;

use App\Club;
use App\Level;
use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Session;

class clubController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::pluck('name','id');
        $clubs = Club::all();
        return view('admin.clubs.index',compact('clubs','levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();

        $levels = Level::pluck('name','id')->all();

        return view('admin.clubs.create', compact('clubs','levels'));
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

        }

            $input['name'] = $request->name;

            $input['level_id'] = $request->level_id;


        Club::create($input);


        Session::flash('created_club','The club has been created.');
        return redirect('/admin/clubs');

        // return $request->name;
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
        $club = Club::findOrFail($id);

        //$roles = Role::pluck('name','id')->all();
        $levels = Level::pluck('name','id')->all();


        return view('admin.clubs.edit', compact('club','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id  = $request->id;
        $club = Club::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

            $input['level_id'] = $request->level_id;



        }



        $club->update($input);

        Session::flash('updated_club','The club has been updated.');

        return redirect('/admin/clubs');
        // 
        // 
        // return $request->name;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $id = $request->id;
        // $club = Club::findOrFail($id);


        // unlink(public_path() . $club->photo->file);


        // $club->delete();


        // Session::flash('deleted_club','The club has been deleted.');


        // return redirect('/admin/clubs');
        return "Hello";
    }
}
