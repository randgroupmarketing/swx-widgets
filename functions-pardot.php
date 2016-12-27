<?php


/*	 Pardot Forms
#################################################################################### */


/*-----------------------------------------------------------------------------------*/
/*	 Enqueue the required utmz, geoip and augment script
/*   Usage: head
/*-----------------------------------------------------------------------------------*/

/*
    <!-- augment data -->
    <script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script> 
    <script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/utmz.js"></script> 
    <script type="text/javascript" src="https://www.randgroup.com/wp-content/plugins/swx-widgets/js/augment.js"></script> 
	<script type="application/javascript" src="http://www.telize.com/jsonip?callback=getip"></script>
*/

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
			<script type="text/javascript" src="/wp-content/plugins/swx-widgets/js/utmz.js"></script> 
			<script type="text/javascript" src="/wp-content/plugins/swx-widgets/js/augment.js"></script> 
			<script type="text/javascript" src="/wp-content/plugins/swx-widgets/js/pardot_ajax.js"></script> 

			<link rel="stylesheet" href="https://www.randgroup.com/assets/css/pardot.css">
			';
		echo $echo; 
		

		
}


/* function pardot_head_scripts() {
		
		$echo = '
			<script type="application/javascript" src="http://www.telize.com/jsonip?callback=getip"></script> ';
		echo $echo; 
		
} */

/*
function load_pardot_scripts() {  

	wp_register_script('geoip', 'http://j.maxmind.com/app/geoip.js', array('jquery'));
	wp_enqueue_script('geoip',array(), 'version', true ); // moves to footer, see http://blog.cloudfour.com/getting-all-javascript-into-the-footer-in-wordpress-not-so-fast-buster/
	//wp_register_script('utmz', 'http://www.dynamics101.com/wp-content/plugins/utmz-geoip/js/utmz.js', array('jquery'));
	wp_register_script('utmz', plugins_url('/js/utmz.js', dirname(__FILE__) ), array('jquery'));
	wp_enqueue_script('utmz',array(), 'version', true );
	//wp_register_script('augment', 'http://www.dynamics101.com/wp-content/plugins/utmz-geoip/js/augment.js', array('jquery'));
	wp_register_script('augment', plugins_url('/js/augment.js', dirname(__FILE__) ), array('jquery'));
	wp_enqueue_script('augment',array(), 'version', true );

}  

add_action('wp_enqueue_scripts', 'load_pardot_scripts');  */



 
/*-----------------------------------------------------------------------------------*/
/*	 Show Iframe Forms
/*   http://www.pardot.com/faqs/forms/populate-hidden-field-on-form-with-name-of-webpage/
/*   Usage: shortcode
/*   Example: [pardot form_url="http://www2.dynamics101.com/l/20752/2013-02-25/68q" height="505" width="505"]
/*-----------------------------------------------------------------------------------*/

function pardot_ajax_func($atts, $content = null) {  
    extract(shortcode_atts(array(  
        "form_url" => 'https://go.pardot.com/l/20752/2013-02-25/68q',
		"return_url" => null,
		"width" => '500',
		"height" => '500',
		"size" => 'short',
		"redirect_to" => null,
		"offer_name" => null,
		"offer_category" => null,
		"id" => 'pardotForm',
		"div_id" => 'pardot_div'
    ), $atts));  
	
	if($size != 'short') { 
		
	}
	
	if(strlen($redirect_to) > 0) {
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;			
	} elseif ($_GET['redirect_to']) {
		$redirect_to = $_GET['redirect_to'];
		$redirect_to = 'http://'.$_SERVER['HTTP_HOST'].$redirect_to;
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;
	} elseif ($_GET['did']) {
		$did = $_GET['did'];
		$redirect_to = '/resource-download/'.$did;
		$redirect_to = 'http://'.$_SERVER['HTTP_HOST'].$redirect_to;
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;

	}

	if(strlen($offer_name) > 0) {
		$offer_name = '&offer_name='.urlencode($offer_name);
		$redirect_to .= $offer_name;
	}
	
	if(strlen($offer_category) > 0) {
		$offer_category = '&offer_category='.urlencode($offer_category);
		$redirect_to .= $offer_category;
	}
	
	
	$div_id_attr = 'id="'. $div_id .'"';

	$call_script = " 
	<script>
		jQuery(document).ready(function () {
				// shim if not loaded
				//console.log(loadPardotForm || false);
				if(typeof(loadPardotForm) !== 'function'){
					console.log('no pardot function');

					function loadPardotForm(divId, url){
						var $ = jQuery;
					    var divObj = $('#'+divId);

					    $.ajax({
						  url: url,
						  cache: false
						})
						  .done(function( html ) {
						    divObj.append( html );
						    // javascript
						  	console.log('loaded pardot')
						  });

					}
				}


				loadPardotForm('".$div_id."','". $form_url ."');

		});
	</script>";

	//print_r(array($form_url));
    //return '<iframe src="'.$form_url.'?'.$redirect_to.'" url="'.$form_url.'" width="'.$width.'" height="'.$height.'" id="'.$id.'" redirect_to="'.$redirect_to.'" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
    return  '<div class="pardot" '. $div_id_attr .'></div>' . $call_script;
}

function pardot($atts, $content = null) {  
    extract(shortcode_atts(array(  
        "form_url" => 'https://go.pardot.com/l/20752/2013-02-25/68q',
		"return_url" => null,
		"width" => '500',
		"height" => '500',
		"size" => 'short',
		"redirect_to" => null,
		"offer_name" => null,
		"offer_category" => null,
		"id" => 'pardotForm'
    ), $atts));  
	if($size != 'short') { 
	}



	if(strlen($redirect_to) > 0) {
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;			
	} elseif ($_GET['redirect_to']) {
		$redirect_to = $_GET['redirect_to'];
		$redirect_to = 'http://'.$_SERVER['HTTP_HOST'].$redirect_to;
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;
	} elseif ($_GET['did']) {
		$did = $_GET['did'];
		$redirect_to = '/resource-download/'.$did;
		$redirect_to = 'http://'.$_SERVER['HTTP_HOST'].$redirect_to;
		$redirect_to = urlencode($redirect_to);
		$redirect_to = 'redirect_to='.$redirect_to;

	}

	if(strlen($offer_name) > 0) {
		$offer_name = '&offer_name='.urlencode($offer_name);
		$redirect_to .= $offer_name;
	}
	if(strlen($offer_category) > 0) {
		$offer_category = '&offer_category='.urlencode($offer_category);
		$redirect_to .= $offer_category;
	}

    return '<div><!-- test --></div><iframe src="'.$form_url.'?'.$redirect_to.'" url="'.$form_url.'" width="'.$width.'" height="'.$height.'" id="'.$id.'" redirect_to="'.$redirect_to.'" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';

}  

add_shortcode("pardot", "pardot");  
//add_shortcode("pardot", "pardot_ajax_func");  


?>
