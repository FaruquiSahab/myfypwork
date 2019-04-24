@extends('layouts.admin')

    @section('content')



    <span id="form_output"></span>

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Friendly Match</a>

    <h1>Upcoming Fixtures</h1>
            <table id="mytable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Club</th>
                        <th>Club</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Ground</th>
                        <th>Tournament</th>
                        <th>Action</th>
                        <th>Scoring</th>
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
                            <input type="hidden" id="deleteid" name="id">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3', 'id'=>'buttonDelete','data-dismiss'=>'modal']) !!}
                            {!! Form::button('Cancel', ['class'=>'btn btn-info col-sm-3', 'data-dismiss'=>'modal']) !!}
                        </form>
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
            
            {{ csrf_field() }}

            {!! Form::open() !!}

            <input type="hidden" name="id" id="fixtureid">
            <input type="hidden" name="button_action" value="1">
            <div class="form-group">
                {!! Form::label('club_id_1', 'Level') !!}
                {!! Form::select('club_id_1',  $clubs, null, ['class'=>'form-control','id'=>'club1Edit'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('club_id_2', 'Level') !!}
                {!! Form::select('club_id_2',  $clubs, null, ['class'=>'form-control','id'=>'club2Edit'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('match_date','Date') !!}
                {!! Form::date('match_date', null, ['class'=>'form-control','id'=>'dateEdit','min'=>'\Carbon\Carbon::now()']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('match_time','Time') !!}
                {!! Form::time('match_time', null,['class'=>'form-control','id'=>'timeEdit','min'=>'\Carbon\Carbon::now()']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ground_id','Ground') !!}
                {!! Form::select('ground_id',$grounds,null,['class'=>'form-control','id'=>'groundEdit']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Modify Fixture', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'buttonEdit']) !!}
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
            <h3 class="modal-title"><strong>Create Fixture</strong></h3>
      </div>
      <div class="modal-body">

        {{ csrf_field() }}

            {!! Form::open() !!}

            <input type="hidden" name="button_action" value="1">
            <div class="form-group">
                {!! Form::label('club_id_1', 'Level') !!}
                {!! Form::select('club_id_1',  $clubs, null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('club_id_2', 'Level') !!}
                {!! Form::select('club_id_2',  $clubs, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('match_date','Date') !!}
                {!! Form::date('match_date', null,['class'=>'form-control','min'=>\Carbon\Carbon::now()->format('m-d-Y')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('match_time','Time') !!}
                {!! Form::time('match_time', null,['class'=>'form-control','min'=>'\Carbon\Carbon::now()']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ground_id','Ground') !!}
                {!! Form::select('ground_id',$grounds,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Fixture', ['class'=>'btn btn-primary col-sm-3 submit']) !!}
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

        

        
        $(document).ready(function()
        {            




                    // $('table').dataTable({searching:false, paging:false, info:false})
            $('#mytable').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('fixturedata') }}",
                "columns":[
                    { "data": "club1" },
                    { "data": "club2" },
                    { "data": "match_date" },
                    { "data": "match_time" },
                    { "data": "ground" },
                    { "data": "tournament" },
                    { "data": "action" },
                    { "data": "scoring" }
                ]
            });
           //when click on edit button of table
        $(document).on('click','.idedit',function()
        {
            console.log('clubEdit Enter');
            $('#fixtureid').val($(this).data('id'));
            $('#club1Edit').val($(this).data('club1'));
            $('#club2Edit').val($(this).data('club2'));
            $('#groundEdit').val($(this).data('ground'));
            $('#dateEdit').val($(this).data('match_date'));
            $('#timeEdit').val($(this).data('match_time'));
        });
        //     //when click on delete button of table
        $(document).on('click','.iddelete',function()
        {
            console.log('clubDelete Enter');
            $('#deleteid').val($(this).data('id'));
        });


        $(document).on('submit','form',function(event)
        {
            event.preventDefault();
            var form_data = $(this).serialize();
            console.log(form_data);
            $.ajax({
                url:"{{ route('fixtures.store') }}",
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
                        $('.modal #addmodel1').modal('hide');
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
                        $('form')[0].reset();
                        $('#addmodel').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        
                        // $('#action').val('Add');
                        // $('.modal-title').text('Add Data');
                        // $('#button_action').val('insert');
                        $('#mytable').DataTable().ajax.reload();
                    }
                },
                error:function()
                {
                    toastr.error('Server Responded With an Error', 'Error Alert');
                }
            });
        });

        $(document).on('click','#buttonDelete',function(event)
        {
            event.preventDefault();
            var id = $('#deleteid').val();
            $.ajax({
                url:"/fixture/delete/"+id,
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

        // 
        












       });

    </script>
@stop