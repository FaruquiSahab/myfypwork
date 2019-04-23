@extends('layouts.admin')

@section('content')



    <span id="form_output"></span>
    @if(Session::has('error'))
        <div class="alert alert-danger">
            <p class="bg-danger">{{session('error')}}</p>
        </div>
    @endif

    @if(Session::has('deleted_club'))
        <div class="alert alert-warning">
            <p class="bg-warning">{{session('deleted_club')}}</p>
        </div>
    @endif

    @if(Session::has('created_series'))
        <div class="alert alert-success">
            <p class="bg-success">{{session('created_series')}}</p>
        </div>
    @endif

    @if(Session::has('updated_club'))
        <div class="alert alert-info">
            <p class="bg-info">{{session('updated_club')}}</p>
        </div>
    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Series</a>

    <h1>Series</h1>
    <table id="club_table" class="table table-bordered">
        <thead>
        <tr>
            {{-- <th class="col-sm-2">Photo</th> --}}
            <th class="col-sm-4">Series </th>
            <th class="col-sm-4">Club </th>
            <th class="col-sm-2">Club</th>
            <th class="col-sm-3">Date</th>
            <th class="col-sm-3">Match Type</th>
            <th class="col-sm-3">Days</th>
            <th class="col-sm-3">Ground</th>
        </tr>
        </thead>
    </table>
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
                    <h5>
                        Are you Sure you Want To Delete?
                    </h5>

                </div>
                <div class="modal-footer">
                    <form>
                        <input type="hidden" id="deleteclubid" name="id">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3', 'id'=>'buttonDelete','data-dismiss'=>'modal']) !!}
                        {!! Form::button('Cancel', ['class'=>'btn btn-info col-sm-3', 'data-dismiss'=>'modal']) !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::DeleteModal-->






    {{-- Edit Modal Start --}}
    {{--<div class="modal" tabindex="-1" role="dialog" id="addmodel1">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h3 class="modal-title"><strong>Update Information</strong></h3>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}

                    {{--{{ csrf_field() }}--}}

                    {{--{!! Form::open(['action'=> 'SeriesController@update', 'method'=>'POST', 'files'=>true, 'id'=>'editForm']) !!}--}}

                    {{--<input type="hidden" name="id" id="clubid">--}}
                    {{--<input type="hidden" name="button_action" value="1">--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('', 'Name') !!}--}}
                        {{--{!! Form::text('name', null, ['class'=>'form-control','id'=>'nameEdit'])!!}--}}
                    {{--</div>--}}


                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('level_id', 'Level') !!}--}}
                        {{--{!! Form::select('level_id', [3,5], null, ['class'=>'form-control','id'=>'levelEdit'])!!}--}}
                    {{--</div>--}}


                    {{-- <div class="form-group">--}}
                        {{--{!! Form::label('', 'Photo') !!}--}}
                        {{--{!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_idEdit'])!!}--}}
                    {{--</div> --}}

                    {{--<div class="form-group">--}}
                        {{--{!! Form::submit('Edit Series', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'buttonEdit']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3', 'data-dismiss'=>'modal']) !!}--}}
                    {{--</div>--}}

                    {{--{!! Form::close() !!}--}}

                {{--</div>--}}
                {{--<div class="modal-footer"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{-- Edit Modal Ends --}}





    {{-- Add Modal Starts --}}
    <div class="modal" tabindex="-1" role="dialog" id="addmodel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><strong>Create Series</strong></h3>
                </div>
                <div class="modal-body">

                    {!! Form::open(['method'=>'POST', 'action'=>'SeriesController@store', 'files'=>true, 'id'=>'addForm']) !!}

                    <input type="hidden" name="button_action" value="0">
                    <div class="form-group">
                        {!! Form::label('', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'clubname'])!!}
                    </div>




                    <div class="form-group">

                        <label for="date">Date</label>
                        <input type="text" name="starting_date" class="form-control" id="datepicker" required autocomplete="off">


                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_1', 'Club') !!}
                        {!! Form::select('club_id_1', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>



                    <div class="form-group">
                        {!! Form::label('club_id_2', 'Club') !!}
                        {!! Form::select('club_id_2', $clubs, null, ['placeholder'=>'Select Club','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('series_type_id', 'Type') !!}
                        {!! Form::select('series_type_id', $series_type, null, ['placeholder'=>'Select Type','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>



                    <div class="form-group">
                        {{--{!! Form::label('series_days', 'Days') !!}--}}
                        {{--{!! Form::select('series_days', null, ['placeholder'=>'Select Days','class'=>'form-control', 'id'=>'clublevel'])!!}--}}
                        <label for="">Series Matches</label>
                        <select class="form-control" name="series_days">
                            <option value="">Select Matches</option>
                            <option value="3">Three Matches Series</option>
                            <option value="5">Five Matches Series</option>
                        </select>
                    </div>




                    <div class="form-group">
                        {!! Form::label('ground_id', 'Ground') !!}
                        {!! Form::select('ground_id', $grounds, null, ['placeholder'=>'Select Ground','class'=>'form-control', 'id'=>'clublevel'])!!}
                    </div>


                    {{-- <div class="form-group">
                        {!! Form::label('', 'Logo') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_id'])!!}
                    </div> --}}


                    <div class="form-group">
                        {!! Form::submit('Create Series', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'addSeries','data-dismiss'=>'modal' ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::button('Cancel', ['class'=>'btn btn-danger col-sm-3 mdcl', 'data-dismiss'=>'modal']) !!}
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
   <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
    <script type="text/javascript">

        var today = new Date();
        console.log(today);
        $('#datepicker').datepicker({
            minDate: today,
            maxDate: "+1Y"
        });

        $(document).ready(function()
        {

            // Display a success toast, with a title





            // $('table').dataTable({searching:false, paging:false, info:false})
            $('#club_table').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('seriesdata') }}",
                    "columns":[
                        { "data": "name" },
                        { "data": "action" }
                    ]
                });
            //when click on edit button of table
            $(document).on('click','.idedit',function()
            {
                console.log('clubEdit Enter');
                $('#clubid').val($(this).data('id'));
                $('#nameEdit').val($(this).data('name'));
                $('#levelEdit').val($(this).data('level'));
            });
            //when click on delete button of table
            $(document).on('click','.iddelete',function()
            {
                console.log('clubDelete Enter');
                $('#deleteclubid').val($(this).data('id'));
            });


            $(document).on('submit','form',function(event)
            {
                event.preventDefault();
                var form_data = $(this).serialize();
                console.log(form_data);
                $.ajax({
                    url:"{{ route('series.store') }}",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        console.log(data);
                        var dt = JSON.parse(data,true);
                        console.log(dt);
                        if(dt.error.length)
                        {
                            toastr.warning('Fill In The Required Fields', 'Error Alert');
                            var error_html = '';
                            for(var count = 0; count < dt.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+dt.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);
                            $('#addmodel').modal('hide');
                            $('.moodal #addmodel1').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            setTimeout(function(){
                                $('.alert-danger').remove();
                            }, 6000)

                        }
                        else
                        {
                            // $('#form_output').html(dt.success);
                            toastr.success(dt.success, 'Data Inserted Successfully');
                            $('#addForm')[0].reset();
                            $('#addmodel').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();

                            // $('#action').val('Add');
                            // $('.modal-title').text('Add Data');
                            // $('#button_action').val('insert');
                            $('#club_table').DataTable().ajax.reload();
                        }
                    }
                });
            });

            $(document).on('click','#buttonDelete',function(event)
            {
                event.preventDefault();
                var id = $('#deleteclubid').val();
                $.ajax({
                    url:"/"+id,
                    method:'DELETE',
                    data: {
                        id:id,
                        _token:$('input[name=_token]').val()
                    },
                    success:function(data)
                    {
                        // alert(data);
                        $('#club_table').DataTable().ajax.reload();
                        toastr.success(data, 'Data Deleted');
                    },
                    error:function(data)
                    {
                        toastr.error(data, 'Error Alert');
                    }
                });
            });


        });
    </script>

@stop