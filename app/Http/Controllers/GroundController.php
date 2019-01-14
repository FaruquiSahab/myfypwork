<?php

namespace App\Http\Controllers;

use Validator;
use Datatables;
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
        return view('admin.grounds.index');
    }
    public function grounddata()
    {
        $grounds = Ground::all();
        return Datatables::of($grounds)
        ->addColumn('names',function($ground)
        {
            return '<strong style="font-size:20px">'.$ground->name. '</strong>';
        })
        ->addColumn('action',function($ground)
        {
            return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1"
            data-id="' .$ground->id. '"
            data-name="' .$ground->name. '">
            <i class="glyphicon glyphicon-edit"></i> Change </a>
            <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$ground->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
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
        $validation = Validator::make($request->all(), [
            'name' => 'required',
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
                $ground = new Ground([
                    'name' => $request->name,
                ]);
                $ground->save();
                $success_output = 'Ground '.$request->name.' Inserted';
                
            }
            elseif ($request->button_action == 1) 
            {
                $ground = Ground::findOrFail($request->id);
                $ground->name = $request->name;
                $ground->save();
                $success_output = 'Ground '.$request->name.' Updated';
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
        if($ground->delete())
        {
            echo 'Ground '.$ground->name.' Deleted Successfully';
        }
        else
        {
            echo 'An Error Ocurred Cannot Delete';
        }
    }
}
