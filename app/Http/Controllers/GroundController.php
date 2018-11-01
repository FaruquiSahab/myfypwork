<?php

namespace App\Http\Controllers;

use App\Ground;
use App\GroundType;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grounds = Ground::all();
        return view('admin.grounds.index',compact('grounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grounds = Ground::all();

        //$types = GroundType::pluck('type','id')->all();

        return view('admin.grounds.create', compact('grounds'));
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


        Ground::create($input);


        Session::flash('created_ground','The ground has been added.');
        return redirect('/admin/grounds');


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
        $ground = Ground::findOrFail($id);

        //$roles = Role::pluck('name','id')->all();
        //$types = GroundType::pluck('name','id')->all();


        return view('admin.grounds.edit', compact('ground'));
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
        $ground = Ground::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

            //$input['type_id'] = $request->type_id;



        }



        $ground->update($input);

        Session::flash('updated_ground','The ground has been updated.');

        return redirect('/admin/grounds');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ground = Ground::findOrFail($id);


        unlink(public_path() . $ground->photo->file);


        $ground->delete();


        Session::flash('deleted_ground','The ground has been deleted.');


        return redirect('/admin/grounds');
    }
}
