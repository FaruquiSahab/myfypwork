<?php

namespace App\Http\Controllers;

use App\Club;
use App\Level;
use Illuminate\Http\Request;
use App\Photo;
use App\Team_Stats;
use App\InningScore;
use DataTables;
use Validator;
use App\Match;
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
        return view('admin.clubs.index',compact('clubs','levels'));
    }
    function clubdata()
    {
        $clubs = Club::where('active_status',0)->get();
        return DataTables::of($clubs)
                        ->addColumn('name',function($club)
                        {
                            return 
                            '<strong>
                                '.$club->name.'<a href="'.route('clubrecord',$club->id).'">
                                <i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i>
                                </a>
                            </strong>';
                        })
                        ->addColumn('level',function($club)
                        {
                            return $club->level->name;
                        })
                        ->addColumn('action', function($club)
                        {
                            return '<a style="margin:2px;" class="btn btn-sm btn-primary idedit" data-toggle="modal" data-target="#addmodel1" data-id="' .$club->id. '" data-name="' .$club->name. '" data-level="' .$club->level_id. '"><i class="glyphicon glyphicon-edit"></i> Change </a>
                                <a class="btn btn-sm btn-danger iddelete" data-toggle="modal" data-target="#deletemodal" data-id="' .$club->id. '"><i class="glyphicon glyphicon-remove "></i> Delete</a>';
                        })
                        ->rawColumns(['action','name'])
                        ->make(true);
    }

    public function record($id)
    {
        $club = Club::where('id',$id)->first()->name;
        $stats = Team_Stats::where('club_id',$id)->first();
        $hs = InningScore::where('club_id',$id)->orderBy('runs','DSC')->limit(1)->first();
        $ls = InningScore::where('club_id',$id)->orderBy('runs','ASC')->limit(1)->first();
        $matches = Match::where('club_id_1',$id)->orWhere('club_id_2',$id)->where('status',2)->orderBy('match_date','DESC')->get();
        // return $matches;
        return view('admin.clubs.recordandstats',compact('id','club','stats','hs','ls','matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::where('active_status',0);

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
        // if($file = $request->file('photo_id'))
        // {
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $photo = Photo::create(['file'=>$name]);
        //     $input['photo_id'] = $photo->id;
        // }
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'level_id'  => 'required',
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
            // Session::flash('error','Error Occured Cannot Insert');
        }
        else
        {
            if($request->button_action == 0)
            {
                $club = new Club([
                    'name'    =>  $request->name,
                    'level_id'     =>  $request->level_id,
                    'active_status'=> '0'
                ]);
                $club->save();
                $stats = new Team_Stats;
                $stats->club_id = $club->id;
                $stats->save();
                $success_output = 'Club '.$request->name.' Inserted';
                
            }
            elseif ($request->button_action == 1) 
            {
                $club = Club::findOrFail($request->id);
                $club->name = $request->name;
                $club->level_id = $request->level_id;
                $club->save();
                $success_output = 'Club '.$request->name.' Updated';
            }
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        // $input['name'] = $request->name;
        // $input['level_id'] = $request->level_id;
        // $created = Club::create($input);


        // return redirect('/admin/clubs');

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
        echo "string";
        // return $request->all();
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'level_id'  => 'required',
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
            $club = findOrFail($request->id);
            $club->name = $request->name;
            $club->level_id = $request->level_id;
            $club->save();
            $success_output = '<div class="alert alert-success">Data Inserted</div>';
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::findOrFail($id);
        $count=0;
        $count = Club::where('id',$id)->update(['active_status'=>'1']);
        if($count > 0)
        {
            echo 'Club '.$club->name.' Deleted Successfully';
        }
        else
        {
            echo 'An Error Occurred Cannot Delete Club';
        }
    }

    public function myFm()
    {
        echo "string";
    }
}
