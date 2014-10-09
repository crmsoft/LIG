'use strict'

$(document).ready(function(){
	var initialSCore = 0;

	$('.score').focusin(function(e){
		initialSCore = parseInt($(e.target).text().trim());
	});


	$('.score').focusout(function(e){

	   // just numbers allowed!
	   var newVal = parseInt($(e.target).text().trim());
	   
	   if( newVal != initialSCore )
		   if( (newVal != 0 && !newVal) || newVal < 0 ){
		   	newVal = initialSCore;
		   }else{
		   	updateScore( newVal, $(e.target).attr('id'), initialSCore );
		   }

	   $(e.target).text( newVal );
	});
});

function updateScore( score, id, old ){

	var week = window.location.href.split('-').pop();

		if( id && week && week > 0 && week <= 6 ){
			$('.state-by-week').hide('slow');
			
			$.ajax({
			  type: "POST",
			  url: "change-score",
			  data: { changes : [score,week,id,old] }
			})
			  .done(function( work ) {
			  	updateDashBoard( work );
			    console.log( work );
			  })
			  	.fail(function( err ){
			  		$('.state-by-week').show('slow');
			  		// develop only
			  		console.log( err );
			  	});

		}else{
			console.log( 'error while updating score' );
		}
}

function updateDashBoard( results ){
	var index1 = 0, index2 = 0, map = [9,8,0,1,2,3,4,5];;
	$('.state-by-week tr:lt(6):gt(1)').each(function(){
		index1 = 0;
		$('td:lt(8)',this).each(function(){
			$(this).text( results[map[index1]][index2] );
			index1++;
		});
		index2++;
	});
	console.log(index1,index2);
	$('.state-by-week').show('slow');
}