@extends('layouts.admin')





@section('content')


    <span id="form_output"></span>
    @if(Session::has('deleted_umpire'))
        <div class="alert alert-danger">

        <p class="bg-danger">{{session('deleted_umpire')}}</p>
    </div>

    @endif


    @if(Session::has('created_umpire'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_umpire')}}</p>
        </div>

    @endif



    @if(Session::has('updated_umpire'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_umpire')}}</p>
        </div>

    @endif

<a href=""  data-target="#addmodel" data-toggle="modal" class="btn btn-info" >New Umpire</a>

    <h2>Umpires</h2>


    <table class="table table-sm table-hover table-striped" id="mytable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Nationality</th>
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
                "ajax": "{{ route('umpiredata') }}",
                "columns":[
                    { "data": "names" },
                    { "data": "nationality" },
                    { "data": "action"}
                ]
        });

        //when click on edit button of table
        $(document).on('click','.idedit',function()
        {
            console.log('Edit Enter');
            $('#editid').val($(this).data('id'));
            $('#editname').val($(this).data('name'));
            $('#editnation').val($(this).data('nation'));
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
                url:"{{ route('umpires.store') }}",
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
                url:"/admin/Umpire/delete/"+id,
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