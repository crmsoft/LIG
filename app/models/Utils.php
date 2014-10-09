<?php

class Utils{

	public function getDfault(){
			// get user selected teams
			$theyIn = Teams::where( 'selected', '>', 0 )->orderBy('name')->get();

			$Puanlar   = array('0','0','0','0');
			$Oyunlar   = array('-','-','-','-');
			$Galibiyet = array('-','-','-','-');
			$Bereaber  = array('-','-','-','-');
			$Malum 	   = array('-','-','-','-');
			$Ortalama  = array('-','-','-','-');
			$Tahminler = array('%','%','%','%');

			$Teams = array( $theyIn[0]->name, $theyIn[1]->name, $theyIn[2]->name, $theyIn[3]->name );

			$GameFirst  = array( 'Team1',0,'-','-',0,'Team2' );
			$GameSecond = array( 'Team3',0,'-','-',0,'Team4' );

		return array( $Puanlar, $Oyunlar, $Galibiyet, $Bereaber, $Malum, $Ortalama, $GameFirst, $GameSecond, $Teams, $Tahminler );
	}

	public function getWeek( $week ){
			// get user selected teams
			$theyIn = Teams::where( 'selected', '>', 0 )->orderBy('name')->get();
			// is overview old games ?
			$isPlayed = Games::where( 'week', '=', $week )->get();
			// if not played play 
			if( ! $isPlayed->count() )
				Utils::play( $theyIn, $week );

		return Utils::getResults( $week, $theyIn );
	}

	public function getResults( $wk, $pl ){
			// get matches that played on this week
			$weekMatches = Games::where( 'week', '=', $wk )->get();
			// call stored rpoc - that counts teams scores
			DB::statement(DB::raw('CALL p2('.$wk.');'));
			// make predictions for week >= 4
			if( $wk == 4 || $wk == 5 )
				Utils::tahminEt( $wk, $pl );
			// after score table refreshed we can retrive it 
			$dash = Oynanan::orderBy( 'p', 'DESC' )->orderBy( 'av', 'DESC' )->get();

			$Puanlar   = array();
			$Oyunlar   = array();
			$Galibiyet = array();
			$Bereaber  = array();
			$Malum 	   = array();
			$Ortalama  = array();
			$Teams 	   = array();
			$Tahminler = array();

			foreach ($dash as $key => $value) {
				array_push($Puanlar, $value->p );
				array_push($Oyunlar, $value->o );
				array_push($Galibiyet, $value->g );
				array_push($Bereaber, $value->b );
				array_push($Malum, $value->m );
				array_push($Ortalama, $value->av );
				array_push($Teams, Utils::getNameById($pl, $value->team_id));
				array_push($Tahminler, $value->tahmin.'%' );
			}

			$GameFirst  = array( Utils::getNameById($pl, $weekMatches[0]->home ), $weekMatches[0]->home, $weekMatches[0]->home_score,$weekMatches[0]->out_score, $weekMatches[0]->outside, Utils::getNameById($pl,$weekMatches[0]->outside ) );
			$GameSecond = array( Utils::getNameById($pl, $weekMatches[1]->home ), $weekMatches[1]->home, $weekMatches[1]->home_score,$weekMatches[1]->out_score, $weekMatches[1]->outside, Utils::getNameById($pl,$weekMatches[1]->outside ) );

		return array( $Puanlar, $Oyunlar, $Galibiyet, $Bereaber, $Malum, $Ortalama, $GameFirst, $GameSecond, $Teams, $Tahminler );
	}

	public function getNameById( $search, $id ){
		foreach ($search as $key => $value) {
			if( $value->id == $id )
				return $value->name;
		}
		return 'undefined';
	} 

	public function getScoreById( $search, $id ){
		foreach ($search as $key => $value) {
			if( $value->team_id == $id )
				return $value->p;
		}
		return 'undefined';
	} 
	// ! yaklasik degerler alinmistir
	public function getPercents( $dif ){
		if( $dif == 0 ) 
			return array( 25,25 );

		if( $dif == 1 ) 
			return array( 23,27 );

		if( $dif == 2 ) 
			return array( 21,29 );

		if( $dif == 3 ) 
			return array( 16,34 );

		if( $dif > 3 ) 
			return array( 5,45 );
	}

