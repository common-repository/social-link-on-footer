<?php
/*
Plugin Name:  Social Link on Footer
Plugin URI:   https://example.com/plugins/the-basics/
Description:  Add Social profile link to the end of posts.
Version:      1.0.0
Author:       Apsara Aruna
Author URI:   https://profile.wordpress.org/apsaraaruna
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  slfplugin
 */

if (!defined('ABSPATH')) {
	die;
}

define( 'SLFPLUGIN_URL', plugin_dir_url( __FILE__ ) );

$slfplugin_options = get_option('slfplugin_settings');

require_once(plugin_dir_path(__FILE__).'/includes/social-link-on-footer-scripts.php');

require_once(plugin_dir_path(__FILE__).'/includes/social-link-on-footer-content.php');

if (is_admin()) {
	require_once(plugin_dir_path(__FILE__).'/includes/social-link-on-footer-settings.php');
}
