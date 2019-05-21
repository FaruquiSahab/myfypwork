@extends('layouts.admin')


@section('title')
    Q Mobile Batsmen Rankings
@stop

@section('header')
    Q Mobile Batsmen Rankings
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


    <a style="float: right; margin:10px;" href="{{route('batsmen.point')}}" class="btn btn-info">Points</a>

    <a style="float: right; margin:10px;" href="{{route('batsmen.sr')}}" class="btn btn-info">Strike Rate</a>

    <a style="float: right; margin:10px;" href="{{route('batsmen.avg')}}" class="btn btn-info">Average</a>

    <a style="float: right; margin:10px;" href="{{route('batsmen.runs')}}" class="btn btn-info">Runs</a>


    {{-- <h2>Batsmen Rankings</h2> --}}


    <table id="batsmen_table" class="table table-sm table-hover  table-striped">
        <thead>
        <tr>
            <th class="col-sm-4">Player</th>
            <th class="col-sm-2">Club</th>
            <th class="col-sm-3">Action</th>
        </tr>
        </thead>
    </table>


    <input type="hidden" name="batsmen_id" value="{{$stats[0]->id}}">

    {{-- Edit Modal Start --}}
    <div class="modal" tabindex="-1" role="dialog" id="addmodel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <h3 class="modal-title"><strong>{{$stats[0]->player->name}}</strong></h3>
                    <h5 class="modal-title"><strong>{{$stats[0]->player->club->name}}</strong></h5>
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
                            <th>Runs</th>
                            <td><span id="runs"></span></td>
                        </tr>


                        <tr>
                            <th>Balls</th>
                            <td><span id="balls"></span></td>
                        </tr>


                        <tr>
                            <th>Average</th>
                            <td><span id="avg"></span></td>
                        </tr>


                        <tr>
                            <th>Strike Rate</th>
                            <td><span id="sr"></span></td>
                        </tr>

                        {{-- <tr>
                            <th>MOM</th>
                            <td><span id="moms"></span></td>
                        </tr> --}}


                        <tr>
                            <th>100s</th>
                            <td><span id="hundreds"></span></td>
                        </tr>


                        <tr>
                            <th>50s</th>
                            <td><span id="fifties"></span></td>
                        </tr>


                        <tr>
                            <th>6s</th>
                            <td><span id="sixes"></span></td>
                        </tr>


                        <tr>
                            <th>4s</th>
                            <td><span id="fours"></span></td>

                        </tr>


                        <tr>
                            <th>Ducks</th>
                            <td><span id="ducks"></span></td>

                        </tr>


                        <tr>
                            <th>Timeouts</th>
                            <td><span id="timeouts"></span></td>
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
            $('#batsmen_table').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('batsmendatatabes') }}",
                    "columns":[
                        { "data": "name" },
                        { "data": "club" },
                        { "data": "action" }
                    ]
                });


            $(document).on('click','.idedit',function (){
                console.log('Hello');
                $('#matches').text($(this).data('matches'));
                $('#innings').text($(this).data('innings'));
                $('#runs').text($(this).data('runs'));
                $('#balls').text($(this).data('balls'));
                $('#avg').text($(this).data('avg'));
                $('#sr').text($(this).data('sr'));
                // $('#moms').text($(this).data('moms'));
                $('#hundreds').text($(this).data('hundreds'));
                $('#fifties').text($(this).data('fifties'));
                $('#sixes').text($(this).data('sixes'));
                $('#fours').text($(this).data('fours'));
                $('#ducks').text($(this).data('ducks'));
                $('#points').text($(this).data('points'));
                $('#timeouts').text($(this).data('timeouts'));
            });


        });

    </script>
@stop
