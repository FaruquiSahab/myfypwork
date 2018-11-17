<?php

namespace App\Http\Controllers;

use App\Club;
use App\Coach;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::all();
        $clubs = Club::pluck('name','id')->all();
        return view('admin.coaches.index',compact('coaches','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coaches = Coach::all();

        $clubs = Club::pluck('name','id')->all();

        return view('admin.coaches.create', compact('clubs','coaches'));
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

            $input['club_id'] = $request->club_id;




        }


        Coach::create($input);


        Session::flash('created_coach','The coach has been created.');
        return redirect('/admin/coaches');


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
        $coach = Coach::findOrFail($id);

        //$roles = Role::pluck('name','id')->all();
        $clubs = Club::pluck('name','id')->all();


        return view('admin.coaches.edit', compact('coach','clubs'));
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
        $coach = Coach::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

            $input['club_id'] = $request->club_id;



        }



        $coach->update($input);

        Session::flash('updated_coach','The coach has been updated.');

        return redirect('/admin/coaches');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);


        unlink(public_path() . $coach->photo->file);


        $coach->delete();


        Session::flash('deleted_coach','The coach has been deleted.');


        return redirect('/admin/coaches');

    }
}
