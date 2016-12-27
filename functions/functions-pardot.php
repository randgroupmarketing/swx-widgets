<?php

/*	 Pardot Forms
#################################################################################### */

/*-----------------------------------------------------------------------------------*/
/*	 Enqueue the required utmz, geoip and augment script
/*   Usage: head
/*-----------------------------------------------------------------------------------*/

error_reporting( E_ALL );
ini_set( 'display_error', 'off' );
require '/Applications/MAMP/htdocs/randgroup/wp-content/themes/rand/scripts/ga_parse.php';

function geoip( $ip ) {
//error_reporting(E_ALL);
	//ini_set('display_errors', true);\
	// db.ip http://api.db-ip.com/addrinfo?addr=173.194.67.1&api_key=123456789
	$geo_array       = array();
	$city            = "";
	$state           = "";
	$country         = "";
	$zip             = "";
	$botRegexPattern = strtolower( "(googlebot\/|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|spider|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)" );
	$user_agent      = strtolower( $_SERVER['HTTP_USER_AGENT'] );
	//$user_agent = strtolower('Mozilla/5.0 (compatible; Sosospider/2.0; +http://help.soso.com/webspider.htm)');
	//echo $user_agent;

	$isCrawler = ( preg_match( "/$botRegexPattern/", $user_agent ) > 0 );
	//echo "|" . $isCrawler . "|";
	if ( ! $isCrawler ) {
		//try dbip
		/*$geo_array = json_decode(file_get_contents('http://api.db-ip.com/addrinfo?addr=' . $ip . "&api_key=7baba01cecf8e0775f0be902dfdfea5b3508d1b4"), true);
		error_log($ip . ' dbip');
		error_log(print_r($geo_array, true));
		//var_dump($geo_array);

		$city = $geo_array['city'];
		$state = $geo_array['stateprov'];
		$country = $geo_array['country'];
		$zip = ""; */

		if ( $city === "" ) {
			$geo_array = unserialize( file_get_contents( 'http://www.geoplugin.net/php.gp?ip=' . $ip ) );
			//echo "geoplugin";
			$city    = isset( $geo_array['geoplugin_city'] ) ? $geo_array['geoplugin_city'] : "";
			$state   = isset( $geo_array['geoplugin_region'] ) ? $geo_array['geoplugin_region'] : "";
			$country = isset( $geo_array['geoplugin_countryCode'] ) ? $geo_array['geoplugin_countryCode'] : "";
			$zip     = isset( $geo_array['geoplugin_areaCode'] ) ? $geo_array['geoplugin_areaCode'] : "";

			//error_log(date("Ymd His") . " " . $_SERVER['PHP_SELF'] . " || $user_agetnt");
			//error_log($ip . ' geoplugin');
			//error_log(print_r($geo_array, true));
			if ( $city === "" ) {
				//try ip-api

				/*	$geo_array = json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
					error_log($ip . ' ip-api');
					error_log(print_r($geo_array, true));
					$city = $geo_array['city'];
					$state = $geo_array['region'];
					$country = $geo_array['countryCode'];
				*/

				/*if ($city === "") {
					//try freegeoip
					$geo_array = json_decode(file_get_contents('http://freegeoip.net/json/' . $ip), true);
					error_log($ip . ' freegeoip');
					error_log(print_r($geo_array, true));
					//var_dump($geo_array);
					$city = $geo_array['city'];
					$state = $geo_array['region_code'];
					$country = $geo_array['country_code'];
					$zip = $geo_array['zip_code'];
				}*/
			}
		}

	}

	if ( $city === "" ) {
		$city = 'no-data';
	}
	if ( $state === "" ) {
		$city = 'no-data';
	}
	if ( $country === "" ) {
		$city = 'no-data';
	}

	return array( 'city' => $city, 'state' => $state, 'country' => $country, 'zip' => $zip, 'ip' => $ip );

}

add_action( 'wp_footer', 'pardot_scripts' );
//add_action('wp_head', 'pardot_head_scripts');

