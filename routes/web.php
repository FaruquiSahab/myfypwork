<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function() {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);



    /*Route::resource('/club', 'ClubController',['names'=>[

        'index'=>'club.index',
        'create'=>'club.create',
        'store'=>'club.store',
        'edit'=>'club.edit',

        Route::get('/club/delete/{id}', [
            'uses' => 'ClubController@destroy',
            'as' => 'club.delete'

        ])


    ]]);*/




    //------------------------------------------clubs--------------------------------------------------------------------

    Route::get('/club/create', [
        'uses' => 'ClubController@create',
        'as' => 'clubs.create'

    ]);




    Route::get('/clubs', [
        'uses' => 'ClubController@index',
        'as' => 'clubs.index'

    ]);



    Route::post('/club/store', [
        'uses' => 'ClubController@store',
        'as' => 'clubs.store'

    ]);



    Route::get('/club/edit/{id}', [
        'uses' => 'ClubController@edit',
        'as' => 'clubs.edit'

    ]);


    Route::patch('/club/update/{id}', [
        'uses' => 'ClubController@update',
        'as' => 'clubs.update'

    ]);


    Route::get('/club/delete/{id}', [
        'uses' => 'ClubController@destroy',
        'as' => 'clubs.delete'

    ]);

//-----------------------------------------------------------------------------------------------------



    //------------------------------------------coaches--------------------------------------------------------------------

    Route::get('/coach/create', [
        'uses' => 'CoachController@create',
        'as' => 'coaches.create'

    ]);




    Route::get('/coaches', [
        'uses' => 'CoachController@index',
        'as' => 'coaches.index'

    ]);



    Route::post('/coach/store', [
        'uses' => 'CoachController@store',
        'as' => 'coaches.store'

    ]);



    Route::get('/coach/edit/{id}', [
        'uses' => 'CoachController@edit',
        'as' => 'coaches.edit'

    ]);


    Route::patch('/coach/update/{id}', [
        'uses' => 'CoachController@update',
        'as' => 'coaches.update'

    ]);


    Route::get('/coach/delete/{id}', [
        'uses' => 'CoachController@destroy',
        'as' => 'coaches.delete'

    ]);

//-----------------------------------------------------------------------------------------------------





    //------------------------------------------grounds--------------------------------------------------------------------

    Route::get('/ground/create', [
        'uses' => 'GroundController@create',
        'as' => 'grounds.create'

    ]);




    Route::get('/grounds', [
        'uses' => 'GroundController@index',
        'as' => 'grounds.index'

    ]);



    Route::post('/ground/store', [
        'uses' => 'GroundController@store',
        'as' => 'grounds.store'

    ]);



    Route::get('/ground/edit/{id}', [
        'uses' => 'GroundController@edit',
        'as' => 'grounds.edit'

    ]);


    Route::patch('/ground/update/{id}', [
        'uses' => 'GroundController@update',
        'as' => 'grounds.update'

    ]);


    Route::get('/ground/delete/{id}', [
        'uses' => 'GroundController@destroy',
        'as' => 'grounds.delete'

    ]);

//-----------------------------------------------------------------------------------------------------




    //------------------------------------------players--------------------------------------------------------------------

    Route::get('/player/create', [
        'uses' => 'PlayerController@create',
        'as' => 'players.create'

    ]);




    Route::get('/players', [
        'uses' => 'PlayerController@index',
        'as' => 'players.index'

    ]);



    Route::post('/player/store', [
        'uses' => 'PlayerController@store',
        'as' => 'players.store'

    ]);



    Route::get('/player/edit/{id}', [
        'uses' => 'PlayerController@edit',
        'as' => 'players.edit'

    ]);


    Route::patch('/player/update/{id}', [
        'uses' => 'PlayerController@update',
        'as' => 'players.update'

    ]);


    Route::get('/player/delete/{id}', [
        'uses' => 'PlayerController@destroy',
        'as' => 'players.delete'

    ]);

