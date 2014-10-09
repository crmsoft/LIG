'use strict'

var pool = [ ];

$(document).ready(function(){

	$('.button-go-play').hide();

	$( 'table.all-teams' ).bind("click", function(e){
		if( e.target.id && e.target.nodeName == 'TD' )
			addToFavorits( e.target );
	});

	$( '.removeFav' ).click(function(e){
		removeFavorit( e.target );
	});

	$('.button-go-play').click(function( e ){
		e.preventDefault();
		setDefaultTeams( );
	});

});

function addToFavorits( el ){
	var srcA = $(el).prev().find('img').attr('src');
	var nEl = null;

	$('.selected img').each(function( ){
		if( $(this).attr('id') == -1 && ! nEl ){
			nEl = $(this);
		}
	});

		if( srcA && nEl ){
			var id = parseInt( el.id.match(/[0-9]+/g) );
			console.log( pool.indexOf(id),pool )
			if( id && (pool.indexOf(id) == -1) ){
				nEl.attr('src', srcA);
				nEl.attr('id', id);
				pool.push( id );
			}
		}

		if( pool.length === 4 ){
			$('.button-go-play').show();
		}
}

function removeFavorit( el ){
	var srcI = parseInt($( el ).next( ).attr('id'));
	var index = pool.indexOf( srcI );

		if( srcI && (index != -1) ){
			pool.splice( index, 1 );
			$( el ).next( ).attr( 'src', 'media/img/q.png' );
			$( el ).next( ).attr( 'id' , '-1' );
		}

	$('.button-go-play').hide();
}

function setDefaultTeams( ){
	$.ajax({
	  type: "POST",
	  url: "save-default",
	  data: { teams : pool }
	})
	  .done(function( work ) {
	    console.log( work.msg );
	    window.location = $('.link-go-play').attr('href');
	  })
	  	.fail(function( err ){
	  		// develop only
	  		console.log( err );
	  	});
}