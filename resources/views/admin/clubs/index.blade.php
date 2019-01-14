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

    @if(Session::has('created_club'))
    <div class="alert alert-success">
        <p class="bg-success">{{session('created_club')}}</p>
    </div>
    @endif

    @if(Session::has('updated_club'))
    <div class="alert alert-info">
        <p class="bg-info">{{session('updated_club')}}</p>
    </div>
    @endif

    <a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Add Club</a>

    <h1>Clubs</h1>
            <table id="club_table" class="table table-bordered">
                <thead>
                    <tr>
                        {{-- <th class="col-sm-2">Photo</th> --}}
                        <th class="col-sm-4">Name</th>
                        <th class="col-sm-2">Level</th>
                        <th class="col-sm-3">Action</th>
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
    <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"><strong>Update Information</strong></h3>
      </div>
      <div class="modal-body">
            
            {{ csrf_field() }}

            {!! Form::open(['action'=> 'ClubController@update', 'method'=>'POST', 'files'=>true, 'id'=>'editForm']) !!}

            <input type="hidden" name="id" id="clubid">
            <input type="hidden" name="button_action" value="1">
            <div class="form-group">
                {!! Form::label('', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control','id'=>'nameEdit'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('level_id', 'Level') !!}
                {!! Form::select('level_id',  $levels, null, ['class'=>'form-control','id'=>'levelEdit'])!!}
            </div>


            {{-- <div class="form-group">
                {!! Form::label('', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_idEdit'])!!}
            </div> --}}

            <div class="form-group">
                {!! Form::submit('Edit Club', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'buttonEdit']) !!}
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
            <h3 class="modal-title"><strong>Create Club</strong></h3>
      </div>
      <div class="modal-body">

        {!! Form::open(['method'=>'POST', 'action'=>'ClubController@store', 'files'=>true, 'id'=>'addForm']) !!}

            <input type="hidden" name="button_action" value="0">
            <div class="form-group">
                {!! Form::label('', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'clubname'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('level_id', 'Level') !!}
                {!! Form::select('level_id', $levels, null, ['placeholder'=>'Select Level','class'=>'form-control', 'id'=>'clublevel'])!!}
            </div>


            {{-- <div class="form-group">
                {!! Form::label('', 'Logo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control','id'=>'photo_id'])!!}
            </div> --}}


            <div class="form-group">
                {!! Form::submit('Create Club', ['class'=>'btn btn-primary col-sm-3 submit', 'id'=>'addClub' ]) !!}
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
    <script type="text/javascript">

        

        
        $(document).ready(function()
        {

            // Display a success toast, with a title
            




                    // $('table').dataTable({searching:false, paging:false, info:false})
            $('#club_table').DataTable(
            {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('clubdata') }}",
                "columns":[
                    { "data": "name" },
                    { "data": "level" },
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
                url:"{{ route('clubs.store') }}",
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
                url:"/admin/club/delete/"+id,
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