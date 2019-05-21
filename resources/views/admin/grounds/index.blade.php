@extends('layouts.admin')


@section('title')
    Grounds List
@stop

@section('header')
    Grounds List
@stop


@section('content')

    
    <span id="form_output"></span>
    @if(Session::has('deleted_ground'))
        <div class="alert alert-danger">
            <p class="bg-danger">{{session('deleted_ground')}}</p>
        </div>
    @endif
    @if(Session::has('created_ground'))
        <div class="alert alert-success">
            <p class="bg-success">{{session('created_ground')}}</p>
        </div>
    @endif

    @if(Session::has('updated_ground'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_ground')}}</p>
        </div>
    @endif
    <a href="" style="float: right; margin: 10px;" data-target="#addmodel" data-toggle="modal" class="btn btn-info" >Register Ground</a>

    {{-- <h2>Grounds</h2> --}}

    <table class="table table-sm table-hover table-striped" id="mytable">
        <thead>
        <tr>
            <th>Name</th>
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
                <input type="hidden" id="deleteid" name="">
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


            {{-- <div class="form-group">
                {!! Form::label('type_id', 'Type') !!}
                {!! Form::select('type_id',  $types, null, ['class'=>'form-control'])!!}
            </div> --}}


            {{-- <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div> --}}




            <div class="form-group">
                {!! Form::submit('Edit Ground', ['class'=>'btn btn-primary col-sm-3']) !!}
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
        <h3 class="modal-title"><strong>Register New Ground</strong></h3>
  </div>
  <div class="modal-body">
    {!! Form::open() !!}

                <input type="hidden" name="button_action" value="0">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control'])!!}
                </div>


                {{--<div class="form-group">
                    {!! Form::label('type_id', 'Type') !!}
                    {!! Form::select('type_id', [''=>'Choose Type'] + $types, null, ['class'=>'form-control'])!!}
                </div>--}}



                {{-- <div class="form-group">
                    {!! Form::label('photo_id', 'Logo') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                </div> --}}



                <div class="form-group">
                    {!! Form::submit('Register Ground', ['class'=>'btn btn-primary col-sm-3']) !!}
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
                "ajax": "{{ route('grounddata') }}",
                "columns":[
                    { "data": "names" },
                    { "data": "action"}
                ]
        });

        //when click on edit button of table
        $(document).on('click','.idedit',function()
        {
            console.log('Edit Enter');
            $('#editid').val($(this).data('id'));
            $('#editname').val($(this).data('name'));
        });

         //when click on delete button of table
        $(document).on('click','.iddelete',function()
        {
            console.log('Delete Enter');
            $('#deleteid').val($(this).data('id'));
        });

        //when click on edit/add button of modal form
        $(document).on('submit','form',function(event)
        {
            event.preventDefault();
            var form_data = $(this).serialize();
            console.log(form_data);
            $.ajax({
                url:"{{ route('grounds.store') }}",
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
                    if (data.status == '403') {
                        toastr.error('Permission Not Granted', 'Action Denied');
                    }
                    else if(data.status == '419')
                    {
                        toastr.info('Session Timeout','Login Again');
                        setTimeout( function() 
                        {
                            if (confirm('Session Timeout! Page Will Reload UnSave Changes Will Be Lost'))
                            {
                                setTimeout( function() { location.reload(); }, 1000);
                            }
                            else{

                            }
                        }, 2000);
                        
                    }
                    else{
                        toastr.error(data, 'Error Alert');
                    }
                }
            });
        });

        //when click on delete button of modal form
        $(document).on('click','#buttonDelete',function(event)
        {
            event.preventDefault();
            var id = $('#deleteid').val();
            $.ajax({
                url:"/admin/ground/delete/"+id,
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
                    if (data.status == '403') {
                        toastr.error('Permission Not Granted', 'Action Denied');
                    }
                    else if(data.status == '419')
                    {
                        toastr.info('Session Timeout','Login Again');
                        setTimeout( function() 
                        {
                            if (confirm('Session Timeout! Page Will Reload UnSave Changes Will Be Lost'))
                            {
                                setTimeout( function() { location.reload(); }, 1000);
                            }
                            else{

                            }
                        }, 2000);
                        
                    }
                    else{
                        toastr.error(data, 'Error Alert');
                    }
                }
            });
        });

    </script>
@stop