<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">




    {{-- <link rel="stylesheet" href="{{ URL::asset('css/jquery.bracket.min.css') }}" />
     <script type="text/javascript" src="{{ URL::asset('js/jquery.bracket.min.js') }}"></script>--}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
     <script src="{{ URL::asset('js/jquery.gracket.min.js') }}"></script>--}}


    {{--   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
   --}}


    {{--    <script type="text/javascript" src="jquery-1.6.2.min.js"></script>--}}

    {{--<link href="{{asset('css/app.css')}}" rel="stylesheet">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/jquery.bracket.min.css') }}">
    <script type="text/javascript" src="{{ URL::to('js/jquery.bracket.min.js') }}"></script>


    {{--<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="jquery.bracket.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.bracket.min.css" />--}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <![endif]-->


    @yield('styles')

</head>

<body id="admin-page" style="padding-top: 1px">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">eCric</a>
        </div>
        <!-- /.navbar-header -->



        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down">



                    </i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="{{ route('admin.create') }}"><i class="fa fa-user fa-fw"></i> Register</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->


        </ul>






        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--@if(auth()->guest())--}}
        {{--@if(!Request::is('auth/login'))--}}
        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
        {{--@endif--}}
        {{--@if(!Request::is('auth/register'))--}}
        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
        {{--@endif--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

        {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}





        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    {{-- <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li> --}}
                    <li>
                        <a href="/admin/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-shield fa-fw"></i>Clubs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('clubs.index')}}">All Clubs</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('clubs.create')}}">Create Club</a>
                            </li> --}}



                        </ul>





                        <!-- /.nav-second-level -->
                    </li>








                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Players<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('players.index')}}">All Players</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('players.create')}}">Create Players</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


					
					
						                    <li>
                        <a href="#"><i class="fa fa-fire fa-fw"></i>Stats<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('stats.index')}}">Index</a>
                            </li>
                        </ul>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-fire fa-fw"></i>Scoring<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('scoring')}}">Score a Match</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}





                    <li>
                        <a href="#"><i class="fa fa-list-ul fa-fw"></i> Player Ranking ODs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('playerRankingOds.index')}}">All Rankings</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('playerRankingOds.create')}}">Add Rankings</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>







                    <li>
                        <a href="#"><i class="fa fa-list fa-fw"></i> Player Ranking T20s<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('playerRankingt20.index')}}">All Rankings</a>
                            </li>

                           {{--  <li>
                                <a href="{{route('playerRankingt20.create')}}">Add Rankings</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-list-ol fa-fw"></i> Team Ranking ODs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('teamRankingOds.index')}}">All Rankings</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('teamRankingOds.create')}}">Add Rankings</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-list-ol fa-fw"></i> Team Ranking T20s<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('teamRankingt20.index')}}">All Rankings</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('teamRankingt20.create')}}">Add Rankings</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-globe fa-fw"></i> Grounds<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('grounds.index')}}">All Grounds</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('grounds.create')}}">Add Ground</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-fire fa-fw"></i> Tournaments<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('tournaments.index')}}">All Tournaments</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('tournaments.create')}}">Add Tournament</a>
                            </li> --}}


                            {{-- <li>
                                <a href="">Manage Tournaments</a>
                            </li> --}}

                        </ul>
                    </li>



                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw"></i> Tournaments Edition<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('edition.index')}}">Edition</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('edition.create')}}">Make Edition</a>
                            </li> --}}


                            {{-- <li>
                                <a href="">Manage Tournaments</a>
                            </li> --}}

                        </ul>
                    </li>







                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Matches<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('matches.index')}}">All Matches</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('matches.create')}}">Add Match</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


					<li>
                        <a href="#"><i class="fa fa-pencil"></i>Fixture<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('fixtures.index')}}">All Fixture</a>
                            </li>
                        </ul>
                    </li>






                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Umpires<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('umpires.index')}}">All Umpires</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('umpires.create')}}">Add Umpire</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('posts.index')}}">All Posts</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('posts.create')}}">Add Post</a>
                            </li> --}}

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Coaches<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('coaches.index')}}">All Coaches</a>
                            </li>

                            {{-- <li>
                                <a href="{{route('coaches.create')}}">Create Coach</a>
                            </li> --}}




                                {{--<a href="#"><i class="fa fa-wrench fa-fw"></i>Grounds<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('grounds.index')}}">All Grounds</a>
                                    </li>

                                    <li>
                                        <a href="{{route('grounds.create')}}">Add Ground</a>
                                    </li>--}}


                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    {{-- <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">All Media</a>
                            </li>

                            <li>
                                <a href="">Upload Media</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li> --}}


                    {{-- <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li> --}}
                    {{-- <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li> --}}
                    {{-- <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li> --}}
                    {{-- <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li> --}}
                    {{-- <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li> --}}
                    {{-- <li class="active">
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="active" href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li> --}}
                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>





    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                </li>




                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="">All Posts</a>
                        </li>

                        <li>
                            <a href="">Create Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>





            </ul>

        </div>

    </div>

</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@yield('scripts')





</body>

</html>
