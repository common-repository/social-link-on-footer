<?php 

function slfplugin_enqueue_style() {
	wp_enqueue_style('slfplugin-main-style', SLFPLUGIN_URL.'/css/style.css');
}

function slfplugin_enqueue_script() {
	wp_enqueue_script('slfplugin-main-script', SLFPLUGIN_URL.'/js/main.js');
}

add_action( 'wp_enqueue_scripts', 'slfplugin_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'slfplugin_enqueue_script' );