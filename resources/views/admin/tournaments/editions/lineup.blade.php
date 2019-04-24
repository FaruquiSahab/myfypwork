@extends('layouts.admin')




@section('content')

        <h2>Lineup</h2>

    

    <div class="row">

        <div class="col-sm-8">

            <div class="panel-body">
                {{-- ,'action'=>'FixtureController@store' --}}
                {!! Form::open(['method'=>'post']) !!}

                <input type="hidden" name="club1" value="{{$club1[0]->club_id_1}}">
                <input type="hidden" name="club2" value="{{$club2[0]->club_id_2}}">
                <input type="hidden" name="ground_id" value="{{$club2[0]->ground_id}}">
                <input type="hidden" name="club2" value="{{$club2[0]->club_id_2}}">
                <input type="hidden" name="tournament_id" value="{{$club2[0]->tournament_id}}">
                <input type="hidden" name="date" value="{{$club2[0]->match_date}}">
                <input type="hidden" name="match_type_id" value="{{$type}}">
                <input type="hidden" name="fixture_id" value="{{ $club1[0]->id }}">



                <div class="container">

                    <div class="form-group">
                    <label for="Toss">Toss</label>

                    <select class="form-control" name="toss" required>
                        <option disabled selected value>Select Team</option>
                        <option value="{{$club1[0]->club_id_1}}">{{$club1[0]->club1->name}}</option>
                        <option value="{{$club2[0]->club_id_2}}">{{$club2[0]->club2->name}}</option>
                    </select>
                    </div>


                    <div class="form-group">
                        <label for="Toss">Choose To</label>

                        <select class="form-control" name="choose_to" required>
                            <option disabled selected value>Select Decision</option>
                            <option value="1">Bat</option>
                            <option value="2">Field</option>
                        </select>
                    </div>

                    @if(Session::has('players_length1'))
                        <div class="alert alert-danger">
                            <p class="bg-danger">{{session('players_length1')}}</p>
                        </div>
                    @elseif(Session::has('players_length3'))
                        <div class="alert alert-danger">
                            <p class="bg-danger">{{session('players_length3')}}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="players">Lineup for {{$club1[0]->club1->name}}</label>
                        <select id="player_id1" name="player_id1[]"  class="form-control players">
                            @foreach($players1 as $key => $player1)
                                <option value="{{ $player1->id }}" >{{ $player1->name }} ({{ $player1->role->name }})</option>
                            @endforeach
                        </select>
                        </div>
                    <br>

                    @if(Session::has('players_length2'))
                        <div class="alert alert-danger">
                            <p class="bg-danger">{{session('players_length2')}}</p>
                        </div>
                    @elseif(Session::has('players_length3'))
                        <div class="alert alert-danger">
                            <p class="bg-danger">{{session('players_length3')}}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="players">Lineup for {{$club2[0]->club2->name}}</label>
                        <select id="player_id2" name="player_id2[]"  class="form-control">
                            @foreach($players2 as $key => $player2)
                                <option value="{{ $player2->id }}" >{{ $player2->name }} ({{ $player2->role->name }})</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="Umpires">Umpires</label>

                        <select class="form-control" name="umpire_id" required>
                            <option disabled selected value>Select Umpire For Match</option>
                            @foreach($umpires as $umpire )
                            <option value="{{$umpire->id}}">{{$umpire->name}}</option>
                                @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                    {!! Form::submit('Create Lineup', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>


            </div>

            {!! Form::close() !!}

        </div>
    </div>
    </div>



        @include('includes.form_error')

@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        
        $("document").ready(function()
        {
            setTimeout(function()
            {
               $("div.alert").remove();
            }, 7000 ); // 5 secs

        });

        $("#player_id1").select2({
            placeholder: "Select Players",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : 11,
        });


        $("#player_id2").select2({
            placeholder: "Select Players",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : 11,
        });

        $('form').on('submit', function(event)
        {
            event.preventDefault();
            var minimum = 11;
            var formdata = $('form').serialize();
            $.ajax({
                url:'{{ route('editions.lineup.store') }}',
                method:'POST',
                data:formdata,
                success:function(data)
                {
                    console.log('success');
                    if (data == 'both'){ toastr.error('Team Length Less Than Required','Formation Error'); }
                    else if (data == 'one'){ toastr.error('Team One: Length Less Than Required','Formation Error'); }
                    else if (data == 'two'){ toastr.error('Team Two: Length Less Than Required','Formation Error'); }
                    else if (data == 'wk1'){ toastr.error('Team One: At Least One Wikcet Keeper Is Required','Formation Error'); }
                    else if (data == 'b1'){ toastr.error('Team One: At Least 5 Bowlers Or Allrounders (combined) required','Formation Error'); }
                    else if (data == 'wk2'){ toastr.error('Team Two: At Least One Wikcet Keeper Is Required','Formation Error'); }
                    else if (data == 'b2'){ toastr.error('Team One: At Least 5 Bowlers Or Allrounders (combined) required','Formation Error'); }
                    else{
                        window.location.href = "/scoring/match/"+data;
                    }
                    
                },
                error:function(){
                    console.log('error');
                }
            });
            
            
       });
       

    </script>


@stop