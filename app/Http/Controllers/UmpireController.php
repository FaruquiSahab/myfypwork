<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Umpire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UmpireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umpires = Umpire::all();
        return view('admin.umpires.index',compact('umpires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $umpires = Umpire::all();

        //$clubs = Club::pluck('name','id')->all();

        return view('admin.umpires.create', compact('umpires'));
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

            $input['nationality'] = $request->nationality;

            //$input['club_id'] = $request->club_id;




        }


        Umpire::create($input);


        Session::flash('created_umpire','The umpire has been created.');
        return redirect('/admin/umpires');

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
        $umpire = Umpire::findOrFail($id);

        //$roles = Role::pluck('name','id')->all();
        //$clubs = Club::pluck('name','id')->all();


        return view('admin.umpires.edit', compact('umpire'));
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
        $umpire = Umpire::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

           // $input['club_id'] = $request->club_id;



        }



        $umpire->update($input);

        Session::flash('updated_umpire','The umpire has been updated.');

        return redirect('/admin/umpires');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $umpire = Umpire::findOrFail($id);


        unlink(public_path() . $umpire->photo->file);


        $umpire->delete();


        Session::flash('deleted_umpire','The umpire has been deleted.');


        return redirect('/admin/umpires');

    }
}
