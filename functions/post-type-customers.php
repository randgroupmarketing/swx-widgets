<?php

/*-----------------------------------------------------------------------------------*/
/*	Add custom post type for Customers Pages
/*-----------------------------------------------------------------------------------*/

add_action('init', 'customers_register');
function customers_register() {
	$args = array(
		'label' => __('Case Studies'),
		'singular_label' => __('Case Study'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'page',
		'hierarchical' => false,
		'menu_icon' => plugins_url('/images/icons/case-studies.png', dirname(__FILE__)),
		'rewrite' => array('with_front' => false, 'slug' => 'case-studies'),
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
		//'taxonomies' => array('category', 'post_tag')
	);
	register_post_type('customers', $args);
}

// Show Meta-Box for Customers

add_action('admin_init', 'customers_create');

function customers_create() {
	add_meta_box('customers_meta', 'Case Studies', 'customers_meta', 'customers', 'normal', 'high');
}

function customers_meta() {

	// - grab data -

	global $post;
	$custom = get_post_custom($post->ID);
	$customers_url_copy = $custom["customers_url_copy"][0];
	$products = $custom["products"][0];
	$industries = $custom["industries"][0];

	// - security -

	echo '<input type="hidden" name="customers-nonce" id="customers-nonce" value="' .
	wp_create_nonce('customers-nonce') . '" />';

	// - output -

	?>
	<div class="meta-box customers-meta">
	<ul>
		<li><label>Client Company Name: </label><input name="customers_url_copy" value="<?php echo $customers_url_copy; ?>" size="100" /> </li>
		<li><label>Industries: </label><input name="industries" value="<?php echo $industries; ?>" size="100" /> <em>(optional)</em></li>
		<li><label>Solutions: </label><input name="products" value="<?php echo $products; ?>" size="100" /> <em>(optional)</em></li>
	</ul>
	</div>

	<?php

}

// Save Data

add_action('save_post', 'save_customers');

function save_customers() {

	global $post;

	// - still require nonce

	if (!wp_verify_nonce($_POST['customers-nonce'], 'customers-nonce')) {
		return $post->ID;
	}

	if (!current_user_can('edit_post', $post->ID)) {
		return $post->ID;
	}

	if (!isset($_POST["customers_url_copy"])):
		return $post;
	endif;
	$customers_url_copy = $_POST["customers_url_copy"];
	update_post_meta($post->ID, "customers_url_copy", $customers_url_copy);

	if (!isset($_POST["industries"])):
		return $post;
	endif;
	$industries = $_POST["industries"];
	update_post_meta($post->ID, "industries", $industries);

	if (!isset($_POST["products"])):
		return $post;
	endif;
	$products = $_POST["products"];
	update_post_meta($post->ID, "products", $products);

}

function customers_info($atts) {

	// - grab data -
	extract(shortcode_atts(array(
	), $atts));

	global $post;
	$custom = get_post_custom($post->ID);
	$customers_url_copy = $custom["customers_url_copy"][0];
	$industries = $custom["industries"][0];
	$products = $custom["products"][0];

	/*$msg = '<div class="meta">';
		// if(isset($customers_url)) { $msg .= '<p class="customer"><a href="'.$customers_url.'" target="_blank">'.$customers_url_copy.'</a></p>'; }
		if(isset($partner_url)) {
			$msg .= '<div class="partner"><p><strong>LS Retail Implementation Partner:</strong></p><p><a href="'.$partner_url.'" target="_blank">'.$partner_url_copy.'</a></p></div>';
		}
		$msg .= '</div>';
	*/
	return $msg;

}

add_shortcode('customers_info', 'customers_info'); // You can now call onto this shortcode with [customers_info]

//***********************************************************************************

/*
 * customers SHORTCODES (CUSTOM POST TYPE)
 * http://www.noeltock.com/web-design/wordpress/how-to-custom-post-types-for-customers-pt-2/
 * [customers]
 */

// 1) FULL customers
//***********************************************************************************

function customers($atts) {

	// - define arguments -
	extract(shortcode_atts(array(
		'limit' => '999', // # of customers to show
		'id' => null,
		'post_type' => 'customers',
		// 'orderby'=>'rand',
		'style' => 'default',
	), $atts));

	// ===== OUTPUT FUNCTION =====
	ob_start();

	// - query -
	$custom_posts = new WP_Query();
	if ($id == null) {
		$custom_posts->query('post_type=' . $post_type . '&posts_per_page=' . $limit);
	} else {
		$custom_posts->query('post_type=' . $post_type . '&posts_per_page=1&p=' . $id);
	}
	if ($custom_posts->have_posts()) {

		echo '<div class="row-fluid  ' . $style . '">';

		$i = 0;
		while ($custom_posts->have_posts()): $custom_posts->the_post();
			$content = get_the_content();
			$title = get_the_title();
			// - custom variables -
			$customers_url_copy = get_post_meta($custom_posts->post->ID, 'customers_url_copy', true);
			$industries = get_post_meta($custom_posts->post->ID, 'industries', true);
			$products = get_post_meta($custom_posts->post->ID, 'products', true);

			$synopsis = get_field('synopsis', $custom_posts->post->ID);

			?>

												<div class="row-fluid customer-row">
													<div class="span3">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail('thumb', array('class' => "img-responsive customer-logo"));?>
														<?php endif;?>
					</div>
					<div class="span9">

						<h3><?php echo $title; ?></h3>
						<div class="customer-desc"><?php echo $synopsis ? $synopsis : the_excerpt(); ?></div>
						<?php
// if either are set, show div
		if (strlen($products) > 2) {?>
							<p class="tags">Solutions: <strong><?php echo $products; ?></strong></p>
						<?php
}
		if (strlen($industries) > 2) {?>
							<p class="tags">Industries: <strong><?php echo $industries; ?></strong></p>
						<?php
}
		?>
						<div class="readmore"><a class="btn btn-info" href="<?php the_permalink();?>">Read More</a></div>
					</div>
				</div>


			<?php

		endwhile;
		echo '</div><!-- //row -->';

	} else {
		// no posts found
		echo "<p>No case studies found.</p>";
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	// ===== RETURN: FULL careers SECTION =====

	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}

add_shortcode('customers', 'customers'); // You can now call onto this shortcode with [customers limit='20']

//***********************************************************************************

/*
 * customers SHORTCODES (CUSTOM POST TYPE)
 * http://www.noeltock.com/web-design/wordpress/how-to-custom-post-types-for-customers-pt-2/
 * [customers]
 */

// 1) FULL customers
//***********************************************************************************

function customer_carousel($atts) {

	// - define arguments -
	extract(shortcode_atts(array(
		'limit' => '999', // # of customers to show
		'id' => null,
		'ids' => null,
		'post_type' => 'customers',
		// 'orderby'=>'rand',
		'style' => 'default',
	), $atts));

	/* code to explode id number list "123,134,243"
		$rows = explode("\n", $str);
					foreach($rows as $row) {
						$data = array_filter(explode(',', $row));
						// echo 'DATA<BR/>';
						// echo $data[0].' => '.$data[1];
						$cat_list[$data[0]] = rtrim($data[1]);
						// $cat_list['1'] = 'a';
						//array_push ($cat_list,$data[0],$data[1]);
						//$array1 .= $data[0].' => '.$data[1];
					}
	*/

	// ===== OUTPUT FUNCTION =====
	ob_start();

	// - query -
	$custom_posts = new WP_Query();
	if ($id != null) {
		$custom_posts->query('post_type=' . $post_type . '&posts_per_page=1&p=' . $id);
	} elseif ($ids != null) {
		/*
			$rows = explode(',', $ids);
			//print_r($id_numbers);
			$count = array_count_values($rows);
		*/
		$ids = array_map('intval', explode(',', $ids));
		// $custom_posts->query('post_type='.$post_type.'&posts_per_page='.$limit.'&post__in=array('.$ids.')');
		// $custom_posts->query(array( 'post__in' => $ids ));

		//$custom_posts = new WP_Query( array( 'post__in' => $ids ) );
		$custom_posts = new WP_Query(array(
			'post__in' => $ids,
			'post_type' => $post_type,
			// 'orderby' => 'post__in'
		));

	} else {
		$custom_posts->query('post_type=' . $post_type . '&posts_per_page=' . $limit);

	}

	//$rows = wp_count_posts($post_type);
	// $rows = count($custom_posts);
	$rows = $custom_posts->post_count;
	//debug
	// echo $rows;
	// echo '<pre>rows: '.$rows.'</pre>';
	if ($custom_posts->have_posts()) {
		echo '<div class="customer-carousel ' . $style . '">';
		echo '<div id="carousel-customers" class="carousel slide grayscale" data-ride="carousel">';
		echo '<div class="carousel-inner">';

		$i = 1;
		$row_count = 1;

		while ($custom_posts->have_posts()): $custom_posts->the_post();
			$title = get_the_title();

			// - custom variables -
			$customers_url = get_post_meta($custom_posts->post->ID, 'customers_url', true);
			$customers_url_copy = get_post_meta($custom_posts->post->ID, 'customers_url_copy', true);
			if (strlen($customers_url_copy) === 0) {$customers_url_copy = 'More Info';}

			if ($row_count == 1) {
				// echo 'true'.$row_count;
				if ($i == 1) {$class_active = 'active';} else { $class_active = '';}

				echo '<div class="item text-center ' . $class_active . '">';
				$row_count = 0;
			}

			//increment

			/*
					<script type="text/javascript">
						jQuery(document).ready(function($) {

							$("#carousel-example-generic").carousel('pause');

						});
				</script>
*/

			// debug
			/*
				echo 'class: '.$class_active.'<br/>';
				echo 'row count: '.$row_count.'<br/>';
				echo 'i: '.$i.'<br/>';
				echo '<br/>';
				*/
			?>




														<div class="col-sm-4 col-md-3 bigTargetBox customer-column">
															<div class="customer-item">

																<div class="customer-button">
																	<p class="text-center"><a class="btn btn-info bigTarget" href="<?php the_permalink();?>">Read Story</a></p>
																</div><!-- // customer-button -->
															</div><!-- // customer-item -->
														</div><!-- // customer-column -->




											<?php

			// add breaks

			// increment
			$i++;

			if ($i % 4 == 0) {
				// echo 'truth'.$i;
				echo '</div><!-- // item -->';
				// if there are still more rows, add another panel
				$row_count = 1;

			}

		endwhile;

		// if we didnt close item earlier, close it now
		if ($i % 4 != 0) {
			echo '</div><!-- // item -->';
			// if there are still more rows, add another panel

		}

		echo '</div><!-- // carousel inner -->';

		// if there are enough items to require a slide, add navigation
		if ($i > 4) {
			echo '    <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-customers" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-customers" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				  </a>';
		}
		echo '	</div><!-- // carousel -->';
		echo '</div>
		</div><!-- // customer-carousel -->';

	} else {
		// no posts found
		echo "<p>No customer stories found.</p>";
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	// ===== RETURN: FULL careers SECTION =====

	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}

add_shortcode('customer_carousel', 'customer_carousel'); // You can now call onto this shortcode with [customers limit='20']

//***********************************************************************************

/*
 * customers triple icon
 * http://www.noeltock.com/web-design/wordpress/how-to-custom-post-types-for-customers-pt-2/
 * [customers]
 */

// [customers3 id1="10181" id2="9958" id3="10178"]
//
//***********************************************************************************
/*
function customers3 ( $atts ) {

// - define arguments -
extract(shortcode_atts(array(
'limit' => '3', // # of customers to show
'id1' => '0',
'id2' => '0',
'id3' => '0',
'post_type' => 'customers',
// 'orderby'=>'rand',
'style' => 'default',
), $atts));

// ===== OUTPUT FUNCTION =====
ob_start();

// - query -

$args = array(
//'post__in' => array($id1, $id2, $id3)
'post__in' => array(10181, 9958, 10178)
);

$custom_posts = new WP_Query($args);

if ( $custom_posts->have_posts() ) {
echo '<div class="customers-list list '.$style.'">';
$i = 0;
while ($custom_posts->have_posts()) : $custom_posts->the_post();
$content = get_the_content();
$title = get_the_title();
// - custom variables -
$customers_url = get_post_meta( $custom_posts->post->ID, 'customers_url', true );
$customers_url_copy = get_post_meta( $custom_posts->post->ID, 'customers_url_copy', true );
if ( strlen($customers_url_copy) === 0 ) { $customers_url_copy = 'More Info'; }

// styling
if($style == 'inline') {

?>
<div class="row-fluid customer">
<div class="span4">
<?php if ( has_post_thumbnail()) : ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '<a href="'.$customers_url.'" class="no-border">';
}?>
<?php the_post_thumbnail('medium'); ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '</a>';
}?>
<?php endif; ?>
</div>
<div class="span8">
<h3><?php echo $title; ?></h3>
<?php echo '<p>'.$content.'</p>'; ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '<p><a class="btn" href="'.$customers_url.'">';
echo $customers_url_copy;
echo '</a></p>';
}?>

</div>
</div>

<?php
} else {
// default style
if($i>0) { echo '<div class="divideline"></div>'; }
$i++;

?>
<div class="row-fluid">
<div class="span4">
<?php if ( has_post_thumbnail()) : ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '<a href="'.$customers_url.'" class="no-border">';
}?>
<?php the_post_thumbnail('medium'); ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '</a>';
}?>
<?php endif; ?>
</div>
<div class="span8">
<h3><?php echo $title; ?></h3>
<?php echo '<p>'.$content.'</p>'; ?>
<?php if ( strlen( $customers_url) > 0 ) {
echo '<p><a class="btn" href="'.$customers_url.'">';
echo $customers_url_copy;
echo '</a></p>';
}?>

</div>
</div>

<?php

}

endwhile;
echo '</div>';

} else {
// no posts found
echo "<p></p>";
}
wp_reset_postdata();

// ===== RETURN: FULL careers SECTION =====

$output = ob_get_contents();
ob_end_clean();
return $output;

}

add_shortcode('customers3', 'customers3'); // You can now call onto this shortcode with [customers3 id1="11" id2="22" id3="33"]
 */

?>