function pardot_scripts() {
	$echo = '
			<script type="text/javascript" src="/wp-content/plugins/swx-widgets/js/utmz.js?ver=20151201"></script>
			<script type="text/javascript" src="/wp-content/plugins/swx-widgets/js/augment.js?ver=20151201"></script>
			';
	echo $echo;
}

function pardot_head_scripts() {
	$echo = '
			<link rel="stylesheet" href="https://www.randgroup.com/assets/css/pardot.css?ver=20151201">
			<link rel="stylesheet" href="https://go.pardot.com/css/form.css?ver=20121030">
			';
	echo $echo;
}

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

function pardot_ajax_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		"form_url"       => 'https://go.pardot.com/l/20752/2013-02-25/68q',
		"return_url"     => null,
		"width"          => '600',
		"height"         => '600',
		"size"           => 'short',
		"redirect_to"    => null,
		"offer_name"     => null,
		"offer_category" => null,
		"id"             => 'pardotForm',
		"div_id"         => 'pardot_div',
	), $atts ) );

	if ( $size != 'short' ) {

	}

	if ( strlen( $redirect_to ) > 0 ) {
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['redirect_to'] ) {
		$redirect_to = $_GET['redirect_to'];
		$redirect_to = 'http://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['did'] ) {
		$did         = $_GET['did'];
		$redirect_to = '/resource-download/' . $did;
		$redirect_to = 'http://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;

	}

	if ( strlen( $offer_name ) > 0 ) {
		$offer_name = '&offer_name=' . urlencode( $offer_name );
		$redirect_to .= $offer_name;
	}

	if ( strlen( $offer_category ) > 0 ) {
		$offer_category = '&offer_category=' . urlencode( $offer_category );
		$redirect_to .= $offer_category;
	}

	$div_id_attr = 'id="' . $div_id . '"';

	$newURL = "/wp-content/plugins/swx-widgets/functions/iframe-pardot.php";
	$newURL .= "?src=" . $form_url . '?' . $redirect_to;
	$newURL .= "&url=" . $form_url;
	$newURL .= "&id=" . $id;
	$newURL .= "&width=" . $width;
	$newURL .= "&height=" . $height;
	$newURL .= "&redirect_to=" . $redirect_to;

	$call_script = "
<script>
	jQuery(document).ready(function () {

		if(typeof(loadPardotForm) !== 'function'){
			console.log('no pardot function');

		  	jQuery.getScript( '/wp-content/plugins/swx-widgets/js/pardot_ajax.js',
		  	function( data, textStatus, jqxhr ) {
			  console.log( 'pardot load performed.' );
			});

		}

		setTimeout(function(){
			loadPardotForm('" . $div_id . "','" . $newURL . "');
		}, 1000);
	});
</script>";

	//print_r(array($form_url));
	//return '<iframe src="'.$form_url.'?'.$redirect_to.'" url="'.$form_url.'" width="'.$width.'" height="'.$height.'" id="'.$id.'" redirect_to="'.$redirect_to.'" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>';
	return '<div class="pardot" ' . $div_id_attr . '><div class="pardot-form-loader">&nbsp;</div><div class="pardot-scaffold pardot-scaffold-hide">&nbsp;</div></div>' . $call_script;
}

