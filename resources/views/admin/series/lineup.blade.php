@extends('layouts.admin')




@section('content')

    <style>

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        /* line 1, ../scss/core.scss */

        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
        /* line 1, ../scss/_single.scss */
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 38px;
            user-select: none;
            -webkit-user-select: none;
        }
        /* line 12, ../scss/_single.scss */
        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            padding-left: 8px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        /* line 25, ../scss/_single.scss */
        .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
            padding-right: 8px;
            padding-left: 20px;
        }
        /* line 1, ../scss/_multiple.scss */
        .select2-container .select2-selection--multiple {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            user-select: none;
            -webkit-user-select: none;
        }
        /* line 12, ../scss/_multiple.scss */
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            display: inline-block;
            overflow: hidden;
            padding-left: 8px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        /* line 21, ../scss/_multiple.scss */
        .select2-container .select2-search--inline {
            float: left;
        }
        /* line 24, ../scss/_multiple.scss */
        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 100%;
            margin-top: 3px;
            margin-left: 3px;
        }
        /* line 31, ../scss/_multiple.scss */
        .select2-container .select2-search--inline .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }

        /* line 1, ../scss/_dropdown.scss */
        .select2-dropdown {
            background-color: white;
            border: 1px solid #DDD;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            z-index: 1051;
        }

        /* line 18, ../scss/_dropdown.scss */
        .select2-results {
            display: block;
        }

        /* line 22, ../scss/_dropdown.scss */
        .select2-results__options {
            list-style: none;
            list-style-type: none !important;
            margin: 0;
            padding: 0;
        }

        /* line 28, ../scss/_dropdown.scss */
        .select2-results__option {
            padding: 6px;
            user-select: none;
            -webkit-user-select: none;
        }
        /* line 34, ../scss/_dropdown.scss */
        .select2-results__option[aria-selected] {
            cursor: pointer;
        }

        /* line 39, ../scss/_dropdown.scss */
        .select2-container--open .select2-dropdown {
            left: 0;
        }

        /* line 43, ../scss/_dropdown.scss */
        .select2-container--open .select2-dropdown--above {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        /* line 49, ../scss/_dropdown.scss */
        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        /* line 55, ../scss/_dropdown.scss */
        .select2-search--dropdown {
            display: block;
            padding: 7px;
        }
        /* line 59, ../scss/_dropdown.scss */
        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        /* line 64, ../scss/_dropdown.scss */
        .select2-search--dropdown .select2-search__field::-webkit-search-cancel-button {
            -webkit-appearance: none;
        }
        /* line 69, ../scss/_dropdown.scss */
        .select2-search--dropdown.select2-search--hide {
            display: none;
        }

        /* line 15, ../scss/core.scss */
        .select2-close-mask {
            border: 0;
            margin: 0;
            padding: 0;
            display: block;
            position: fixed;
            left: 0;
            top: 0;
            min-height: 100%;
            min-width: 100%;
            height: auto;
            width: auto;
            opacity: 0;
            z-index: 99;
            background-color: #fff;
            filter: alpha(opacity=0);
        }

        /* line 1, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single {
            background-color: #f0f0f0;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 2px;
        }
        /* line 6, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single:focus {
            outline: 0;
        }
        /* line 10, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 34px;
        }
        /* line 15, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
        }
        /* line 21, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #999;
        }
        /* line 25, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }
        /* line 35, ../scss/theme/default/_single.scss */
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }
        /* line 56, ../scss/theme/default/_single.scss */
        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear {
            float: left;
        }
        /* line 60, ../scss/theme/default/_single.scss */
        .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow {
            left: 1px;
            right: auto;
        }
        /* line 68, ../scss/theme/default/_single.scss */
        .select2-container--default.select2-container--disabled .select2-selection--single {
            background-color: #eee;
            cursor: default;
        }
        /* line 72, ../scss/theme/default/_single.scss */
        .select2-container--default.select2-container--disabled .select2-selection--single .select2-selection__clear {
            display: none;
        }
        /* line 81, ../scss/theme/default/_single.scss */
        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #888 transparent;
            border-width: 0 4px 5px 4px;
        }
        /* line 1, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple {
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            -webkit-border-radius: 2px;
            border-radius: 2px;
            cursor: text;
            height: 22px;
        }
        /* line 7, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            box-sizing: border-box;
            list-style: none;
            list-style-type: none !important;
            padding: 0 0 0 4px !important;
            margin: 0;
            padding: 0 5px;
            width: 100%;
        }
        /* line 15, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
            color: #999;
            margin-top: 5px;
            float: left;
        }
        /* line 23, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-top: px;
            margin-right: 2px;
        }
        /* line 31, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #ffffff;
            background-color: #4a89dc;
        // border: 1px solid #ddd;
            border-radius: 2px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 1px;
            padding: 1px 2px 2px !important;
        }
        /* line 46, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px;
        }
        /* line 55, ../scss/theme/default/_multiple.scss */
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #333;
        }
        /* line 63, ../scss/theme/default/_multiple.scss */
        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice, .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder {
            float: right;
        }
        /* line 67, ../scss/theme/default/_multiple.scss */
        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice {
            margin-left: 5px;
            margin-right: auto;
        }
        /* line 72, ../scss/theme/default/_multiple.scss */
        .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 2px;
            margin-right: auto;
        }
        /* line 80, ../scss/theme/default/_multiple.scss */
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #CCC;
            outline: 0;
        }
        /* line 87, ../scss/theme/default/_multiple.scss */
        .select2-container--default.select2-container--disabled .select2-selection--multiple {
            background-color: #eee;
            cursor: default;
        }
        /* line 92, ../scss/theme/default/_multiple.scss */
        .select2-container--default.select2-container--disabled .select2-selection__choice__remove {
            display: none;
        }
        /* line 6, ../scss/theme/default/layout.scss */
        .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        /* line 13, ../scss/theme/default/layout.scss */
        .select2-container--default.select2-container--open.select2-container--below .select2-selection--single, .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        /* line 20, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #DDD;
        }
        /* line 22, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            outline: 0;
        }
        /* line 29, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-search--inline .select2-search__field {
            background: transparent;
            border: none;
            outline: 0;
        }
        /* line 36, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto;
            padding: 2px !important;
        }
        /* line 42, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option[role=group] {
            padding: 0;
        }
        /* line 46, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option[aria-disabled=true] {
            color: #999;
        }
        /* line 50, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #EEE;
        }
        /* line 54, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option {
            padding-left: 1em;
        }
        /* line 57, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__group {
            padding-left: 0;
        }
        /* line 61, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -1em;
            padding-left: 2em;
        }
        /* line 65, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -2em;
            padding-left: 3em;
        }
        /* line 69, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3em;
            padding-left: 4em;
        }
        /* line 73, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -4em;
            padding-left: 5em;
        }
        /* line 77, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -5em;
            padding-left: 6em;
        }
        /* line 88, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #4a89dc;
            color: white;
        }
        /* line 93, ../scss/theme/default/layout.scss */
        .select2-container--default .select2-results__group {
            cursor: default;
            display: block;
            padding: 6px;
        }

    </style>

    <h2>Lineup</h2>



    <div class="row">


        <div class="col-sm-8">

            <div class="panel-body">

                {!! Form::open(['method'=>'post','action'=>'SeriesController@series_matches_store']) !!}



                <input type="hidden" name="club1" value="{{$club_1}}">
                <input type="hidden" name="series_fixture_id" value="{{$id}}">
                <input type="hidden" name="ground_id" value="{{$ground_id}}">
                <input type="hidden" name="club2" value="{{$club_2}}">
                {{--<input type="hidden" name="series_id" value="">--}}
                <input type="hidden" name="starting_date" value="{{$date}}">
                <input type="hidden" name="series_type_id" value="{{$series_type_id}}">




                <div class="container">

                    <div class="form-group">
                        <label for="Toss">Toss</label>

                        <select class="form-control" name="toss">
                            <option disabled selected>Select Team</option>
                            <option value="{{$club1[0]->club_id_1}}">{{$club1[0]->club1->name}}</option>
                            <option value="{{$club2[0]->club_id_2}}">{{$club2[0]->club2->name}}</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Toss">Choose To</label>

                        <select class="form-control" name="choose_to">
                            <option disabled selected>Select Decision</option>
                            <option value="1">Bat</option>
                            <option value="2">Field</option>
                        </select>
                    </div>


                    <div class="form-group">

                        <label for="players">Lineup for {{$club1[0]->club1->name}}</label>
                        <select id="player_id1" name="player_id1[]"  class="form-control players">
                            @foreach($players1 as $key => $player1)
                                <option value="{{ $player1->id }}" >{{ $player1->name }} ({{ $player1->role->name }})</option>
                            @endforeach
                        </select>
                    </div>



                    <br>



                    <div class="form-group">

                        <label for="players">Lineup for {{$club2[0]->club2->name}}</label>
                        <select id="player_id2" name="player_id2[]"  class="form-control">
                            @foreach($players2 as $key => $player2)
                                <option value="{{ $player2->id }}" >{{ $player2->name }} ({{ $player2->role->name }})</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="Umpires">Umpires</label>

                        <select class="form-control" name="umpire_id">
                            @foreach($umpires as $umpire )
                                <option value="{{$umpire->id}}">{{$umpire->name}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        {!! Form::submit('Create Lineup', ['class'=>'btn btn-primary col-sm-3']) !!}
                    </div>


                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>



    @include('includes.form_error')

@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

        $("#player_id1").select2({
            placeholder: "Select Players",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : 11,
        });


        $("#player_id2").select2({
            placeholder: "Select Players",
            multiple: true,
            allowClear: true,
            maximumSelectionLength : 11,
        });

//        $("select").on("select2:select", function (evt) {
//            var element = evt.params.data.element;
//            var $element = $(element);
//            $element.detach();
//            $(this).append($element);
//            $(this).trigger("change");
//        });


        $(document).ready(function(){

            $('#dynamicAttributes').select2({
                allowClear: true,
                minimumResultsForSearch: -1,
                width: 500
            });

            $("select").on("select2:select", function(evt) {
                var element = evt.params.data.element;
                var $element = $(element);
                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });

        });


        {{--$('form').on('submit', function(event){--}}
        {{--event.preventDefault();--}}
        {{--var minimum = 11;--}}
        {{--var formdata = $('form').serialize();--}}
        {{--$.ajax({--}}
        {{--url:'{{ route('editions.lineup.store') }}',--}}
        {{--method:'POST',--}}
        {{--data:formdata,--}}
        {{--success:function(){--}}
        {{--console.log('success');--}}
        {{--},--}}
        {{--error:function(){--}}
        {{--console.log('error');--}}
        {{--}--}}
        {{--});--}}
        {{--if($("#player_id1").select2('data').length >= minimum) {--}}
        {{----}}
        {{--alert('Proceeding');--}}
        {{----}}
        {{--}--}}
        {{--else {--}}
        {{--alert('Please Select Exactly 11 Players For '+'{{$club1[0]->club1->name}}');--}}
        {{--}--}}
        {{--if($("#player_id2").select2('data').length >= minimum) {--}}
        {{--alert('Proceeding');--}}
        {{--}--}}
        {{--else {--}}
        {{--alert('Please Select Exactly 11 Players For '+'{{$club1[0]->club2->name}}');--}}
        {{--}--}}
        //        })

    </script>


@stop