<?php

Route::get('/', function()
{
	return Redirect::to('new-game');
});

Route::get('/new-game', array(
						'as'   => 'start-new-game', 
						'uses' => 'HomeController@showConfig'
	));

Route::get('/play-game/{hafta?}', array(
						'as'   => 'play-given', 
						'uses' => 'HomeController@getPlay'
	));

Route::get('/game-over', array(
						'as'   => 'show-end', 
						'uses' => 'HomeController@getPlayToEnd'
	));

Route::post('/save-default', array(
						'as'   => 'save-4-teams', 
						'uses' => 'AjaxController@postSave'
	));

Route::post('play-game/change-score', array(
						'as'   => 'change-score', 
						'uses' => 'AjaxController@postUpdateScore'
	));