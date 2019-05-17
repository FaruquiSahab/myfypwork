<?php

namespace App\Http\Controllers;

use App\Club;
use App\Ground;
use App\MatchType;
use App\Photo;
use DB;
use App\Tournament;
use App\TournamentFormat;
use App\TournamentsReference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class TournamentReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = TournamentsReference::where('active_status',0)->get();
        $tournamentss = Tournament::where('active_status',0)->pluck('name','id');

        // wo tornment id jo ban chkii hain
        $tour_id = TournamentsReference::where('edition','=',Carbon::now()->format('Y'))->get();
        /*


        
        foreach ($tour_id as $tour)
        {
           $ids =  $tour->tournament_id . '<br>';

        //           echo $ids;

           $names[] = Tournament::where('id', '!=',$ids)->get();
        }
        foreach ($names as $key=> $name)
        {
            echo $name;
        //            if($key!=0)
            foreach ($name as $k=>$val)
            if($k!=0 && $key ==0) {
                $tr = DB::table('tournaments')->select('id','name')->where('id',$val->id)->distinct('id')->get();
        //                $tr = Tournament::where('id',$val->id)->distinct()->get();
                echo $k;
                echo $tr;
        //                echo $k . $val . '<br>';
            }
        }

        return "";*/





          // return $tour_id[0]->tournament_id;
                 //$tour_id[0]->tournament_id;
        //return $tour_id;

        //         foreach ($tour_id as $tour)
        //         {
        //            $ids =  $tour->tournament_id;
        ////            echo $ids.'<br>';
        //
        //             $tournamentss[] = Tournament::select('id','name')->where('id','!=',$ids)->get();
        //         }
        /*        $tournamentss[] = Tournament::select('id','name')->where('id','!=',1)->get();
                $tournamentss[] = Tournament::select('id','name')->where('id','!=',4)->get();*/


        //         return " Ok";
        //            foreach ($tournamentss as $tt)
        //            {
        //                echo $tt->['name'];
        //            }
        //            return"";

        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::pluck('format_name','id');
        $t_grounds = Ground::where('active_status',0)->pluck('name','id');

        return view('admin.tournaments.editions.index',compact('tournaments','tournamentss','m_type','t_format','t_grounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::where('active_status',0)->pluck('name','id');

        $m_type = MatchType::pluck('type_name','id');
        $t_format = TournamentFormat::where('active_status',0)->pluck('format_name','id');
        $t_grounds = Ground::where('active_status',0)->pluck('name','id');

        return view('admin.tournaments.editions.create',compact('tournaments','m_type','t_format','t_grounds'));
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
        $input['starting_date'] = $request->starting_date;
        //$input['ending_date'] = $request->ending_date;
        $input['rounds'] = $request->rounds;
        $input['ground_id'] = $request->ground_id;
        $input['time'] = $request->time;




        $data = TournamentsReference::where('id')->get();


        /*if ($input['number_of_teams'] >= 4 || $input['number_of_teams'] == 5)
        {
            $input['rounds'] = 3;
        }

        if ($input['number_of_teams'] >= 6 || $input['number_of_teams'] == 7)
        {
            $input['rounds'] = 5;
        }

        if ($input['number_of_teams'] >= 8 || $input['number_of_teams'] == 9)
        {
            $input['rounds'] = 7;
        }

        if ($input['number_of_teams'] >= 10 || $input['number_of_teams'] == 11)
        {
            $input['rounds'] = 9;
        }*/



        $data = TournamentsReference::create($input);


        Session::flash('created_edition','The Request For The Edition Created.');
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

//    public function edition()
//    {
//
//        return json_encode($tour_id);
//    }

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
        $did = decrypt($id);
        $tournament = TournamentsReference::find($did);
        $count = 0;
        $count = TournamentsReference::where('id',$did)->update(['active_status'=>1]);
        if ($count > 0)
        {
            return redirect()->back();
        }
    }

}
