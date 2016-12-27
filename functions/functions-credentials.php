<?php

/*-----------------------------------------------------------------------------------*/
/*	Credentials and Awards
/*-----------------------------------------------------------------------------------*/


   


function credentials($atts, $content = null) {  
    extract(shortcode_atts(array(  
		"size" => 'short',
		"class" => 'default',
    ), $atts));  
	
	if($size != 'short') { 
		
	}
	
	
	$path = get_template_directory_uri;
	
	// Output
	
	ob_start();
	
	// 
	if($size != 'short') { 
		
	}
	?>



	<div class="container credentials">
		<div class="row">
			<div class="span8">

					<div class="span4"><img src="https://www.randgroup.com/wp-content/uploads/2014/06/MSFT-Pinpoint.png"></div>
					<div class="span4"><img src="https://www.randgroup.com/wp-content/uploads/2016/05/presidents-club-stacked_2014.jpg"></div>
					<div class="span4"><img src="https://www.randgroup.com/wp-content/uploads/2016/05/2015-varstar-bobscott.png"></div>						
			
			</div>
		</div>
	</div>


	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;	


}  
add_shortcode("credentials", "credentials");  


?>