//-----------------------------------------------------------------------------------------------------



    //------------------------------------------tournaments--------------------------------------------------------------------

    Route::get('/tournament/create', [
        'uses' => 'TournamentController@create',
        'as' => 'tournaments.create'

    ]);



    Route::get('/tournaments', [
        'uses' => 'TournamentController@index',
        'as' => 'tournaments.index'

    ]);




    Route::post('/tournament/store', [
        'uses' => 'TournamentController@store',
        'as' => 'tournaments.store'

    ]);



    Route::get('/tournament/edit/{id}', [
        'uses' => 'TournamentController@edit',
        'as' => 'tournaments.edit'

    ]);




    Route::patch('/tournament/update/{id}', [
        'uses' => 'TournamentController@update',
        'as' => 'tournaments.update'

    ]);


    Route::get('/tournament/delete/{id}', [
        'uses' => 'TournamentController@destroy',
        'as' => 'tournaments.delete'

    ]);

//-----------------------------------------------------------------------------------------------------





    //------------------------------------------umpires--------------------------------------------------------------------

    Route::get('/umpire/create', [
        'uses' => 'UmpireController@create',
        'as' => 'umpires.create'

    ]);




    Route::get('/umpires', [
        'uses' => 'UmpireController@index',
        'as' => 'umpires.index'

    ]);



    Route::post('/umpire/store', [
        'uses' => 'UmpireController@store',
        'as' => 'umpires.store'

    ]);



    Route::get('/umpire/edit/{id}', [
        'uses' => 'UmpireController@edit',
        'as' => 'umpires.edit'

    ]);




    Route::patch('/umpire/update/{id}', [
        'uses' => 'UmpireController@update',
        'as' => 'umpires.update'

    ]);


    Route::get('/Umpire/delete/{id}', [
        'uses' => 'UmpireController@destroy',
        'as' => 'umpires.delete'

    ]);

//-----------------------------------------------------------------------------------------------------




    //------------------------------------------posts--------------------------------------------------------------------

    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'posts.create'

    ]);




    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'posts.index'

    ]);



    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'posts.store'

    ]);



    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'posts.edit'

    ]);




    Route::patch('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'posts.update'

    ]);


    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'posts.delete'

    ]);

//-----------------------------------------------------------------------------------------------------




    //------------------------------------------playerRankingODs--------------------------------------------------------------------

    Route::get('/playersRankingOD/create', [
        'uses' => 'PlayerRankingODController@create',
        'as' => 'playerRankingOds.create'

    ]);



    Route::get('/playersRankingODs', [
        'uses' => 'PlayerRankingODController@index',
        'as' => 'playerRankingOds.index'

    ]);



    Route::post('/playersRankingOD/store', [
        'uses' => 'PlayerRankingODController@store',
        'as' => 'playerRankingOds.store'

    ]);



    Route::get('/playersRankingOD/edit/{id}', [
        'uses' => 'PlayerRankingODController@edit',
        'as' => 'playerRankingOds.edit'

    ]);




    Route::patch('/playersRankingOD/update/{id}', [
        'uses' => 'PlayerRankingODController@update',
        'as' => 'playerRankingOds.update'

    ]);


    Route::get('/playersRankingOD/delete/{id}', [
        'uses' => 'PlayerRankingODController@destroy',
        'as' => 'playerRankingOds.delete'

    ]);

//-----------------------------------------------------------------------------------------------------





    //------------------------------------------playerRankingT20s--------------------------------------------------------------------

    Route::get('/playersRankingT20/create', [
        'uses' => 'PlayerRankingT20Controller@create',
        'as' => 'playerRankingt20.create'

    ]);



    Route::get('/playersRankingT20s', [
        'uses' => 'PlayerRankingT20Controller@index',
        'as' => 'playerRankingt20.index'

    ]);



    Route::post('/playersRankingT20/store', [
        'uses' => 'PlayerRankingT20Controller@store',
        'as' => 'playerRankingt20.store'

    ]);



    Route::get('/playersRankingT20/edit/{id}', [
        'uses' => 'PlayerRankingT20Controller@edit',
        'as' => 'playerRankingt20.edit'

    ]);




    Route::patch('/playersRankingT20/update/{id}', [
        'uses' => 'PlayerRankingT20Controller@update',
        'as' => 'playerRankingt20.update'

    ]);


    Route::get('/playersRankingT20/delete/{id}', [
        'uses' => 'PlayerRankingt20Controller@destroy',
        'as' => 'playerRankingt20.delete'

    ]);

