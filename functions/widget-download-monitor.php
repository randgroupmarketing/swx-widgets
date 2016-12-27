<?php

// ########################################################################
// Dynamically pull resources via Download Monitor plugin based on tags
// (which are set within Download Monitor) that match the slug (permalink)
// of the page the visitor is on.
// ########################################################################
// config
// basename returns the trailing section of the url
// eg: /solutions/gp/training/ it will return "training"

// wait until all plugins are loaded before loading this
function init_my_plugin() {
	// do init stuff
	if (!function_exists('get_downloads')) {
		return;

	} else {

		/* ############################################# */
		//  Determine site, customize functions based on site
		/* ############################################# */

		/*
			$blogurl = get_bloginfo( 'url', 'raw' );
			$blogurl_d101 = 'http://www.dynamics101.com';
			$blogurl_rg = 'https://www.randgroup.com';
		*/

		/* [list_downloads] */
		function list_downloads($atts, $content = null) {
			extract(shortcode_atts(array(
				"tag" => 'all',
			), $atts));

			$catname = basename(get_permalink());

			// match url to catid array

			$cat_list = array(

				// products
				"3" => "microsoft-dynamics-ax",
				"4" => "microsoft-dynamics-nav",
				"5" => "microsoft-dynamics-gp",
				"6" => "microsoft-dynamics-crm",
				"23" => "project-trax",
				"7" => "microsoft-sharepoint",
				"8" => "sql-server",
				"51" => "microsoft-azure-cloud",
				"57" => "bi360",
				"50" => "office-365",

				//industries
				"10" => "upstream-oil-gas-software",
				"11" => "manufacturing-software",
				"12" => "distribution-software",
				"13" => "construction-software",
				"14" => "professional-services-software",
				"52" => "engineering-procurement-and-construction-software",

				"25" => "business-intelligence-software",

				// services
				"26" => "application-development",
				"27" => "sales-marketing",
				"29" => "it-services",
				"30" => "erp-selection",
				"31" => "user-experience-design",
				"32" => "erp-implementation",
				"53" => "it-strategy-consulting-services",

				// solutions
				"44" => "sales-tax-automation-software",

			);

			// look for trailing folder first, then look for parent folders
			$catid = array_search($catname, $cat_list);
			// if not found, look at each folder in url for a match
			if (empty($catid)) {
				// explode url into array
				$url = get_permalink();
				$parsed_url = parse_url($url);
				$sub_folder = explode('/', $parsed_url['path']);
				$domain = $parsed_url['scheme'] . '://' . $parsed_url['host'];
				$folder = "";
				$max = count($sub_folder);
				// check each sub folder
				for ($i = 0; $i < $max; $i++) {
					// once we find a match, don't overwrite it
					if (empty($temp_catid)) {
						$sub_folder_to_search = $sub_folder[$i];
						$temp_catid = array_search($sub_folder_to_search, $cat_list);
						//echo "no".$sub_folder[$i].": ".$temp_catid."<br/>";
					} else {
						$catid = $temp_catid;
						//echo "yes".$sub_folder[$i].": ".$temp_catid."<br/>";
					}
				}
			}

			// debug
			// echo $catname;
			// echo $catid;
			// don't forget, [list_downloads] required on page
			// only assets that match tags will show up

			if (!is_null($catid)) {

				$orderby = 'date';
				$qty = 99;
				$char_count = 105;
				$char_count_video = 999;
				$css_span = 'span4';
				$icon = '<i class="icon-download-alt"></i> ';
				$icon_video = '<i class="icon-play"></i> ';
				$path = get_bloginfo('template_directory');
				$title = get_the_title() . ' ';

				$breakpoint = 6;

				$dl = get_downloads('limit=' . $qty . '&category=' . $catid . '&order=desc&orderby=' . $orderby);
				if (!empty($dl)) {

					// build and process (ASC or desc)
					/*
					$dl_assessment = get_downloads('limit='.$qty.'&category='.$catid.'&tags=assessment&order=desc&orderby='.$orderby);
					$dl_assessment_count = count($dl_assessment);
					$dl_demo = get_downloads('limit='.$qty.'&category='.$catid.'&tags=demo&order=desc&orderby='.$orderby);
					$dl_demo_count = count($dl_demo);
					$dl_webinar = get_downloads('limit='.$qty.'&category='.$catid.'&tags=webinar&order=desc&orderby='.$orderby);
					$dl_webinar_count = count($dl_webinar);
					$dl_whitepaper = get_downloads('limit='.$qty.'&category='.$catid.'&tags=whitepaper&order=desc&orderby='.$orderby);
					$dl_whitepaper_count = count($dl_whitepaper);
					$dl_casestudy = get_downloads('limit='.$qty.'&category='.$catid.'&tags=case study&order=desc&orderby='.$orderby);
					$dl_casestudy_count = count($dl_casestudy);
					$dl_brochure = get_downloads('limit='.$qty.'&category='.$catid.'&tags=brochure&order=desc&orderby='.$orderby);
					$dl_brochure_count = count($dl_brochure);
					*/
					// output
					$buff = '';
					// $buff .= '</div></div></div></div><div class="row-fluid download_footer"><div class="container download_list">';
					$buff .= '<h3>Related Resources</h3>';

					// $buff .= '<ul class="nav nav-tabs">';
					// check if individual categories contain resources, if so show subnav
					$i = 0;
					// assessment
					if (!empty($dl)) {

						//$buff .= '<h4>Assessments</h4>';
						foreach ($dl as $d) {

							$i++;

							//if this is first value in row, create new row
							if ($i % 3 == 1) {
								// if this is the 3rd row, start hiding process
								if ($i > $breakpoint) {
									// $buff .= '<div class="row-fluid hidethis">';
									$buff .= '<div class="row-fluid sp-box hideThis">';
								} else {
									$buff .= '<div class="row-fluid sp-box">';
								}
							}

							$thumb = $d->thumbnail; //img_resize($d->thumbnail, 275, null);

							$buff .= '<div class="span4 equal click-div">';
							$buff .= '	<div class="box-link">';
							$buff .= '		<div class="clip"><img src="' . $thumb . '" width="275" alt="' . $d->title . '" /></div>';
							$buff .= '		<a href="/resources/?did=' . $d->id . '"><h4 class="resource-link">' . html_entity_decode($d->title) . '</h4></a>';
							$buff .= '		<p class="desc"><small>' . neat_trim($d->desc, $char_count) . '</small></p>';
							$buff .= '		<p><small>Downloads: ' . $d->hits . '</small></p>';
							// $buff .= '		<a class="btn btn-block" href="/resources/?did='.$d->id.'">Download</a>';
							$buff .= '	</div>';
							$buff .= '</div>';

							//if this is third value in row, end row
							if ($i % 3 == 0) {
								$buff .= '</div>';
							}

							// if after 6 items hide
							if (($dl > 3) && ($i == $breakpoint)) {
								$buff .= '<div class="row-fluid openRow">';
								$buff .= '	<div class="span12">';
								$buff .= '		<p><a class="openSlider btn btn-block btn-large btn-primary">View More Resources</a></p>';
								$buff .= '	</div>';
								$buff .= '</div><p>&nbsp;</p>';

							}

						}

					}

					/* $buff .= '<p><em><a href="/resources/?category='.$catid.'">View all '.$title.' resources.</a></em></p>'; */
					//$buff .= '</div></div></div><div class="row-fluid"><div class="container"><hr><div class="span9 offset3">';
					$buff .= '</div>';
					// collect buffer
					return $buff;
				}
			}
		}
		add_shortcode("list_downloads", "list_downloads");

		function latest_downloads($atts, $content = null) {
			extract(shortcode_atts(array(
				'qty' => 8,
				'columns' => 4,
			), $atts));

			$orderby = 'date';
			$char_count = 105;
			$char_count_video = 999;
			$css_span = 'span' . (floor(12 / $columns));
			$icon = '<i class="icon-download-alt"></i> ';
			$icon_video = '<i class="icon-play"></i> ';
			$path = get_bloginfo('template_directory');
			$title = get_the_title() . ' ';

			$breakpoint = $qty;

			$dl = get_downloads('limit=' . $qty . '&order=desc&orderby=' . $orderby);

			if (!empty($dl)) {

				// build and process (ASC or desc)
				// output
				$buff = '';

				$i = 0;
				if (!empty($dl)) {

					foreach ($dl as $d) {

						$i++;

						//if this is first value in row, create new row
						if ($i % $columns == 1) {
							// if this is the 3rd row, start hiding process
							if ($i > $breakpoint) {
								$buff .= '<div class="row-fluid sp-box hideThis">';
							} else {
								$buff .= '<div class="row-fluid sp-box">';
							}
						}

						$thumb = img_resize($d->thumbnail, 275, 138);

						$buff .= '<div class="' . $css_span . ' equal click-div">';
						$buff .= '	<div class="box-link">';
						$buff .= '		<div class="clip"><img src="' . $thumb . '" width="275" height="138" alt="' . $d->title . '" /></div>';
						$buff .= '		<a href="/resources/?did=' . $d->id . '"><h4 class="resource-link">' . html_entity_decode($d->title) . '</h4></a>';
						//$buff .= '		<p class="desc"><small>' . neat_trim($d->desc, $char_count) . '</small></p>';
						$buff .= '	</div>';
						$buff .= '</div>';

						//if this is third value in row, end row
						if ($i % $columns == 0) {
							$buff .= '</div>';
						}

						// if after 6 items hide
						/*if (($dl > $columns) && ($i == $breakpoint)) {
							$buff .= '<div class="row-fluid openRow">';
							$buff .= '	<div class="span12">';
							$buff .= '		<p><a class="openSlider btn btn-block btn-large btn-primary">View More Resources</a></p>';
							$buff .= '	</div>';
							$buff .= '</div><p>&nbsp;</p>';

						}*/

					}

				}

				$buff .= '</div>';
				// collect buffer
				return $buff;
			}
		}

		add_shortcode("latest_downloads", "latest_downloads");

		/* [list_download] for individual downloads */
		function list_download($atts, $content = null) {
			extract(shortcode_atts(array(
				"id" => null,
				"headline" => null,
				"verb" => 'Download',
				"tag" => 'all',
				"popover" => "no",
				"popover_delay" => 3,
			), $atts));

			$char_count = 135;
			$format_url = 7;
			$format_image = 6;
			$format_title = 8;
			$format_description = 10;
			$format_count = 9;
			$format_category = 15;
			$format_tags = 14;
			$path = get_bloginfo('template_directory');

			// for videos
			if (strpos($verb, 'Watch') !== false) {
				$icon = '<i class="icon-play"></i> ';
				$col1 = 'span5';
				$col2 = 'span7';
				$downloadCSS = 'downloadVideo';
			}

			// quizes Assessment
			elseif (strpos($verb, 'Assessment') !== false) {
				$icon = '<i class="icon-download-alt"></i> ';
				$iconwhite = '<i class="icon-white icon-download-alt"></i> ';
				$col1 = 'span5';
				$col2 = 'span7';

				$downloadCSS = 'downloadVideo';
			} else {
				$icon = '<i class="icon-download-alt"></i> ';
				$col1 = 'span5 download-clip';
				$col2 = 'span7';
				$downloadCSS = 'downloadLink';
			}

			$modalclass = "";
			if ($popover === "yes") {
				$modalclass = 'modal_clone';
			}

			$buff = "";
			//  download_cta
			$buff .= '<div class="row box-link ' . $modalclass . '">';
			$buff .= '	<div class="' . $col2 . '">';
			$buff .= '		<h4 style="text-align: left;">' . $headline . '</h4>';
			// $buff .= '		<h5>'.do_shortcode('[download id="'.$id.'" format="'.$format_title.'"]').'</h5>';
			$buff .= '		<p class="description">' . neat_trim_code(do_shortcode('[download id="' . $id . '" format="' . $format_description . '"]'), $char_count) . '</p>';
			//$buff .= '		<p class="description">'.do_shortcode('[download id="'.$id.'" format="'.$format_description.'"]').'</p>';
			// $buff .= '		<p><a href="'.do_shortcode('[download id="'.$id.'" format="'.$format_url.'"]').'" class="btn">'.$icon.$verb.' "'.do_shortcode('[download id="'.$id.'" format="'.$format_title.'"]').'"</a></p>';

			// <i class="icon-thumbs-up"></i>
			$buff .= '		<p><small>' . do_shortcode('[download id="' . $id . '" format="' . $format_count . '"]') . '</small></p>';
			$buff .= '		<p><a href="' . do_shortcode('[download id="' . $id . '" format="' . $format_url . '"]') . '" class="btn btn-large">' . $icon . $verb . '</a></p>';
			$buff .= '	</div>';
			$buff .= '	<div class="' . $col1 . '">';
			$buff .= '		<a href="' . do_shortcode('[download id="' . $id . '" format="' . $format_url . '"]') . '" class="' . $downloadCSS . ' text-center">' . do_shortcode('[download id="' . $id . '" format="' . $format_image . '"]') . '</a>';
			$buff .= '	</div>';
			$buff .= '</div>';

			$squeeze = '';
			$squeeze_js = '';

			if ($popover === "yes") {
				$buff2 = "";
				$buff2 .= '<div class="row-fluid ' . $modalclass . '">';
				$buff2 .= '	<h3>' . $headline . '</h3>';
				$buff2 .= '	<div class="col-md-3" style="display:inline-block; padding:12px;">';
				$buff2 .= '		<a href="' . do_shortcode('[download id="' . $id . '" format="' . $format_url . '"]') . '" class="' . $downloadCSS . ' text-center">' . do_shortcode('[download id="' . $id . '" format="' . $format_image . '"]') . '</a>';
				$buff2 .= '	</div>';
				$buff2 .= '	<div class="col-md-3"  style="display:inline-block; padding:4px;" >';
				$buff2 .= '		<p class="meta"><i class="icon-thumbs-up"></i> ' . do_shortcode('[download id="' . $id . '" format="' . $format_count . '"]') . '</p>';
				$buff2 .= '		<p class="meta"><i class="icon-th-list"></i> ' . do_shortcode('[download id="' . $id . '" format="' . $format_category . '"]') . '</p>';
				$buff2 .= '		<p class="meta"><i class="icon-tags"></i> ' . do_shortcode('[download id="' . $id . '" format="' . $format_tag . '"]') . '</p>';
				$buff2 .= '	</div>';
				$buff2 .= '	</div>';
				$buff2 .= '	<div class="">';
				// $buff .= '		<h5>'.do_shortcode('[download id="'.$id.'" format="'.$format_title.'"]').'</h5>';
				$buff2 .= '		<p class="description">' . neat_trim_code(do_shortcode('[download id="' . $id . '" format="' . $format_description . '"]'), $char_count) . '</p>';
				//$buff .= '		<p class="description">'.do_shortcode('[download id="'.$id.'" format="'.$format_description.'"]').'</p>';
				// $buff .= '		<p><a href="'.do_shortcode('[download id="'.$id.'" format="'.$format_url.'"]').'" class="btn">'.$icon.$verb.' "'.do_shortcode('[download id="'.$id.'" format="'.$format_title.'"]').'"</a></p>';
				$buff2 .= '		<p style="text-align:center;"><a href="' . do_shortcode('[download id="' . $id . '" format="' . $format_url . '"]') . '" class="btn btn-large" style="color:white;background-image: linear-gradient(to bottom,#eb212e,#bb1a24);text-shadow: 0 1px 1px rgba(0,0,0,0.75);">' . $iconwhite . $verb . '</a></p>';

				$buff2 .= '	</div>';
				$buff2 .= '</div>';

				$time = $popover_delay * 1000;

				$squeeze = '
			  <!-- Squeeze Modal -->
			  <div class="modal fade" id="hanging-modal" tabindex="-1" role="dialog" aria-labelledby="squeezeModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			        </div>
				  <div class="modal-body">
				  		' . $buff2 . '
				  </div>
				  <div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			        </div>
			      </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			  </div><!-- /.modal -->';

				$squeeze_js = "
				  <script>
					jQuery(document).ready(function () {
							// debug
							// alert('yes');
							setTimeout(function() {
								jQuery('.modal_clone .btn .btn-large').addClass('btn-sample');
								jQuery('#hanging-modal').modal('show');

							}, " . $time . "); // milliseconds

					});
				  </script>";

			}

			return $buff . $squeeze . $squeeze_js;

		} // end list_download
		add_shortcode("list_download", "list_download");

	}
}
add_action('plugins_loaded', 'init_my_plugin');

