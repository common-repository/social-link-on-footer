<?php 

function slfplugin_add_footer($content){

	global $slfplugin_options;

	$footer_output = '<hr>';
	$footer_output .= '<div class="footer_content">';
	$footer_output .= '<span class="dashicons dashicons-facebook"></span> Find me on Facebook <a href="https://www.facebook.com/'.$slfplugin_options['facebook_url'].'" target="_blank" style="color:'.$slfplugin_options['link_color'].'">Facebook</a> ';
	$footer_output .= '</div>';

	if ($slfplugin_options['show_in_feed']) {
		if (is_single() || is_home() && $slfplugin_options['enable']) {
			return $content.$footer_output;
		}
	}else{
		if (is_single() && $slfplugin_options['enable']) {
			return $content.$footer_output;
		}
	}

	
	return $content;
	
}

add_filter('the_content', 'slfplugin_add_footer');