//-----------------------------------------------------------------------------------------------------




    //------------------------------------------teamRankingODs--------------------------------------------------------------------

    Route::get('/teamsRankingOD/create', [
        'uses' => 'TeamRankingODController@create',
        'as' => 'teamRankingOds.create'

    ]);



    Route::get('/teamsRankingODs', [
        'uses' => 'TeamRankingODController@index',
        'as' => 'teamRankingOds.index'

    ]);



    Route::post('/teamsRankingOD/store', [
        'uses' => 'TeamRankingODController@store',
        'as' => 'teamRankingOds.store'

    ]);



    Route::get('/teamsRankingOD/edit/{id}', [
        'uses' => 'TeamRankingODController@edit',
        'as' => 'teamRankingOds.edit'

    ]);




    Route::patch('/teamsRankingOD/update/{id}', [
        'uses' => 'TeamRankingODController@update',
        'as' => 'teamRankingOds.update'

    ]);


    Route::get('/teamsRankingOD/delete/{id}', [
        'uses' => 'TeamRankingODController@destroy',
        'as' => 'teamRankingOds.delete'

    ]);

//-----------------------------------------------------------------------------------------------------



//------------------------------------------teamRankingT20s--------------------------------------------------------------------

    Route::get('/teamsRankingT20/create', [
        'uses' => 'TeamRankingT20Controller@create',
        'as' => 'teamRankingt20.create'

    ]);



    Route::get('/teamsRankingT20s', [
        'uses' => 'TeamRankingT20Controller@index',
        'as' => 'teamRankingt20.index'

    ]);



    Route::post('/teamsRankingT20/store', [
        'uses' => 'TeamRankingT20Controller@store',
        'as' => 'teamRankingt20.store'

    ]);



    Route::get('/teamsRankingT20/edit/{id}', [
        'uses' => 'TeamRankingT20Controller@edit',
        'as' => 'teamRankingt20.edit'

    ]);




    Route::patch('/teamsRankingT20/update/{id}', [
        'uses' => 'TeamRankingT20Controller@update',
        'as' => 'teamRankingt20.update'

    ]);


    Route::get('/teamsRankingT20/delete/{id}', [
        'uses' => 'TeamRankingt20Controller@destroy',
        'as' => 'teamRankingt20.delete'

    ]);

//-----------------------------------------------------------------------------------------------------





    //------------------------------------------clubs--------------------------------------------------------------------

    Route::get('/match/create', [
        'uses' => 'MatchController@create',
        'as' => 'matches.create'

    ]);




    Route::get('/matches', [
        'uses' => 'MatchController@index',
        'as' => 'matches.index'

    ]);



    Route::post('/match/store', [
        'uses' => 'MatchController@store',
        'as' => 'matches.store'

    ]);



    Route::get('/match/edit/{id}', [
        'uses' => 'MatchController@edit',
        'as' => 'matches.edit'

    ]);


    Route::patch('/match/update/{id}', [
        'uses' => 'MatchController@update',
        'as' => 'matches.update'

    ]);


    Route::get('/match/delete/{id}', [
        'uses' => 'MatchController@destroy',
        'as' => 'matches.delete'

    ]);

//-----------------------------------------------------------------------------------------------------



 //------------------------------------------tournaments Reference--------------------------------------------------------------------

    Route::get('/tournament/edition/create', [
        'uses' => 'TournamentReferenceController@create',
        'as' => 'edition.create'

    ]);



    Route::get('/tournaments/edition', [
        'uses' => 'TournamentReferenceController@index',
        'as' => 'edition.index'

    ]);




    Route::post('/tournament/edition/store', [
        'uses' => 'TournamentReferenceController@store',
        'as' => 'edition.store'

    ]);



    Route::get('/tournament/edition/edit/{id}', [
        'uses' => 'TournamentReferenceController@edit',
        'as' => 'edition.edit'

    ]);


    Route::get('/tournament/edition/show/{id}', [
        'uses' => 'TournamentReferenceController@show',
        'as' => 'edition.show'

    ]);

    Route::POST('/clubBy/club',[
        'uses'=> 'TournamentReferenceController@clubByClub',
        'as' => 'clubByClub'
    ]);


    Route::patch('/tournament/edition/update/{id}', [
        'uses' => 'TournamentReferenceController@update',
        'as' => 'edition.update'

    ]);


    Route::get('/tournament/edition/delete/{id}', [
        'uses' => 'TournamentReferenceController@destroy',
        'as' => 'edition.delete'

    ]);

//-----------------------------------------------------------------------------------------------------





});