/*

widget code

// output
$buff = '<div class="widget"><div class="wrap">';
$buff .= '<h4><span>Related Resources</span></h4>';
$buff .= '<div class="textwidget">';
$buff .= '<ul class="dlm_download_list">';
// check if individual categories contain resources, if so show subnav
// white papers
$dl = get_downloads('limit='.$qty.'&category=3&tags='.$tag.'&order=ASC&orderby='.$orderby);
if (!empty($dl)) {
$buff .= '<li><h5>Whitepapers</h5>';
$buff .= '<ul>';
foreach($dl as $d) {
$buff .= '<h5><a href="/resources/?did='.$d->id.'" title="'.$d->title.'" class="downloadLink download'.$d->id.'"><img src="'.$d->thumbnail.'" alt="'.$d->title.'" />'.$d->title.'</a></h5>';
}
$buff .= '</ul></li>';
}
// case studies
$dl = get_downloads('limit='.$qty.'&category=2&tags=case study&order=ASC&orderby='.$orderby);
if (!empty($dl)) {
$buff .= '<li><h5>Case Studies</h5>';
$buff .= '<ul>';
foreach($dl as $d) {
$path = get_bloginfo('template_directory');
$buff .= '<h5><a href="/resources/?did='.$d->id.'" title="'.$d->title.'" class="downloadLink download'.$d->id.'"><img src="'.$d->thumbnail.'" alt="'.$d->title.'" />'.$d->title.'</a></h5>';
}
$buff .= '</ul></li>';
}
// Brochure
$dl = get_downloads('limit='.$qty.'&category=4&tags=brochure&order=ASC&orderby='.$orderby);
if (!empty($dl)) {
$buff .= '<li><h5>Brochures</h5>';
$buff .= '<ul>';
foreach($dl as $d) {
$path = get_bloginfo('template_directory');
$buff .= '<h5><a href="/resources/?did='.$d->id.'" title="'.$d->title.'" class="downloadLink download'.$d->id.'"><img src="'.$d->thumbnail.'" alt="'.$d->title.'" />'.$d->title.'</a></h5>';
}
$buff .= '</ul></li>';
}
// demos
$dl = get_downloads('limit='.$qty.'&category=5&tags=demo&order=ASC&orderby='.$orderby);
if (!empty($dl)) {
$buff .= '<li><h5>Demos</h5>';
$buff .= '<ul>';
foreach($dl as $d) {
$path = get_bloginfo('template_directory');
$buff .= '<h5><a href="/resources/?did='.$d->id.'" title="'.$d->title.'" class="downloadLink download'.$d->id.'"><img src="'.$d->thumbnail.'" alt="'.$d->title.'" />'.$d->title.'</a></h5>';
}
$buff .= '</ul></li>';
}

$buff .= '<br class="clear" />';
$buff .= '</ul>';
$buff .= '</div>';
$buff .= '</div></div><!--widget-->';

 */

