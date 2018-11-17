<?php

namespace App\Http\Controllers;

use App\Club;
use App\MatchType;
use App\Photo;
use App\Tournament;
use App\TournamentFormat;
use App\TournamentsReference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TournamentReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = TournamentsReference::all();
        $tournamentss = Tournament::pluck('name','id');
        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::pluck('format_name','id');

        return view('admin.tournaments.editions.index',compact('tournaments','tournamentss','m_type','t_format'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::pluck('name','id');
        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::pluck('format_name','id');


        return view('admin.tournaments.editions.create',compact('tournaments','m_type','t_format'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }




        $input['tournament_id'] = $request->tournament_id;
        $input['tournament_format_id'] = $request->tournament_format_id;
        $input['tournament_type_id'] = $request->tournament_type_id;
        $input['number_of_teams'] = $request->number_of_teams;
        $edition = Carbon::now()->format('Y');
        $input['edition']= $edition;

        $data = TournamentsReference::create($input);


        Session::flash('created_edition','The Request For The Edition Created');
        return redirect(route('edition.index'));
        // return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$clubs = Club::all();*/
        $editions = TournamentsReference::findOrFail($id)->get();
        // return $editions;
        $clubs = Club::pluck('name','id','')->all();


        $data = TournamentsReference::findOrFail($id);


        return view('admin.tournaments.editions.show',compact('editions','clubs','data'));
    }

    public function clubByClub(Request $request)
    {
        $clubsR = Club::where('id','!=',$request->id)->pluck('name','id');

        echo json_encode($clubsR);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
