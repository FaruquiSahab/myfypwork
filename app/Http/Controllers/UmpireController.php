<?php

namespace App\Http\Controllers;

use Validator;
use DataTables;
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
        return view('admin.umpires.index');
    }
    public function umpiredata()
    {
        $umpires = Umpire::all();
        return DataTables::of($umpires)
        ->addColumn('names',function($umpire)
        {
            return '<strong style="font-size:20px">'.$umpire->name. '</strong>';
        })
        ->addColumn('action',function($umpire)
        {
            return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
            data-id="' .$umpire->id. '"
            data-name="' .$umpire->name. '"
            data-nation="' .$umpire->nationality. '">
            <i class="glyphicon glyphicon-edit"></i> Change </a>
            <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$umpire->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
        })

        ->rawColumns(['names','action'])
        ->make(true);
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
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'nationality' => 'required',
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->button_action == 0)
            {
                $umpire = new Umpire([
                    'name' => $request->name,
                    'nationality' => $request->nationality,
                ]);
                $umpire->save();
                $success_output = 'Umpire '.$request->name.' Inserted';
                
            }
            elseif ($request->button_action == 1) 
            {
                $umpire = Umpire::findOrFail($request->id);
                $umpire->name = $request->name;
                $umpire->nationality = $request->nationality;
                $umpire->save();
                $success_output = 'Umpire '.$request->name.' Updated';
            }
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
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
        if($umpire->delete())
        {
            echo 'Umpire '.$umpire->name.' Deleted Successfully';
        }
        else
        {
            echo 'An Error Ocurred Cannot Delete';
        }
    }
}
