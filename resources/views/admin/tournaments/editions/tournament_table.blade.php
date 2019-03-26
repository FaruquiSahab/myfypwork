@extends('layouts.admin')




@section('content')


    @foreach($val as $values)
        @foreach($values as $item)

            @endforeach
        @endforeach

    <h3>{{$val[0]->t_name}} {{$data[0]->tournament_type->type_name}} {{$data[0]->edition}}</h3>
    <h4>{{$data[0]->tournament_format->format_name}}</h4>


    <br>

    <h3>Tournament Table</h3>
    <div class="form-group" align="center">

    <table class="table table-bordered" align="center">
        <thead>
        <tr>
            <th scope="col">Clubs</th>
            <th scope="col">Total Matches</th>
            <th scope="col">Win Matches</th>
            <th scope="col">Loss Matches</th>
            <th scope="col">Tie Matches</th>
            <th scope="col">Points</th>
            <th scope="col">Run Rates</th>
        </tr>
        </thead>
        <tbody>



        @foreach($val as $values)
        {{--@foreach($values as $item)--}}

            <tr>
                <td>{{$values->c_name}}</td>
                <td>{{$values->total_matches}}</td>
                <td>{{$values->win_matches}}</td>
                <td>{{$values->loss_matches}}</td>
                <td>{{$values->tie_matches}}</td>
                <td>{{$values->points_matches}}</td>
                <td>{{$values->rr_matches}}</td>
            </tr>

            {{--@endforeach--}}
                @endforeach

        </tbody>
    </table>

        <p align="right">*win points=2</p>

        <br>



        @if($data[0]->tournament_format->format_name == 'Round Robin')


        <h3 align="left">Schedule</h3>
        <br>

        <table class="table table-bordered" align="center">
            <thead class="thead-dark">
            <tr>

                <th scope="col">Club </th>
                <th scope="col">VS</th>
                <th scope="col">Club </th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Venue</th>
                <th scope="col">Line Up</th>
                <th scope="col">Result</th>
            </tr>
            </thead>
            <tbody>

            @foreach($fixtures as $fix)
            <tr>
                <td>{{$fix->club1->name}}</td>
                <td>VS</td>
                <td>{{$fix->club2->name}}</td>
                <td>{{$fix->match_date}}</td>
                <td>{{$fix->match_time}}</td>
                <td>{{$fix->ground->name}}</td>
                <td>
                    {{--  "2019-02-11"  --}}
                    @if(\Carbon\Carbon::parse($fix->match_date)->lte(\Carbon\Carbon::today()))
                        @if($fix->status == '0')
                            <form action="{{route('editions.lineup',encrypt($fix->id))}}">
                                <input type="hidden">
                                <input type="submit" class="btn-xs btn-success" value="Make Lineup">
                            </form>
                        @else
                            <form action="{{ route('check.match',$fix->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="submit" class="btn-xs btn-warning" value="Score Match">
                            </form>
                        @endif
                    @else
                        <label class="label label-info">No Actions Yet</label>
                    @endif

                </td>
                <td>-</td>

                {{--<td>{{$round->rounds}}</td>--}}
                {{--<td>{{$item->c_name}}</td>--}}
            </tr>
            @endforeach
            </tbody>
        </table>

@endif

</div>

    @if($data[0]->tournament_format->format_name == 'Knockout')

        <h3 align="left">Schedule</h3>
        <br>

        <style>
            main{
                display:flex;
                flex-direction:row;
                /*align-content: center;*/
            }
            .round{
                display:flex;
                flex-direction:column;
                justify-content:center;
                width:200px;
                list-style:none;
                padding:0;
            }
            .round .spacer{ flex-grow:1; }
            .round .spacer:first-child,
            .round .spacer:last-child{ flex-grow:.5; }

            .round .game-spacer{
                flex-grow:1;
            }

            /*
             *  General Styles
            */
            body{
                font-family:sans-serif;
                font-size:small;
                padding:10px;
                line-height:1.4em;
            }

            li.game{
                padding-left:20px;
            }

            li.game.winner{
                font-weight:bold;
            }
            li.game span{
                float:right;
                margin-right:5px;
            }

            li.game-top{ border-bottom:1px solid #aaa; }

            li.game-spacer{
                border-right:1px solid #aaa;
                min-height:40px;
            }

            li.game-bottom{
                border-top:1px solid #aaa;
            }



        </style>



        <main id="tournament" align="center">
            <ul class="round round-1">

                @foreach($fixtures as $fix)

                <li class="spacer">&nbsp;</li>

                <li class="game game-top winner">{{$fix->club1->name}} <span>79</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom ">{{$fix->club2->name}} <span>48</span></li>

                <li class="spacer">&nbsp;</li>

                @endforeach
                {{--<li class="game game-top winner">Colo St <span>84</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">Missouri <span>72</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top ">Oklahoma St <span>55</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom winner">Oregon <span>68</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top winner">Saint Louis <span>64</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">New Mexico St <span>44</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top winner">Memphis <span>54</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">St Mary's <span>52</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top winner">Mich St <span>65</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">Valparaiso <span>54</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top winner">Creighton <span>67</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">Cincinnati <span>63</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}

                {{--<li class="game game-top winner">Duke <span>73</span></li>--}}
                {{--<li class="game game-spacer">&nbsp;</li>--}}
                {{--<li class="game game-bottom ">Albany <span>61</span></li>--}}

                {{--<li class="spacer">&nbsp;</li>--}}
            </ul>
           {{-- <ul class="round round-2">
                <li class="spacer">&nbsp;</li>

                <li class="game game-top winner">Lousville <span>82</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom ">Colo St <span>56</span></li>

                <li class="spacer">&nbsp;</li>

                <li class="game game-top winner">Oregon <span>74</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom ">Saint Louis <span>57</span></li>

                <li class="spacer">&nbsp;</li>

                <li class="game game-top ">Memphis <span>48</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom winner">Mich St <span>70</span></li>

                <li class="spacer">&nbsp;</li>

                <li class="game game-top ">Creighton <span>50</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom winner">Duke <span>66</span></li>

                <li class="spacer">&nbsp;</li>
            </ul>
            <ul class="round round-3">
                <li class="spacer">&nbsp;</li>

                <li class="game game-top winner">Lousville <span>77</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom ">Oregon <span>69</span></li>

                <li class="spacer">&nbsp;</li>

                <li class="game game-top ">Mich St <span>61</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom winner">Duke <span>71</span></li>

                <li class="spacer">&nbsp;</li>
            </ul>
            <ul class="round round-4">
                <li class="spacer">&nbsp;</li>

                <li class="game game-top winner">Lousville <span>85</span></li>
                <li class="game game-spacer">&nbsp;</li>
                <li class="game game-bottom ">Duke <span>63</span></li>

                <li class="spacer">&nbsp;</li>
            </ul>--}}
        </main>



    @endif


    @include('includes.form_error')

@stop