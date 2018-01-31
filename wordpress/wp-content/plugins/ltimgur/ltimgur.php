<?php
/**
 * Plugin Name: LT's Imgur Plugin
 * Plugin URI: http://lerietaylor.com
 * Description: Integrate Imgur API into your Wordpress blog
 * Version: 1.0.0
 * Author: Lerie Taylor
 * Author URI: http://lerietaylor.com
 * License: GPL2
 */

add_action('admin_menu', 'ltimgur_plugin_menu');
function ltimgur_plugin_menu()
{
	add_menu_page('Imgur Settings', 'Imgur Settings', 'administrator', 'ltimgur_plugin_settings_page', 'ltimgur_plugin_settings_page', 'dashicons-admin-generic');
}

add_action('admin_init', 'ltmgur_plugin_settings');
function ltimgur_plugin_settings()
{
	register_setting('ltimgur-plugin-settings-group', 'ltimgur_client_id');
	register_setting('ltimgur-plugin-settings-group', 'ltimgur_client_secret');
}

function ltimgur_plugin_settings_page()
{
	echo '
	<div class="wrap">
	<h2>Staff Details</h2>

	<form method="post" action="options.php">';

	    settings_fields("ltimgur-plugin-settings-group");
	    do_settings_sections("ltimgur-plugin-settings-group");
	    
	    echo '<table class="form-table">
	        <tr valign="top">
	        <th scope="row">Client ID</th>
	        <td><input type="text" name="client_id" value="'.esc_attr(get_option('ltimgur_client_id')).'" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">Client Secret</th>
	        <td><input type="text" name="client_secret" value="'.esc_attr(get_option('ltimgur_client_secret')).'" /></td>
	        </tr>
	    </table>
	    ';

	    submit_button();
}

?>