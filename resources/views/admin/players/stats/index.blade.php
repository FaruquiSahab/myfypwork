@extends('layouts.admin')





@section('content')


    
    <u><h2>Stats Of Players</h2></u>

    <fieldset>
        <legend>One Day Stats</legend>
        <table class="table table-sm table-hover table-striped col-sm-12" id="mytable">
            <thead>
                <tr>
                    {{-- <th>Format</th> --}}
                    <th>Name</th>
                    <th>Matches</th>
                    <th>Innings</th>
                    <th>Notouts</th>
                    <th>Runs</th>
                    <th>HS</th>
                    <th>Avg</th>
                    {{-- <th>S/R</th> --}}
                    <th>100s</th>
                    <th>50s</th>
                    <th>Ct</th>
                    <th>St</th>
                    <th>4s</th>
                    <th>6s</th>
                    <th>Innings Ball</th>
                    <th>Overs</th>
                    <th>Runs</th>
                    <th>Wickets</th>
                    <th>Avg</th>
                    <th>B/F</th>
                    <th>Eco</th>
                    <th>5Ws</th>
                </tr>
            </thead>
        </table>
    </fieldset>

    <fieldset>
        <legend>T20 Stats</legend>
        <table class="table table-sm table-hover table-striped col-sm-12" id="mytable1">
            <thead>
                <tr>
                    {{-- <th>Format</th> --}}
                    <th>Name</th>
                    <th>Matches</th>
                    <th>Innings</th>
                    <th>Notouts</th>
                    <th>Runs</th>
                    <th>HS</th>
                    <th>Avg</th>
                    {{-- <th>S/R</th> --}}
                    <th>100s</th>
                    <th>50s</th>
                    <th>Ct</th>
                    <th>St</th>
                    <th>4s</th>
                    <th>6s</th>
                    <th>Innings Ball</th>
                    <th>Overs</th>
                    <th>Runs</th>
                    <th>Wickets</th>
                    <th>Avg</th>
                    <th>B/F</th>
                    <th>Eco</th>
                    <th>5Ws</th>
                </tr>
            </thead>
        </table>
    </fieldset>
    
    <!--begin::DeleteModal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Warning
                </h3>
            </div>
            <div class="modal-body">
                <h4>
                    Are you Sure you Want To Delete?
                </h4>
            </div>
            <div class="modal-footer">
                {!! Form::open() !!}
                <input type="hidden" id="deleteid" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                
                <button type="submit" id="buttonDelete"  class="btn btn-danger delete" data-dismiss="modal">
                    Delete
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--end::DeleteModal-->


{{-- Edit Modal Start --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Update Information</strong></h3>
  </div>
  <div class="modal-body">


       {!! Form::open() !!}


            <input type="hidden" name="id" id="editid">
            <input type="hidden" name="button_action" value="1">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control','id'=>'editname'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('nationality', 'Nationality') !!}
                {!! Form::text('nationality', null, ['class'=>'form-control','id'=>'editnation'])!!}
            </div>


            <div class="form-group">
                {!! Form::submit('Edit Umpire', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
        </div>

            {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- Edit Modal Ends --}}



{{-- Add Modal Starts --}}
<div class="modal" tabindex="-1" role="dialog" id="addmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Add New Umpire</strong></h3>
  </div>
  <div class="modal-body">

    {!! Form::open() !!}
        
        <input type="hidden" name="button_action" value="0">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('nationality', 'Nationality') !!}
            {!! Form::text('nationality', null, ['class'=>'form-control'])!!}
        </div>

        {{-- <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div> --}}

        <div class="form-group">
            {!! Form::submit('Add Umpire', ['class'=>'btn btn-primary col-sm-3']) !!}
        </div>

        <div class="form-group">
            {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}
        </div>

    {!! Form::close() !!}

</div>
<div class="modal-footer"></div>
</div>
</div>
</div>
{{-- End Add Modal --}}

@stop

@section('scripts')

    <script type="text/javascript">

        //load  table ajax
        $('#mytable').DataTable(
        {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('statsdata2') }}",
                "columns":[
                    // { "data": "format" },
                    { "data": "names" },
                    { "data": "matches" },
                    { "data": "innings"},
                    { "data": "notouts"},
                    { "data": "runs"},
                    { "data": "highscore"},
                    { "data": "average_bat"},
                    // { "data": "strikerate"},
                    { "data": "centuries"},
                    { "data": "halfcenturies"},
                    { "data": "catches"},
                    { "data": "stumping"},
                    { "data": "fours"},
                    { "data": "sixes"},
                    { "data": "innings_bowl"},
                    { "data": "overs"},
                    { "data": "runs_ball"},
                    { "data": "wickets"},
                    { "data": "average_ball"},
                    { "data": "best_ball"},
                    { "data": "economy"},
                    { "data": "five_wickets"},
                ]
        });

        //load  table ajax
        $('#mytable1').DataTable(
        {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('statsdata1') }}",
                "columns":[
                    // { "data": "format" },
                    { "data": "names" },
                    { "data": "matches" },
                    { "data": "innings"},
                    { "data": "notouts"},
                    { "data": "runs"},
                    { "data": "highscore"},
                    { "data": "average_bat"},
                    // { "data": "strikerate"},
                    { "data": "centuries"},
                    { "data": "halfcenturies"},
                    { "data": "catches"},
                    { "data": "stumping"},
                    { "data": "fours"},
                    { "data": "sixes"},
                    { "data": "innings_bowl"},
                    { "data": "overs"},
                    { "data": "runs_ball"},
                    { "data": "wickets"},
                    { "data": "average_ball"},
                    { "data": "best_ball"},
                    { "data": "economy"},
                    { "data": "five_wickets"},
                ]
        });
    </script>
@stop