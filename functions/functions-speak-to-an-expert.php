<?php

/*-----------------------------------------------------------------------------------*/
/*	Expert Shortcode
/*-----------------------------------------------------------------------------------*/

function tz_expert($atts, $content) {
	extract(shortcode_atts(array(
		"headline" => 'default',
	), $atts));

	// don't use contractor, admin, colin, jason, brandee, bryan
	$exclude_list = array('admin', 'salesworks', 'colin', 'jcarroll', 'bbarker', 'bvillanueva', 'odesk');

	// get expert from post author
	$title = get_the_title();

	$custom_headline = $headline;

	$default_headline = 'Schedule a Meeting with the ' . $title . ' Expert';

	// get author info
	$avatar = get_avatar(get_the_author_meta('ID'), '250');
	$avatar = str_replace('http://', 'https://', $avatar);

	$user_login = get_the_author_meta('user_login');

	$display_name = get_the_author_meta('display_name');

	$user_firstname = get_the_author_meta('user_firstname');

	$job_title = get_the_author_meta('job_title');

	$author_description = get_the_author_meta('description');

	$author_first_name = get_the_author_meta('first_name');

	$live_avatar = get_the_author_meta('live_avatar');

	// CTA button
	$form = '[pardot form_url="https://go.pardot.com/l/20752/2013-06-19/j19m" width="450" height="350"]';

	/*$cta = '<p><a class="btn-primary btn" href="/contact/#expert=' . $user_login . '" data-toggle="modal">Send a Message</a><p>';*/
	$cta = '<p class="expertCta"><a class="btn-sample btn-large btn" href="#sendMessage" data-target="#sendMessage"data-toggle="modal" ><i class="icon-envelope icon-white"></i> Ask ' . $user_firstname . ' a question</a> or call <a href="tel:1-866-714-8422">(866) 714-8422</a><p>';

	// ####################################
	// modal popup form
	$modal = '
	<!-- Modal -->
	<div id="sendMessage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Ask a question</h3>
	  </div>
	  <div class="modal-body">
		' . do_shortcode($form) . '
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  </div>
	</div>';
	// CTA form

//**
	// SQUEEZE section
	//**
	// squeeze form - 7 mistakes
	$squeeze_form = '[pardot form_url=
	"https://go.pardot.com/l/20752/2013-05-24/crmr" width="230" height="285" redirect_to="http%3A%2F%2Fwww.randgroup.com%2Fresource-download%2F1&amp;offer_name=7+Software+Selection+Mistakes+That+Spell+Failure&modal=true" ]';

// squeeze page modal - 7 mistakes
	$squeeze = '
  <!-- Squeeze Modal -->
  <div class="modal fade" id="squeezeModal" tabindex="-1" role="dialog" aria-labelledby="squeezeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!--
		<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  <h3 id="myModalLabel">Recommended For You</h3>
        </div>
		-->
	  <div class="modal-body">
			<div id="modal-contents" class="row-fluid" style="display:none;">
				<div class="span6">
			<p><img src="https://www.randgroup.com/wp-content/uploads/downloads/thumbnails/2013/05/7software-selection-screen-200.png"></p>
			<p> Software selection is an important decision. This guide will ensure you don’t make the wrong one.</p>
				</div>
				<div class="span6">
				<p>Fill out the form to access this resource:</p>
					' . do_shortcode($squeeze_form) . '
				</div>
			</div>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->';

/*
// squeeze form - what are you looking for
$squeeze_form = '[pardot form_url="https://go.pardot.com/l/20752/2013-09-30/56dj5" width="380" height="250"]';

// squeeze page modal - what are you looking for
$squeeze = '
<!-- Squeeze Modal -->
<div class="modal fade" id="squeezeModal" tabindex="-1" role="dialog" aria-labelledby="squeezeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">What are you looking for today?</h3>

</div>
<div class="modal-body">
<p>Send us your comments and we\'ll reply back with answers. </p>
'.do_shortcode( $squeeze_form ).'
</div>
<div class="modal-footer">
<button class="btn modal-close" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->';
 */

	$squeeze_js = "
  <script>
	jQuery(document).ready(function () {

	// if squeeze modal is closed, don't show it again
	// tbd

	// if visitor is from PPC (cpc) then show them the squeeze
	if(medium == 'cpc') {

			// debug
			// alert('yes');

			setTimeout(function() {

				jQuery('#modal-contents').show();
				jQuery('#squeezeModal').modal('show');

			}, 10000); // milliseconds

		} else {

			// debug
			// alert('no');

		}

	});
  </script>";

	$utmz = new Utmz_cookie_parser();

	//vlog($utmz);

	$url_utmz = "&utm_source={$utmz->source}&utm_term={$utmz->term}&utm_content={$utmz->content}&utm_campaign={$utmz->campaign}&utm_gclid={$utmz->gclid}&utm_medium={$utmz->medium}";
	// add GEOIP
	$geoip_array = geoip($_SERVER['REMOTE_ADDR']);

	$geoIP = "&city=" . $geoip_array["city"] . "&state=" . $geoip_array["state"] . "&country=" . $geoip_array["country"];

	// ####################################
	// speak to the expert inline CTA
	// if the author name doesnt match the exclude list
	if (!in_array($user_login, $exclude_list)) {

		// show live avatar instead if it exists
		// if(strlen($live_avatar) >2) {
		// $avatar = '<img alt="'.$display_name.'" src="'.$live_avatar.'" class="avatar pull-left media-object avatar-96 photo" height="96" width="96">';
		// }

		// if no custom headline specified, use default
		if ($custom_headline != 'default') {
			$copy_headline = $custom_headline;
		} else {
			$copy_headline = $default_headline;
		}

		$return = '
					</div> <!-- close pf component -->
			</div> <!-- span10 -->
		</div> <!-- close pf component -->
	</div> <!-- content-->
</div><!-- wrap.container -->

	<div id="expert" class="speak-to-expert-block">
		<div class="container ">
			<div class="row ">
				<h3>' . $copy_headline . '</h3>
				<div class="span4 author-profile vcard expert">
					<div class="author_image">' . $avatar . '</div>
					<div class="author_info">
										<p class="author-name fn n"><strong>' . $display_name . '</strong></p>
						<p class="job_title">' . $job_title . ' at Rand Group</a></p>
						Call <a href="tel:1-866-956-1924">(866) 956-1924</a>
					</div>
				</div>
				<div class="span8" style="overflow: hidden;">
					<iframe src="https://go.pardot.com/l/20752/2013-06-19/j19m?' . $url_utmz . $geoIP . '" class="span12" width="100%" height="650" type="text/html" frameborder="0" allowTransparency="true" style="border: 0; margin-left:-15px;"></iframe>



				</div>
			</div>
		</div>
	</div>


<div class="wrap container">
	<div class="content row-fluid">
		<div class="main span12" role="main">
			 <div class="span10 offset1">
				<div class="pf-component">
	' . $modal . '
	';

/*

DISABLED ON 4/28/2014 BECAUSE FORM WASN'T PREFILLING WITH AUGMENT VALUES

// if ppc, squeeze them
// for testing
//if ( is_user_logged_in() ) {
$return .= $squeeze.$squeeze_js;
//}
 */
		return $return;

	}

}

add_shortcode('expert', 'tz_expert');

?>
