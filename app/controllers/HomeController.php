<?php

class HomeController extends BaseController {

	/*
	 | Author : Akhtem VELILIAIEV : 7/10/2014 4:30 PM 
	*/

	public function showConfig()
	{	
		$takimlar = Teams::all();

		$count = count($takimlar);

		$odd = ( $count % 2 ) == 0 ? false : true;

		if( $odd )
			$count--;

		return View::make('start')
			->with(array( 
							'teams' => $takimlar, 
							'count' => $count, 
							'odd'   => $odd 
						));
	}

	public function getPlay( $hafta = null ){

		$obj = new Utils();

		$pattern = "#hafta-(\d+)$#";
		preg_match($pattern, $hafta ,$matches);
		$week = '-';

		if( $hafta == null || ! isset($matches[1]) || $matches[1] > 6 || $matches[1] <= 0 ){
			$res = $obj->getDfault();
			$editable = '';
			$next = 'hafta-1';
		}else{
			$lastPlayed = Games::max('week');
				if( $matches[1] != 1 && ( $lastPlayed < ( $matches[1] -1 ) ) ){
					return Redirect::route('play-given', array('hafta' => 'hafta-'.($lastPlayed+1)));
				}

			$res = $obj->getWeek( $matches[1] );
			$editable = 'contenteditable';
			$week = $matches[1];
			$next = 'hafta-' . ++$matches[1];
		}

		return View::make('game')
				->with( array( 
								'results' => $res, 
								'editable' => $editable,
								'hafta' => $next,
								'week' => $week
							 ) );
	}

	public function getPlayToEnd(){

		$obj = new Utils();
		$allWeeks = array(0,0,0,0,0,0);

		$allWeeks[0] = $obj->getWeek( 1 );
		$allWeeks[1] = $obj->getWeek( 2 );
		$allWeeks[2] = $obj->getWeek( 3 );
		$allWeeks[3] = $obj->getWeek( 4 );
		$allWeeks[4] = $obj->getWeek( 5 );
		$allWeeks[5] = $obj->getWeek( 6 );

		return View::make('end')->with( array( 'huge' => $allWeeks ) );
	}

}
