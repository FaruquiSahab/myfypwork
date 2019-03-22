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

use App\Fixture;
use App\Tournament;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function() {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('register/user', 'AdminController@showCreate')->name('admin.create');
    Route::post('register/user', 'AdminController@create')->name('admin.register');


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
    ])->middleware(['can:create']);


    Route::get('/clubs', [
        'uses' => 'ClubController@index',
        'as' => 'clubs.index'
    ]);
	Route::get('clubdata', 'ClubController@clubdata')->name('clubdata');



    Route::post('/club/store', [
        'uses' => 'ClubController@store',
        'as' => 'clubs.store'
    ])->middleware(['can:create']);


    Route::get('/club/edit/{id}', [
        'uses' => 'ClubController@edit',
        'as' => 'clubs.edit'
    ])->middleware(['can:update']);


    Route::patch('/club/update', [
        'uses' => 'ClubController@update',
        'as' => 'clubs.update'
    ])->middleware(['can:update']);


    Route::DELETE('/club/delete/{id}', [
        'uses' => 'ClubController@destroy',
        'as' => 'clubs.delete'
    ])->middleware(['can:delete']);
    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------coaches--------------------------------------------------------------------

    Route::get('/coach/create', [
        'uses' => 'CoachController@create',
        'as' => 'coaches.create'

    ])->middleware(['can:create']);


    Route::get('/coaches', [
        'uses' => 'CoachController@index',
        'as' => 'coaches.index'

    ]);


    Route::post('/coach/store', [
        'uses' => 'CoachController@store',
        'as' => 'coaches.store'

    ])->middleware(['can:create']);


    Route::get('/coach/edit/{id}', [
        'uses' => 'CoachController@edit',
        'as' => 'coaches.edit'

    ])->middleware(['can:update']);


    Route::patch('/coach/update/{id}', [
        'uses' => 'CoachController@update',
        'as' => 'coaches.update'

    ])->middleware(['can:update']);


    Route::DELETE('/coach/delete/{id}', [
        'uses' => 'CoachController@destroy',
        'as' => 'coaches.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------grounds--------------------------------------------------------------------

    Route::get('/ground/create', [
        'uses' => 'GroundController@create',
        'as' => 'grounds.create'

    ])->middleware(['can:create']);


    Route::get('/grounds', [
        'uses' => 'GroundController@index',
        'as' => 'grounds.index'

    ]);
	 Route::get('grounddata', 'GroundController@grounddata')->name('grounddata');
	

    Route::post('/ground/store', [
        'uses' => 'GroundController@store',
        'as' => 'grounds.store'

    ])->middleware(['can:create']);


    Route::get('/ground/edit/{id}', [
        'uses' => 'GroundController@edit',
        'as' => 'grounds.edit'

    ])->middleware(['can:update']);


    Route::patch('/ground/update/{id}', [
        'uses' => 'GroundController@update',
        'as' => 'grounds.update'

    ])->middleware(['can:update']);


    Route::DELETE('/ground/delete/{id}', [
        'uses' => 'GroundController@destroy',
        'as' => 'grounds.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------players--------------------------------------------------------------------

    Route::get('/player/create', [
        'uses' => 'PlayerController@create',
        'as' => 'players.create'

    ])->middleware(['can:create']);


    Route::get('/players', [
        'uses' => 'PlayerController@index',
        'as' => 'players.index'

    ]);
    Route::get('/player','PlayerController@playersData')->name('playersData');


    Route::post('/player/store', [
        'uses' => 'PlayerController@store',
        'as' => 'players.store'

    ])->middleware(['can:create']);


    Route::get('/player/edit/{id}', [
        'uses' => 'PlayerController@edit',
        'as' => 'players.edit'

    ])->middleware(['can:update']);


    Route::patch('/player/update/{id}', [
        'uses' => 'PlayerController@update',
        'as' => 'players.update'

    ])->middleware(['can:update']);


    Route::DELETE('/player/delete/{id}', [
        'uses' => 'PlayerController@destroy',
        'as' => 'players.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------tournaments--------------------------------------------------------------------

    Route::get('/tournament/create', [
        'uses' => 'TournamentController@create',
        'as' => 'tournaments.create'

    ])->middleware(['can:create']);


    Route::get('/tournaments', [
        'uses' => 'TournamentController@index',
        'as' => 'tournaments.index'

    ]);


    Route::post('/tournament/store', [
        'uses' => 'TournamentController@store',
        'as' => 'tournaments.store'

    ])->middleware(['can:create']);


    Route::get('/tournament/edit/{id}', [
        'uses' => 'TournamentController@edit',
        'as' => 'tournaments.edit'

    ])->middleware(['can:update']);


    Route::patch('/tournament/update/{id}', [
        'uses' => 'TournamentController@update',
        'as' => 'tournaments.update'

    ])->middleware(['can:update']);


    Route::get('/tournament/delete/{id}', [
        'uses' => 'TournamentController@destroy',
        'as' => 'tournaments.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------umpires--------------------------------------------------------------------


    Route::get('/umpire/create', [
        'uses' => 'UmpireController@create',
        'as' => 'umpires.create'
    ])->middleware(['can:create']);


    Route::get('/umpires', [
        'uses' => 'UmpireController@index',
        'as' => 'umpires.index'

    ]);
    Route::get('umpiredata', 'UmpireController@umpiredata')->name('umpiredata');

	
    Route::post('/umpire/store', [
        'uses' => 'UmpireController@store',
        'as' => 'umpires.store'
    ])->middleware(['can:create']);


    Route::get('/umpire/edit/{id}', [
        'uses' => 'UmpireController@edit',
        'as' => 'umpires.edit'

    ])->middleware(['can:update']);


    Route::patch('/umpire/update/{id}', [
        'uses' => 'UmpireController@update',
        'as' => 'umpires.update'

    ])->middleware(['can:update']);


    Route::DELETE('/Umpire/delete/{id}', [
        'uses' => 'UmpireController@destroy',
        'as' => 'umpires.delete'
    ])->middleware(['can:delete']);


    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------posts--------------------------------------------------------------------

    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'posts.create'

    ])->middleware(['can:create']);


    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'posts.index'

    ]);


    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'posts.store'

    ])->middleware(['can:create']);


    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'posts.edit'

    ])->middleware(['can:update']);


    Route::patch('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'posts.update'

    ])->middleware(['can:update']);


    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'posts.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------playerRankingODs--------------------------------------------------------------------

    Route::get('/playersRankingOD/create', [
        'uses' => 'PlayerRankingODController@create',
        'as' => 'playerRankingOds.create'

    ])->middleware(['can:create']);


    Route::get('/playersRankingODs', [
        'uses' => 'PlayerRankingODController@index',
        'as' => 'playerRankingOds.index'

    ]);


    Route::post('/playersRankingOD/store', [
        'uses' => 'PlayerRankingODController@store',
        'as' => 'playerRankingOds.store'

    ])->middleware(['can:create']);


    Route::get('/playersRankingOD/edit/{id}', [
        'uses' => 'PlayerRankingODController@edit',
        'as' => 'playerRankingOds.edit'

    ])->middleware(['can:update']);


    Route::patch('/playersRankingOD/update/{id}', [
        'uses' => 'PlayerRankingODController@update',
        'as' => 'playerRankingOds.update'

    ])->middleware(['can:delete']);


    Route::get('/playersRankingOD/delete/{id}', [
        'uses' => 'PlayerRankingODController@destroy',
        'as' => 'playerRankingOds.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------playerRankingT20s--------------------------------------------------------------------

    Route::get('/playersRankingT20/create', [
        'uses' => 'PlayerRankingT20Controller@create',
        'as' => 'playerRankingt20.create'

    ])->middleware(['can:create']);


    Route::get('/playersRankingT20s', [
        'uses' => 'PlayerRankingT20Controller@index',
        'as' => 'playerRankingt20.index'

    ]);


    Route::post('/playersRankingT20/store', [
        'uses' => 'PlayerRankingT20Controller@store',
        'as' => 'playerRankingt20.store'

    ])->middleware(['can:create']);


    Route::get('/playersRankingT20/edit/{id}', [
        'uses' => 'PlayerRankingT20Controller@edit',
        'as' => 'playerRankingt20.edit'

    ])->middleware(['can:update']);


    Route::patch('/playersRankingT20/update/{id}', [
        'uses' => 'PlayerRankingT20Controller@update',
        'as' => 'playerRankingt20.update'

    ])->middleware(['can:update']);


    Route::get('/playersRankingT20/delete/{id}', [
        'uses' => 'PlayerRankingt20Controller@destroy',
        'as' => 'playerRankingt20.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------teamRankingODs--------------------------------------------------------------------

    Route::get('/teamsRankingOD/create', [
        'uses' => 'TeamRankingODController@create',
        'as' => 'teamRankingOds.create'

    ])->middleware(['can:create']);


    Route::get('/teamsRankingODs', [
        'uses' => 'TeamRankingODController@index',
        'as' => 'teamRankingOds.index'

    ]);


    Route::post('/teamsRankingOD/store', [
        'uses' => 'TeamRankingODController@store',
        'as' => 'teamRankingOds.store'

    ])->middleware(['can:create']);


    Route::get('/teamsRankingOD/edit/{id}', [
        'uses' => 'TeamRankingODController@edit',
        'as' => 'teamRankingOds.edit'

    ])->middleware(['can:update']);


    Route::patch('/teamsRankingOD/update/{id}', [
        'uses' => 'TeamRankingODController@update',
        'as' => 'teamRankingOds.update'

    ])->middleware(['can:update']);


    Route::get('/teamsRankingOD/delete/{id}', [
        'uses' => 'TeamRankingODController@destroy',
        'as' => 'teamRankingOds.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------teamRankingT20s--------------------------------------------------------------------

    Route::get('/teamsRankingT20/create', [
        'uses' => 'TeamRankingT20Controller@create',
        'as' => 'teamRankingt20.create'

    ])->middleware(['can:create']);


    Route::get('/teamsRankingT20s', [
        'uses' => 'TeamRankingT20Controller@index',
        'as' => 'teamRankingt20.index'

    ]);


    Route::post('/teamsRankingT20/store', [
        'uses' => 'TeamRankingT20Controller@store',
        'as' => 'teamRankingt20.store'

    ])->middleware(['can:create']);


    Route::get('/teamsRankingT20/edit/{id}', [
        'uses' => 'TeamRankingT20Controller@edit',
        'as' => 'teamRankingt20.edit'

    ])->middleware(['can:update']);


    Route::patch('/teamsRankingT20/update/{id}', [
        'uses' => 'TeamRankingT20Controller@update',
        'as' => 'teamRankingt20.update'

    ])->middleware(['can:update']);


    Route::get('/teamsRankingT20/delete/{id}', [
        'uses' => 'TeamRankingt20Controller@destroy',
        'as' => 'teamRankingt20.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------Matches--------------------------------------------------------------------

    Route::get('/match/create', [
        'uses' => 'MatchController@create',
        'as' => 'matches.create'

    ])->middleware(['can:create']);


    Route::get('/matches', [
        'uses' => 'MatchController@index',
        'as' => 'matches.index'

    ]);
	 Route::get('matchdata','MatchController@matchdata')
        ->name('matchdata')
        ->middleware(['can:create']);



    Route::post('/match/store', [
        'uses' => 'MatchController@store',
        'as' => 'matches.store'

    ])->middleware(['can:create']);


    Route::get('/match/edit/{id}', [
        'uses' => 'MatchController@edit',
        'as' => 'matches.edit'

    ])->middleware(['can:update']);


    Route::patch('/match/update/{id}', [
        'uses' => 'MatchController@update',
        'as' => 'matches.update'

    ])->middleware(['can:update']);


    Route::get('/match/delete/{id}', [
        'uses' => 'MatchController@destroy',
        'as' => 'matches.delete'

    ])->middleware(['can:delete']);

    //-----------------------------------------------------------------------------------------------------


    //------------------------------------------tournaments Reference--------------------------------------------------------------------

    Route::get('/tournament/edition/create', [
        'uses' => 'TournamentReferenceController@create',
        'as' => 'edition.create'

    ])->middleware(['can:create']);


    Route::get('/tournaments/edition', [
        'uses' => 'TournamentReferenceController@index',
        'as' => 'edition.index'

    ]);


    Route::post('/tournament/edition/store', [
        'uses' => 'TournamentReferenceController@store',
        'as' => 'edition.store'
    ])->middleware(['can:create']);


         Route::get('/tournament/edition/edit/{id}', [
        'uses' => 'TournamentReferenceController@edit',
        'as' => 'edition.edit'

    ]);
    Route::get('/tournament/edition/delete/{id}', [
        'uses' => 'TournamentReferenceController@destroy',
        'as' => 'edition.delete'

    ]);

        /*Route::get('/tournament/edition/show/{id}', [
            'uses' => 'TournamentClubController@index',
            'as' => 'edition.show'
            ]);*/


    Route::get('/tournament/edition/show/{id}', [
        'uses' => 'TournamentClubController@show',
        'as' => 'edition.show'

    ]);




    Route::post('/tournament/edition/club/store/', [
        'uses' => 'TournamentClubController@store',
        'as' => 'edition.store'

    ]);


    Route::get('/tournament/edition/club/show/table/{refer_id}', [
        'uses' => 'TournamentClubController@table',
        'as' => 'edition.tournament_table'

    ]);


    Route::post('/create/user', [
        'uses' => 'UserCheckController@store',
        'as' => 'check.index'

    ]);


    Route::get('/create/user', [
        'uses' => 'UserCheckController@index',
        'as' => 'check.user.index'

    ]);




//---------------waheed

/*Route::get('/tournament/edition/clubs/show/{id}', [
        'uses' => 'TournamentClubController@edit',
        'as' => 'edition.club.edit'

        ])->middleware(['can:create']);*/



//-------------waheed changes
    /*Route::get('/tournament/edition/{id}', [
        'uses' => 'TournamentClubController@index',
        'as' => 'edition.club.index'

    ])->middleware(['can:create']);*/


    Route::POST('/clubBy/club',[
            'uses'=> 'TournamentReferenceController@clubByClub',
            'as' => 'clubByClub'
        ])->middleware(['can:create']);


        Route::patch('/tournament/edition/update/{id}', [
            'uses' => 'TournamentReferenceController@update',
            'as' => 'edition.update'

        ])->middleware(['can:update']);


        Route::get('/tournament/edition/delete/{id}', [
            'uses' => 'TournamentReferenceController@destroy',
            'as' => 'edition.delete'

        ])->middleware(['can:delete']);



    Route::get('/line-up/{id}',[
        'uses'=> 'fixtureController@index',
        'as' => 'editions.lineup'
    ]);




    Route::post('/line-up/',[
        'uses'=> 'FixtureController@store',
        'as' => 'editions.lineup.store'
    ]);

//-----------------------------------------------------------------------------------------------------

//----------------------------------teamStats----------------------------------------------------------

        Route::get('/players/stats', [
            'uses' => 'PlayerController@statsindex',
            'as' => 'stats.index'
        ])->middleware(['can:create']);
        Route::get('/stats2','PlayerController@statsdata2')
            ->name('statsdata2')
            ->middleware(['can:create']);
        Route::get('/stats1','PlayerController@statsdata1')
            ->name('statsdata1')
            ->middleware(['can:create']);

});
// -------------------------------------------------------------------------------------------------------
// 
// 
//--------------------------------------------scoring-----------------------------------------------------

Route::get('/scoring', 'ScoringController@index' )
            ->name('scoring')
            ->middleware(['can:create']);

Route::get('/scoring/match/{match}', 'ScoringController@index1' )
            ->name('scoring.match')
            ->middleware(['can:create']);
Route::get('/scoring/match/{match}/inningsecond', 'ScoringController@index2' )
            ->name('scoring.match2')
            ->middleware(['can:create']);
#Obsolute
    Route::get('/batsmenScore/{match_id}','ScoringController@batsmenScore')
                ->name('batsmenScore')
                ->middleware(['can:create']);  

    Route::get('/bowlerScore/{match_id}','ScoringController@bowlerScore')
                ->name('bowlerScore')
                ->middleware(['can:create']);

    Route::get('/fallofwickets/{match_id}','ScoringController@fallofwickets')
                ->name('fallofwickets')
                ->middleware(['can:create']); 

    Route::get('/runsovers/{match_id}','ScoringController@runsovers')
                ->name('runsovers')
                ->middleware(['can:create']); 

    Route::get('/extras/{match_id}','ScoringController@extras')
                ->name('extras')
                ->middleware(['can:create']); 
#End
Route::POST('/submitbatsmenscore','ScoringController@submitbatsmenscore')
            ->name('submitbatsmenscore')
            ->middleware(['can:create']);
Route::POST('/submitbowlerscore','ScoringController@submitbowlerscore')
            ->name('submitbowlerscore')
            ->middleware(['can:create']);
Route::POST('/submitextrascore','ScoringController@submitextrascore')
            ->name('submitextrascore')
            ->middleware(['can:create']);
Route::POST('/submitbatsmenscore/inningsecond','ScoringController@submitbatsmenscore2')
            ->name('submitbatsmenscore2')
            ->middleware(['can:create']);
Route::POST('/submitbowlerscore/inningsecond','ScoringController@submitbowlerscore2')
            ->name('submitbowlerscore2')
            ->middleware(['can:create']);
Route::POST('/submitextrascore/inningsecond','ScoringController@submitextrascore2')
            ->name('submitextrascore2')
            ->middleware(['can:create']);
//------------------------------------------------------------------------------------------------------
//
//
//-------------------------------------------Fixture----------------------------------------------------
//
Route::get('/fixture', [
            'uses' => 'FixtureController@indes',
            'as' => 'fixtures.index'
        ]);
Route::get('fixturedata','FixtureController@fixturedata')
        ->name('fixturedata')
        ->middleware(['can:create']);

Route::post('fixture/store', [
            'uses' => 'FixtureController@store',
            'as' => 'fixtures.store'
        ]);
Route::get('fixture/delete/{id}', [
            'uses' => 'FixtureController@destroy',
            'as' => 'fixtures.delete'
        ]);

