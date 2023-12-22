<?php

$css = null;

add_filter('template_include', function ($template) {

	global $css;

	$css = get_filename_from_template_path($template) . '.css';
    
	enqueue_public_style($css);

	return $template;
    
});

function get_filename_from_template_path($path) {

	$pieces = explode('/', $path);
	$file = array_pop($pieces);

	return substr($file, 0, -4);

}

function enqueue_public_style($css) {

	$style_path = PUBLIC_DIR . '/' . $css;
	$style_url = PUBLIC_URL . '/' . $css;

	if (file_exists($style_path)) {

		wp_enqueue_style('style', $style_url, array(), filemtime($style_path));

	}

}

function preload_style() {

	global $css;
    
	$style_path = PUBLIC_DIR . '/' . $css;

	if($css) {

		return PUBLIC_URL . '/' . $css . '?ver=' . filemtime($style_path);

	} 
    
    return false;

}