function pardot( $atts, $content = null ) {
	extract( shortcode_atts( array(
		"form_url"       => 'https://go.pardot.com/l/20752/2013-02-25/68q',
		"return_url"     => null,
		"width"          => '600',
		"height"         => '600',
		"size"           => 'short',
		"redirect_to"    => null,
		"offer_name"     => null,
		"offer_category" => null,
		"id"             => 'pardotForm',
		"is_resource"    => "Yes",
	), $atts ) );

	$form_url = str_replace( 'http://www2.randgroup.com', 'https://go.pardot.com', $form_url );

	if ( $size != 'short' ) {
	}
	if ( strlen( $redirect_to ) > 0 ) {
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['redirect_to'] ) {
		$redirect_to = $_GET['redirect_to'];
		$redirect_to = 'https://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['did'] ) {
		$did         = $_GET['did'];
		$redirect_to = '/resource-download/' . $did;
		$redirect_to = 'https://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;

	}

	if ( strlen( $offer_name ) > 0 ) {
		$offer_name = '&offer_name=' . urlencode( $offer_name );
		$redirect_to .= $offer_name;
	}
	if ( strlen( $offer_category ) > 0 ) {
		$offer_category = '&offer_category=' . urlencode( $offer_category );
		$redirect_to .= $offer_category;
	}

	// utmz
	$utmz = new Utmz_cookie_parser();

	//vlog($utmz);

	$url_utmz = "&utm_source={$utmz->source}&utm_term={$utmz->term}&utm_content={$utmz->content}&utm_campaign={$utmz->campaign}&utm_gclid={$utmz->gclid}&utm_medium={$utmz->medium}";

	// add GEOIP
	$geoip_array = geoip( $_SERVER['REMOTE_ADDR'] );

	$geoIP = "&city=" . $geoip_array["city"] . "&state=" . $geoip_array["state"] . "&country=" . $geoip_array["country"];

	//print_r(array($form_url));
	if ( $is_resource == "Yes" ) {
		return '<div class="pardot-form-loader"><iframe src="' . $form_url . '?' . $geoIP . "&" . $redirect_to . $url_utmz . '" url="' . $form_url . '" width="' . $width . '" height="' . $height . '" id="' . $id . '" redirect_to="' . $redirect_to . '" type="text/html" frameborder="0" allowTransparency="true" style="border: 0" class="span12"></iframe></div>';

	} else {
		return '<iframe src="' . $form_url . '?' . $geoIP . "&" . $redirect_to . '" url="' . $form_url . '" width="' . $width . '" height="' . $height . '" id="' . $id . '" redirect_to="' . $redirect_to . '" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"  class="span12"></iframe>';

	}
}

add_shortcode( "pardot", "pardot" );
//add_shortcode("pardot", "pardot_ajax_func");
//

function pardotv2( $atts, $content = null ) {
	extract( shortcode_atts( array(
		"form_url"       => 'https://go.pardot.com/l/20752/2013-02-25/68q',
		"return_url"     => null,
		"width"          => '600',
		"height"         => '600',
		"redirect_to"    => null,
		"offer_name"     => null,
		"offer_category" => null,
		"id"             => 'pardotForm',
	), $atts ) );

	$form_url = str_replace( 'http://www2.randgroup.com', 'https://go.pardot.com', $form_url );

	if ( strlen( $redirect_to ) > 0 ) {
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['redirect_to'] ) {
		$redirect_to = $_GET['redirect_to'];
		$redirect_to = 'https://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;
	} elseif ( $_GET['did'] ) {
		$did         = $_GET['did'];
		$redirect_to = '/resource-download/' . $did;
		$redirect_to = 'https://' . $_SERVER['HTTP_HOST'] . $redirect_to;
		$redirect_to = urlencode( $redirect_to );
		$redirect_to = 'redirect_to=' . $redirect_to;

	}

	if ( strlen( $offer_name ) > 0 ) {
		$offer_name = '&offer_name=' . urlencode( $offer_name );
		$redirect_to .= $offer_name;
	}
	if ( strlen( $offer_category ) > 0 ) {
		$offer_category = '&offer_category=' . urlencode( $offer_category );
		$redirect_to .= $offer_category;
	}

	$utmz = new Utmz_cookie_parser();

	//vlog($utmz);

	$url_utmz = "&utm_source={$utmz->source}&utm_term={$utmz->term}&utm_content={$utmz->content}&utm_campaign={$utmz->campaign}&utm_gclid={$utmz->gclid}&utm_medium={$utmz->medium}";
	// add GEOIP
	$geoip_array = geoip( $_SERVER['REMOTE_ADDR'] );

	$geoIP = "&city=" . $geoip_array["city"] . "&state=" . $geoip_array["state"] . "&country=" . $geoip_array["country"];

	return '<iframe src="' . $form_url . '?' . $geoIP . "&" . $redirect_to . $url_utmz . '" url="' . $form_url . '" width="' . $width . '" height="' . $height . '" id="' . $id . '" redirect_to="' . $redirect_to . '" type="text/html" frameborder="0" allowTransparency="true" style="border: 0" ></iframe>';
}

add_shortcode( "pardot2", "pardotv2" );
