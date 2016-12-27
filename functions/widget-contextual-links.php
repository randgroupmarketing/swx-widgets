<?php
/*-----------------------------------------------------------------------------------*/
/*	 REQUIRED Micro Functions et ID/Name/Slug of parent category 
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	 List Contextual Links Widget Class
/*-----------------------------------------------------------------------------------*/

class list_links_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function list_links_widget() {
        parent::WP_Widget(false, $name = 'List Contextual Links');
    }
 
	/** @see WP_Widget::widget -- do not rename this */
	function widget($args, $instance) {
		extract( $args );
		$number 	= $instance['number']; // the number of categories to show
		$taxonomy 	= $instance['taxonomy']; // the taxonomy to display				
		$cat = get_the_category(); // get applicable categories	
		
		$cat_parent = get_parent_id($cat); // get id of parent category
		// if no posts in the parent category, don't show categories
		if($cat_parent === 0) { exit; }
		$cat_parent_id = $cat_parent[0];
		$cat_parent_slug = $cat_parent[1];
		$cat_parent_name = $cat_parent[2];
		// debug 
		/*
			echo 'Value: '.$cat_parent_id;
			echo 'Value: '.$instance['title'];
			print_r($cat_parent);
		*/
		if(strlen($instance['title']) > 2) { 
			$title 		= apply_filters('widget_title', $instance['title'] ); // the widget title
		} else { 
			$title 		= apply_filters('widget_title', " Product Info"); // the widget title
		}
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy,
			'child_of'  => $cat_parent_id
		);
		
		// retrieves an array of categories or taxonomy terms
		// $cats = get_categories($args);
		
		// match info for each category
		
		if($cat_parent_slug == 'microsoft-dynamics-ax') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-ax/';
		} elseif($cat_parent_slug == 'microsoft-dynamics-gp') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-gp/';
		} elseif($cat_parent_slug == 'microsoft-dynamics-nav') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-nav/';
		} elseif($cat_parent_slug == 'microsoft-crm') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-crm/';
		} elseif($cat_parent_slug == 'sharepoint') { 
			$product_info = '';
			$product_link = 'microsoft-sharepoint/';
		} elseif($cat_parent_slug == 'sql-server') { 
			$product_info = '';
			$product_link = 'sql-server/';
		} else { 
			$product_info = '';
			$product_link = '';
		
		}
		
		?>
			  <?php echo $before_widget; ?>
				  <?php if ( $title ) { echo $before_title . $title . $after_title; } ?>
						<ul>
							<li><a href="https://www.randgroup.com/software/<?php echo $product_link; ?>" title="<?php echo $cat_parent_name; ?> Consultants in Dallas &amp; Houston, TX"><?php echo $cat_parent_name; ?> Consultants</a></li>
							
						</ul>
			  <?php echo $after_widget; ?>
		<?php
	}
 
	/** @see WP_Widget::update -- do not rename this */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		$instance['taxonomy'] = $new_instance['taxonomy'];
		return $instance;
	}
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
 
        $title 		= esc_attr($instance['title']);
        $number		= esc_attr($instance['number']);
        $exclude	= esc_attr($instance['exclude']);
        $taxonomy	= esc_attr($instance['taxonomy']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of categories to display'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>	
			<label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Choose the Taxonomy to display'); ?></label> 
			<select name="<?php echo $this->get_field_name('taxonomy'); ?>" id="<?php echo $this->get_field_id('taxonomy'); ?>" class="widefat"/>
				<?php
				$taxonomies = get_taxonomies(array('public'=>true), 'names');
				foreach ($taxonomies as $option) {
					echo '<option id="' . $option . '"', $taxonomy == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				?>
			</select>		
		</p>
        <?php
    }
 
 
} // end class list_links_widget
add_action('widgets_init', create_function('', 'return register_widget("list_links_widget");'));




/*-----------------------------------------------------------------------------------*/
/*	 Show Contextual Link
/*   Usage: shortcode
/*   Example: [salesworks size=""]
/*-----------------------------------------------------------------------------------*/

function context_link($atts, $content = null) {  
    extract(shortcode_atts(array(  
		"size" => 'short',
    ), $atts));  
	
		$cat = get_the_category(); // get applicable categories	
		
		$cat_parent = get_parent_id($cat); // get id of parent category
		// if no posts in the parent category, don't show categories
		if($cat_parent === 0) { exit; }
		$cat_parent_id = $cat_parent[0];
		$cat_parent_slug = $cat_parent[1];
		$cat_parent_name = $cat_parent[2];
		// debug 
		/*
			echo 'Value: '.$cat_parent_id;
			echo 'Value: '.$instance['title'];
			print_r($cat_parent);
		*/
		if(strlen($instance['title']) > 2) { 
			$title 		= apply_filters('widget_title', $instance['title'] ); // the widget title
		} else { 
			$title 		= apply_filters('widget_title', " Need A Hand?"); // the widget title
		}
		$args = array(
			'number' 	=> $number,
			'taxonomy'	=> $taxonomy,
			'child_of'  => $cat_parent_id
		);
		
		// retrieves an array of categories or taxonomy terms
		// $cats = get_categories($args);
		
		// match info for each category
		
		if($cat_parent_slug == 'microsoft-dynamics-ax') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-ax/';
		} elseif($cat_parent_slug == 'microsoft-dynamics-gp') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-gp/';
		} elseif($cat_parent_slug == 'microsoft-dynamics-nav') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-nav/';
		} elseif($cat_parent_slug == 'microsoft-crm') { 
			$product_info = '';
			$product_link = 'microsoft-dynamics-crm/';
		} elseif($cat_parent_slug == 'sharepoint') { 
			$product_info = '';
			$product_link = 'microsoft-sharepoint/';
		} elseif($cat_parent_slug == 'sql-server') { 
			$product_info = '';
			$product_link = 'sql-server/';
		} else { 
			$product_info = '';
			$product_link = '';
		
		}
		

		$output = 'Need More Info?<br/><a href="https://www.randgroup.com/software/'.$product_link.'" title="'.$cat_parent_name.' Consultants in Dallas &amp; Houston, TX">Speak to a '.$cat_parent_name.' Consultant </a>';
	return $output;	


}  
add_shortcode("context_link", "context_link");  




?>