<?php

/*-----------------------------------------------------------------------------------*/
/*	Years Since 2003
/*-----------------------------------------------------------------------------------*/


function getAge( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'since' => '2003'
	), $atts ) );
	$since .= '-01-01';
	$then = date( 'Ymd', strtotime( $since ) );
	$diff = date( 'Ymd' ) - $then;

	return substr( $diff, 0, - 4 );


}

add_shortcode( "years-since", "getAge" );


