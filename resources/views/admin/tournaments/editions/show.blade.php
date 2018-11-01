@extends('layouts.admin')




@section('content')




    <h2>Create Tournament Edition</h2>


    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'POST', 'action'=> 'TournamentReferenceController@store','files'=>true]) !!}

{{--

                @for($i=0; $i< sizeof($clubs); $i++)
                
                <div class="form-group">
                    {!! Form::label('club_id', 'Clubs') !!}
                    {!! Form::checkbox('chcek', null, false) !!}
                    {!! Form::text('club_id', $clubs[$i]->name, ['class'=>'form-control', 'name'=>'club_id','id'=>'clubSelect', 'required' ])!!}
                    {!! Form::hidden('club_id', $clubs[$i]->name, ['class'=>'form-control', 'name'=>'club_id','id'=>'clubSelect', 'required' ])!!}
                </div>

                @endfor
--}}
                <div class="container">



                    <div class="form-group">


                        <input id="totalClubs" type="hidden" value="{{$data->number_of_teams}}">
                         <label for="clubs">Select Clubs</label>
                         <select id="club_id"  class="form-control">
                             @foreach($clubs as $key => $club)
                                 <option value="{{ $key }}" >{{ $club }}</option>
                             @endforeach
                         </select>

                            {{--{!! Form::label('club_id', 'Club') !!}
                            {!! Form::select('club_id', [''=>'Choose Club'] + $clubs, null,['multiple'=>'true], ['class'=>'form-control'])!!}
--}}

                    </div>

                </div>




                <div class="form-group">
                    {!! Form::submit('Add Tournament', ['class'=>'btn btn-primary col-sm-3']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>




    <script type="text/javascript">
        var totalAllowedClubs = $('#totalClubs').val();
        console.log(a);
        $("#club_id").select2({
            placeholder: "Select Clubs",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : totalAllowedClubs,

        });
    </script>


    @include('includes.form_error')

@stop