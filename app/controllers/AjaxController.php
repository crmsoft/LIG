<?php

class AjaxController extends BaseController {

	/*
	 | Author : Akhtem VELILIAIEV : 7/10/2014 4:30 PM 
	*/

	public function postSave()
	{	
		if( Input::has( 'teams' ) ){

			$update = Teams::all();
			$given = Input::get( 'teams' );
			Games::truncate();
			$tbl = Oynanan::all();
			$i = 0;
			foreach ($update as $key => $value) {

				if( in_array( $update[$key]->id, $given ) ){
					$update[$key]->selected = rand(1, 9);
					$tbl[$i]->team_id = $given[$i];
					$tbl[$i]->save();
					$i++;
				}else
					$update[$key]->selected = 0;

				$update[$key]->save();
			}

			return Response::json(array('msg'=>'done.'));
		}else{
			return Response::json(array('msg'=>'Nothing was posted !'));
		}
	}

	public function postUpdateScore(){

		if( Input::has('changes') ){
			$gameToUpdate = Games::where( 'week', '=', Input::get('changes')[1] )
								->where( function($query){
									return $query->where('home','=',Input::get('changes')[2])
											->orWhere('outside','=',Input::get('changes')[2]);
								})->get();

			if( $gameToUpdate->count() ){
				if($gameToUpdate[0]->home_score == Input::get('changes')[3])
					$gameToUpdate[0]->home_score = Input::get('changes')[0];
				else
					$gameToUpdate[0]->out_score = Input::get('changes')[0];

				if($gameToUpdate[0]->save()){
					// get players
					$theyIn = Teams::where( 'selected', '>', 0 )->orderBy('name')->get();
					// get refresh data
					$res = new Utils();
					$res = $res->getWeek( Input::get('changes')[1], $theyIn );

					return Response::json($res);
				}
					
						return Response::json(array('msg'=>'broke data was sended'));
			}

		}


		return Response::json(array('msg'=>'Nothing was posted !'));
	}

}