/*-----------------------------------------------------------------------------------*/
/*	 WP Download Monitor Hacks
/*   http://wordpress.org/support/topic/seo-titles-for-download-monitor-file-and-category-pages
/*   Usage: Title rewrite
/*-----------------------------------------------------------------------------------*/

function img_resize($imageURL, $width, $height, $crop = false) {
	$imageBase = str_replace(basename($imageURL), '', $imageURL);
	$imageURLParts = parse_url($imageURL);
	$imagePath = $_SERVER['DOCUMENT_ROOT'] . $imageURLParts['path'];

	if (!is_file($imagePath)) {
		return false;
	}

	$originalSize = getimagesize($imagePath);

	if ($originalSize[0] <= $width) {
		return $imageURL;
	}

	if (!$height) {
		$height = round($originalSize[1] / $originalSize[0] * $width);
	}

	$pathInfo = pathinfo($imagePath);
	$resizedImageFileName = $pathInfo['filename'] . '-' . $width . 'x' . $height . '.' . $pathInfo['extension'];
	$resizedImageURL = $imageBase . $resizedImageFileName;
	$resizedImagePath = $pathInfo['dirname'] . '/' . $resizedImageFileName;

	if (is_file($resizedImagePath)) {
		return $resizedImageURL;
	}

	$editor = wp_get_image_editor($imagePath);

	if (is_wp_error($editor)) {
		return false;
	}

	$editor->resize($width, $height, $crop ? array('center', 'center') : false);
	$editor->save($resizedImagePath);

	return $resizedImageURL;
}
