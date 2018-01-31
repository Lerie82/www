<?php
/**
 * Plugin Name: LT's Location Plugin
 * Plugin URI: http://lerietaylor.com
 * Description: Manage locations of your business on Google Maps
 * Version: 1.0.0
 * Author: Lerie Taylor
 * Author URI: http://lerietaylor.com
 * License: GPL2
 */

add_action('admin_menu', 'ltlocation_plugin_menu');
function ltlocation_plugin_menu()
{
	add_menu_page('Map Location Settings', 'Location Settings', 'administrator', 'ltlocation_plugin_settings_page', 'ltlocation_plugin_settings_page', 'dashicons-admin-generic');
}

add_action('admin_init', 'ltlocation_plugin_settings');
function ltlocation_plugin_settings()
{
	register_setting('ltlocation-plugin-settings-group', 'ltlocation_client_id');
	register_setting('ltlocation-plugin-settings-group', 'ltlocation_client_secret');
}

function ltlocation_plugin_settings_page()
{
	echo '
	<div class="wrap">
	<h2>Location Settings</h2>

	<form method="post" action="options.php">';

	    settings_fields("ltlocation-plugin-settings-group");
	    do_settings_sections("ltlocation-plugin-settings-group");
	    
	    echo '<h2>Add New Location</h2>
	    	<table class="form-table">
	        <tr valign="top">
		        <th scope="row">Location Name</th>
		        <td><input type="text" name="client_id" value="'.esc_attr(get_option('ltlocation_client_id')).'" /></td>
	        </tr>
	         
	        <tr valign="top">
		        <th scope="row">Client Secret</th>
		        <td><input type="text" name="client_secret" value="'.esc_attr(get_option('ltlocation_client_secret')).'" /></td>
	        </tr>
	    	</table>
	    ';

	    submit_button();
}

?>