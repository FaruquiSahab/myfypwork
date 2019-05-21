@extends('layouts.admin')


@section('title')
    Oppo Club Rankings 
@stop

@section('header')
    Oppo Club Rankings 
@stop


@section('content')



    @if(Session::has('deleted_playerRankingOD'))
        <div class="alert alert-danger">

            <p class="bg-danger">{{session('deleted_playerRankingOD')}}</p>
        </div>

    @endif


    @if(Session::has('created_playerRankingOD'))
        <div class="alert alert-success">

            <p class="bg-success">{{session('created_playerRankingOD')}}</p>
        </div>

    @endif



    @if(Session::has('updated_playerRankingOD'))
        <div class="alert alert-info">

            <p class="bg-info">{{session('updated_playerRankingOD')}}</p>
        </div>

    @endif

    <a style="float: right; margin: 10px;" href="{{route('team.point')}}" class="btn btn-info">Points</a>

    {{-- <h2>Team Rankings</h2> --}}


    <table id="batsmen_table" class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th class="col-sm-2">Team</th>
            <th class="col-sm-3">Action</th>
        </tr>
        </thead>
    </table>


    <input type="hidden" name="club_id" value="{{$stats[0]->id}}">

    {{-- Edit Modal Start --}}
    <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    {{--<h3 class="modal-title"><strong>{{$stats[0]->player->name}}</strong></h3>--}}
                    <h5 class="modal-title"><strong>{{$stats[0]->club->name}}</strong></h5>
                </div>
                <div class="modal-body">

                    <table class="table table-striped" id="tblGrid">

                        <tbody>
                        <tr>
                            <th>Matches</th>
                            <td><span id="matches"></span></td>
                        </tr>
                        <tr>
                            <th>Win</th>
                            <td><span id="win"></span></td>
                        </tr>
                        <tr>
                            <th>Loss</th>
                            <td><span id="loss"></span></td>
                        </tr>


                        <tr>
                            <th>N/R</th>
                            <td><span id="nr"></span></td>
                        </tr>


                        <tr>
                            <th>Points</th>
                            <td><span id="points"></span></td>
                        </tr>


                        <tr>
                            <th>Net Run Rate</th>
                            <td><span id="nrr"></span></td>
                        </tr>


                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    {{-- Edit Modal Ends --}}

@stop

@section('scripts')
    <script type="text/javascript">




        $(document).ready(function()
        {

            // Display a success toast, with a title





            // $('table').dataTable({searching:false, paging:false, info:false})
            $('#batsmen_table').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('teamdatatabes') }}",
                    "columns":[
                        { "data": "club" },
                        { "data": "action" }
                    ]
                });


            $(document).on('click','.idedit',function (){
                console.log('Hello');
                $('#matches').text($(this).data('matches'));
                $('#win').text($(this).data('win'));
                $('#loss').text($(this).data('loss'));
                $('#nr').text($(this).data('nr'));
                $('#points').text($(this).data('points'));
                $('#nrr').text($(this).data('nrr'));
            });


        });

    </script>
@stop
