@extends('layouts.admin')

@section('title')
    Q Mobile Bowlers Rankings
@stop

@section('header')
    Q Mobile Bowlers Ranking
@stop

@section('content')




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

    {{--<a href=""  data-target="#addmodel" data-tog

   gle="modal" class="btn btn-info" >Add Club</a>--}}

    <a style="float: right; margin: 10px;" href="{{route('bowlers.point2')}}" class="btn btn-info">Points</a>

    <a style="float: right; margin: 10px;" href="{{route('bowlers.econ2')}}" class="btn btn-info">Economy</a>

    <a style="float: right; margin: 10px;" href="{{route('bowlers.avg2')}}" class="btn btn-info">Average</a>




    {{-- <h2>Bowler Rankings</h2> --}}
    <table id="bowler_table" class="table table-bordered">
        <thead>
        <tr>
            <th class="col-sm-1">Points</th>
            <th class="col-sm-4">Player</th>
            <th class="col-sm-2">Club</th>
            <th class="col-sm-3">Action</th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">Points</th>
                <th class="col-sm-4">Player</th>
                <th class="col-sm-2">Club</th>
                <th class="col-sm-3">Action</th>
            </tr>
        </tfoot>
    </table>




    <input type="hidden" name="bowler_id" value="{{$stats[0]->id}}">


    {{-- Edit Modal Start --}}
    <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <h3 class="modal-title"><strong id="playername"></strong></h3>
                    <h5 class="modal-title"><strong id="playerclub"></strong></h5>
                </div>
                <div class="modal-body">

                    <table class="table table-striped" id="tblGrid">

                        <tbody>
                        <tr>
                        <th>Matches</th>
                        <td><span id="matches"></span></td>
                        </tr>
                        <tr>
                        <th>Innings</th>
                        <td><span id="innings"></span></td>
                        </tr>
                        <tr>
                        <th>Overs</th>
                        <td><span id="overs"></span></td>
                        </tr>


                        <tr>
                        <th>Runs</th>
                        <td><span id="runs"></span></td>
                        </tr>


                        <tr>
                        <th>Wickets</th>
                        <td><span id="wkts"></span></td>
                        </tr>


                        <tr>
                        <th>Average</th>
                        <td><span id="avg"></span></td>
                        </tr>

                        <tr>
                        <th>Economy</th>
                        <td><span id="econ"></span></td>
                        </tr>


                        {{-- <tr>
                        <th>MOM</th>
                        <td><span id="mom"></span></td>
                        </tr> --}}


                        <tr>
                        <th>5 Wickets</th>
                        <td><span id="fifer"></span></td>
                        </tr>


                        <tr>
                        <th>Wides</th>
                        <td><span id="wides"></span></td>
                        </tr>


                        <tr>
                        <th>No balls</th>
                        <td><span id="nb"></span></td>

                        </tr>


                        <tr>
                        <th>Points</th>
                        <td><span id="points"></span></td>

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
            $('#bowler_table').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('bowlerdatatabes.odi') }}",
                    "columns":[
                        { "data": "points" },
                        { "data": "name" },
                        { "data": "club" },
                        { "data": "action" }
                    ],
                    "order": [[ 0, "desc" ]]
                });
            //when click on edit button of table
            $(document).on('click','.idedit',function (){
            console.log('Hello');
            $('#matches').text($(this).data('matches'));
            $('#innings').text($(this).data('innings'));
            $('#runs').text($(this).data('runs'));
            $('#overs').text($(this).data('overs'));
            $('#avg').text($(this).data('avg'));
            $('#wkts').text($(this).data('wkts'));
            $('#econ').text($(this).data('econ'));
            $('#fifer').text($(this).data('fifer'));
            $('#wides').text($(this).data('wides'));
            $('#nb').text($(this).data('nb'));
            $('#mom').text($(this).data('mom'));
            $('#points').text($(this).data('points'));
            $('#playername').text($(this).data('playername'));
            $('#playerclub').text($(this).data('playerclub'));
        });


//            {
//                console.log('clubEdit Enter');
//                $('#clubid').val($(this).data('id'));
//                $('#nameEdit').val($(this).data('name'));
//                $('#levelEdit').val($(this).data('level'));
//            });



        });

    </script>
@stop