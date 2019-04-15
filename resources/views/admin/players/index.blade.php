@extends('layouts.admin')





@section('content')

    <span id="form_output"></span>
    @if(Session::has('deleted_player'))
        <div class="alert alert-danger">
        <p class="bg-danger">{{session('deleted_player')}}</p>
    </div>

    @endif


    @if(Session::has('created_player'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_player')}}</p>
        </div>

    @endif



    @if(Session::has('updated_player'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_player')}}</p>
        </div>

    @endif
    
    <a style="float: right;"  data-target="#batchinsert" data-toggle="modal" class="btn btn-warning" >Insert Batch Players</a>
    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Player</a>

    <h2>Players</h2>


    <table class="table table-sm table-hover  table-striped" id="mytable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Club</th>
            <th>Role</th>
            <th>Batting Style</th>
            <th>Bowling Style</th>
            <th>Action</th>
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

    <!--begin::BatchInsert-->
        <div class="modal fade" id="batchinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">
                            Insert Excel File
                        </h3>
                    </div>
                    
                    <div class="modal-footer">
                        {!! Form::open(['id'=>'batchform','files'=>true]) !!}
                        <div class="form-group">
                            <label style="float: left;"for="select_file">Club</label>
                            {!! Form::select('club_id',[''=>'Choose Club'] + $clubs, null, ['class'=>'form-control','id'=>'editclub','required'])!!}
                        </div>
                        <div class="form-group">
                            <label style="float: left;"for="select_file">Players File</label>
                            <input class="form-control" type="file" name="select_file" accept=".xls,.xlsx" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>
                        
                        <button type="submit" id="batchformbtn" class="btn btn-success">
                            Submit
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    <!--end::BatchInsert-->


    {{-- Edit Modal Start --}}
        <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title"><strong>Update Information</strong></h3>
          </div>
          <div class="modal-body">


               {!! Form::open(['class'=>'form']) !!}

                    <input type="hidden" name="id" id="editid">
                    <input type="hidden" name="button_action" value="1">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control','id'=>'editname'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('date_of_birth', 'Date of Birth') !!}
                        {!! Form::date('date_of_birth', null, ['class'=>'form-control','id'=>'editdob'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('club_id', 'Club') !!}
                        {!! Form::select('club_id', $clubs, null, ['class'=>'form-control','id'=>'editclub'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('role_id', 'Role') !!}
                        {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control','id'=>'editrole'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('batting_style_id', 'Batting Style') !!}
                        {!! Form::select('batting_style_id', [''=>'Choose Style'] + $batting_styles, null, ['class'=>'form-control','id'=>'editbat'])!!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('bowling_style_id', 'Bowling Style') !!}
                        {!! Form::select('bowling_style_id', [''=>'Choose Style'] + $bowling_styles, null, ['class'=>'form-control','id'=>'editball'])!!}
                    </div>

                    {{-- <div class="form-group">
                        {!! Form::label('photo_id', 'Image') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                    </div> --}}

                    <div class="form-group">
                        {!! Form::submit('Edit Player', ['class'=>'btn btn-primary col-sm-3']) !!}
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
                <h3 class="modal-title"><strong>Add Players To Club</strong></h3>
          </div>
          <div class="modal-body">
            {!! Form::open(['class'=>'form']) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

                        <input type="hidden" name="button_action" value="0">
                        <div class="form-group">
                            {!! Form::label('date_of_birth', 'Date of Birth') !!}
                            {!! Form::date('date_of_birth', null, ['class'=>'form-control'])!!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('club_id', 'Club') !!}
                            {!! Form::select('club_id',$clubs, null, ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role_id', 'Role') !!}
                            {!! Form::select('role_id', [''=>'Choose Role'] + $roles, null, ['class'=>'form-control'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('batting_style_id', 'Batting Style') !!}
                            {!! Form::select('batting_style_id', [''=>'Choose Style'] + $batting_styles, null, ['class'=>'form-control'])!!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('bow;ing_style_id', 'Bowling Style') !!}
                            {!! Form::select('bowling_style_id', [''=>'Choose Style'] + $bowling_styles, null, ['class'=>'form-control'])!!}
                        </div>



                        {{-- <div class="form-group">
                            {!! Form::label('photo_id', 'Image') !!}
                            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                        </div> --}}




            <div class="form-group">
                {!! Form::submit('Insert Player', ['class'=>'btn btn-primary col-sm-3']) !!}
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

        $(document).ready(function(){





            //load  table ajax
            $('#mytable').DataTable(
            {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('playersData') }}",
                    "columns":[
                        { "data": "names" },
                        { "data": "age" },
                        { "data": "date_of_birth" },
                        { "data": "club" },
                        { "data": "role" },
                        { "data": "bat" },
                        { "data": "ball" },
                        { "data": "action"}
                    ]
            });

            //when click on edit button of table
            $(document).on('click','.idedit',function()
            {
                console.log('Edit Enter');
                $('#editid').val($(this).data('id'));
                $('#editname').val($(this).data('name'));
                $('#editbat').val($(this).data('bat'));
                $('#editdob').val($(this).data('date_of_birth'));
                $('#editrole').val($(this).data('role'));
                $('#editball').val($(this).data('ball'));
                $('#editclub').val($(this).data('club'));
            });

             //when click on delete button of table
            $(document).on('click','.iddelete',function()
            {
                console.log('Delete Enter');
                $('#deleteid').val($(this).data('id'));
            });

            //when click on edit/add button of modal form
            $(document).on('submit','.form',function(event)
            {
                event.preventDefault();
                var form_data = $(this).serialize();
                console.log(form_data);
                $.ajax({
                    url:"{{ route('players.store') }}",
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
                    error:function(data)
                    {
                        toastr.error('Server Responded With Error','Error Alert');
                    }
                });
            });

            //when click on delete button of modal form
            $(document).on('click','#buttonDelete',function(event)
            {
                event.preventDefault();
                var id = $('#deleteid').val();
                $.ajax({
                    url:"/admin/player/delete/"+id,
                    method:'DELETE',
                    data: {
                        id:id,
                        _token:$('input[name=_token]').val()
                    },
                    success:function(data)
                    {
                        // alert(data);
                        $('#mytable').DataTable().ajax.reload();
                        toastr.success(data, 'Data Deleted');
                    },
                    error:function(data)
                    {
                        toastr.error(data, 'Error Alert');
                    }
                });
            });
            $(document).on('submit','#batchform',function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('import') }}",
                    type:"POST",
                    data: new FormData($('#batchform')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){

                        if (data == 'required'){
                            toastr.error('File Is Required Kindly Insert It','Error Alert');
                        }
                        else if(data == 'format'){
                            toastr.error('Kindly Select xls,xlsx,csv format none other than that','Error Alert');
                        }
                        else if(data=='success'){
                            toastr.success('Players Inserted Successfully','Success Alert');
                            $('#mytable').DataTable().ajax.reload();
                        }
                        else if(data == 'No Data'){
                            console.log('Data: '+data)
                        }
                    },
                    error:function(data){
                        console.log(data);
                        toastr.error('Server Responded With Status 500','Error Alert');
                    }
                });
            });
        });
    </script>
@stop