	public function tahminEt( $for, $tm ){

		$takimlar = array(0,0,0,0);
		// teams that will play next week 
		$nextP = Utils::getPlayersByWeek( ($for+1) );
		$dash  = Oynanan::orderBy( 'p', 'DESC' )->get();
		// next week playeres ids
		$home1 = $tm[$nextP[0]]->id; $home2 = $tm[$nextP[2]]->id;
		$out1  = $tm[$nextP[1]]->id; $out2  = $tm[$nextP[3]]->id;
		// gecen haftalarin oynanan maclarin puanlari
		// takim 1 									  // takim 2
		$g1p1 = Utils::getScoreById( $dash, $home1 ); $g2p1 = Utils::getScoreById( $dash, $home2 );
		// takim 3 									  // takim 4
		$g1p2 = Utils::getScoreById( $dash, $out1  ); $g2p2 = Utils::getScoreById( $dash, $out2  );
		// takim 1 icin tahmin
		$res = Utils::getPercents( abs($g1p1 - $g2p1) );
		if( ($g1p1 - $g2p1) < 0 ){
			$takimlar[0] += $res[0];
			$takimlar[1] += $res[1];
		}else{
			$takimlar[0] += $res[1];
			$takimlar[1] += $res[0];
		}
		$res =  Utils::getPercents( abs( $g1p1 - $g1p2) );
		if( ($g1p1 - $g1p2) < 0 ){
			$takimlar[0] += $res[0];
			$takimlar[2] += $res[1];
		}else{
			$takimlar[0] += $res[1];
			$takimlar[2] += $res[0];
		}
		$res = Utils::getPercents( abs( $g1p1 - $g2p2) );
		if( ($g1p1 - $g2p2) < 0 ){
			$takimlar[0] += $res[0];
			$takimlar[3] += $res[1];
		}else{
			$takimlar[0] += $res[1];
			$takimlar[3] += $res[0];
		}
		// takim 2 icin tahmin 
		$res = Utils::getPercents( abs( $g2p1 - $g1p2 ) );
		if( ($g2p1 - $g1p2) < 0 ){
			$takimlar[1] += $res[0];
			$takimlar[2] += $res[1];
		}else{
			$takimlar[1] += $res[1];
			$takimlar[2] += $res[0];
		}
		$res = Utils::getPercents( abs( $g2p1 - $g2p2 ));
		if( ($g2p1 - $g2p2) < 0 ){
			$takimlar[1] += $res[0];
			$takimlar[3] += $res[1];
		}else{
			$takimlar[1] += $res[1];
			$takimlar[3] += $res[0];
		}
		// takim 3 icin tahmin
		$res = Utils::getPercents( abs( $g1p2 - $g2p2 ));
		if( ($g1p2 - $g2p2) < 0 ){
			$takimlar[2] += $res[0];
			$takimlar[3] += $res[1];
		}else{
			$takimlar[2] += $res[1];
			$takimlar[3] += $res[0];
		}
		// the end !

		$updatedDash = Oynanan::where( 'team_id', '=', $home1 )->get();
		$updatedDash[0]->tahmin = round($takimlar[0]/3, 2);
		$updatedDash[0]->save();

		$updatedDash = Oynanan::where( 'team_id', '=', $home2 )->get();
		$updatedDash[0]->tahmin = round($takimlar[1]/3, 2);
		$updatedDash[0]->save();

		$updatedDash = Oynanan::where( 'team_id', '=', $out1 )->get();
		$updatedDash[0]->tahmin = round($takimlar[2]/3, 2);
		$updatedDash[0]->save();

		$updatedDash = Oynanan::where( 'team_id', '=', $out2 )->get();
		$updatedDash[0]->tahmin = round($takimlar[3]/3, 2);
		$updatedDash[0]->save();
	}

	// inserts into games table match results
	public function play( $players, $week ){

		// get this week players
		$nextP = Utils::getPlayersByWeek( $week );

		$home1 = $nextP[0];
		$out1  = $nextP[1];

		$home2 = $nextP[2];
		$out2  = $nextP[3];

		if( $home1 != -1 && $out2 != -1 ){
			// play matchs 2 at week
			$m1 = Utils::getMatchResults( $players[$home1]->selected, $players[$out1]->selected );
			$m2 = Utils::getMatchResults( $players[$home2]->selected, $players[$out2]->selected );
			// week first game - enter results
			$game = new Games();

			$game->home = $players[$home1]->id;
			$game->outside = $players[$out1]->id;

			$game->home_score = $m1['s1'];
			$game->out_score  = $m1['s2'];

			$game->week = $week;
			//save first game results
			$game->save();
			// week second game - enter results
			$game = new Games();

			$game->home = $players[$home2]->id;
			$game->outside = $players[$out2]->id;

			$game->home_score = $m2['s1'];
			$game->out_score  = $m2['s2'];

			$game->week = $week;
			//save second game results
			$game->save();
		}

	}
	// make desition who wins and who lose by karma value(random asigned on create)
	public function getMatchResults( $karma1, $karma2 ){

		$karma1 = $karma1 + 2; // plays at home

		$isHasChance =  $karma1 - $karma2; 
		// chack if karma owner stadium is bigger if not lose
		if( $isHasChance < 0 ){
			$scoreHome = rand(0,1);
			$scoreOut  = rand(2,6);
		}else{
			$chance = rand(0, ($isHasChance + 1 + 2) ); // +1 beraber icin, +2 misafir kazanmasi
			if( $chance <= $isHasChance ){ // player at home wins
				$scoreHome = rand(2,5);
				$scoreOut  = rand(0,1); 
			}else if( $chance == ($isHasChance + 1) ){ // berabere
				$scoreHome = $scoreOut = rand(0,2);
			}else{									// home player lose match
				$scoreHome = rand(0,1);
				$scoreOut  = rand(2,4);
			}
		}

		return array( 's1' => $scoreHome, 's2' => $scoreOut );
	}

	public function getPlayersByWeek( $week ){

		$home1 = -1;
		$out1  = -1;

		$home2 = -1;
		$out2  = -1;

		if( $week == 1 ){
			$home1 = 0;
			$out1  = 1;

			$home2 = 2;
			$out2  = 3;
		}

		if( $week == 2 ){
			$home1 = 3;
			$out1  = 0;

			$home2 = 1;
			$out2  = 2;
		}

		if( $week == 3 ){
			$home1 = 1;
			$out1  = 0;

			$home2 = 3;
			$out2  = 2;
		}

		if( $week == 4 ){
			$home1 = 0;
			$out1  = 3;

			$home2 = 2;
			$out2  = 1;
		}

		if( $week == 5 ){
			$home1 = 2;
			$out1  = 0;

			$home2 = 1;
			$out2  = 3;
		}

		if( $week == 6 ){
			$home1 = 0;
			$out1  = 2;

			$home2 = 3;
			$out2  = 1;
		}

		return array( $home1, $out1, $home2, $out2 );
	}

}