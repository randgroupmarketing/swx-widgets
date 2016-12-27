<?php


add_action('wp_footer', 'pardot_scripts');


// add_action('wp_head', 'pardot_head_scripts');


function pardot_scripts() {/*
    //for maxmind
	$echo = '<script src="//js.maxmind.com/js/geoip.js" type="text/javascript" ></script>
    <script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/utmz.js"></script> 
    <script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/augment.js"></script> ';
	
		echo $echo;*/
		
		//for Telize - http://www.telize.com/
		$echo = '
			<script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/utmz.js"></script> 
			<script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/augment.js"></script> ';
		echo $echo; 
		

		
}



?>