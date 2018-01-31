<?php
/**
 * Plugin Name: LT's Dropbox Plugin
 * Plugin URI: http://lerietaylor.com
 * Description: Integrate Dropbox API into your Wordpress blog
 * Version: 1.0.0
 * Author: Lerie Taylor
 * Author URI: http://lerietaylor.com
 * License: GPL2
 */

add_action('admin_menu', 'ltdbpress_plugin_menu');
function ltdbpress_plugin_menu()
{
	add_menu_page('Dropbox Settings', 'Dropbox Settings', 'administrator', 'ltdbpress_plugin_settings_page', 'ltdbpress_plugin_settings_page', 'dashicons-admin-generic');
}

add_action('admin_init', 'ltdbpress_plugin_settings');
function ltdbpress_plugin_settings()
{
	register_setting('ltdbpress-plugin-settings-group', 'ltdbpress_client_id');
	register_setting('ltdbpress-plugin-settings-group', 'ltdbpress_redirect_uri');
	register_setting('ltdbpress-plugin-settings-group', 'ltdbpress_auth_token');
}

function ltdbpress_plugin_settings_page()
{
	if(@$_GET['oauth'] && get_option('ltdbpress_client_id') != "")
	{
		$req = wp_remote_get("https://www.dropbox.com/oauth2/authorize/?response_type=token&client_id=".get_option('ltdbpress_client_id')."&redirect_uri=".get_option('ltdbpress_redirect_uri'),
			array(
				'timeout' => 120
			)
		);
	}

	echo '
	<div class="wrap">
	<h2>Dropbox Settings</h2>';

	echo '
	<form method="post" action="options.php">';

	    settings_fields("ltdbpress-plugin-settings-group");
	    do_settings_sections("ltdbpress-plugin-settings-group");
	    
	    echo '<table class="form-table">
	        <tr valign="top">
	        <th scope="row">Client ID (API Key)</th>
	        <td><input type="text" name="ltdbpress_client_id" value="'.esc_attr(get_option('ltdbpress_client_id')).'" /></td>
	        </tr>

	        <tr valign="top">
	        <th scope="row">Redirect URI</th>
	        <td><input type="text" name="ltdbpress_redirect_uri" value="'.esc_attr(get_option('ltdbpress_redirect_uri')).'" /></td>
	        </tr>

	        <tr valign="top">
	        <th scope="row">OAuth 2 Token</th>
	        <td><input type="text" name="ltdbpress_auth_token" value="'.esc_attr(get_option('ltdbpress_auth_token')).'" /></td>
	        </tr>
	    </table>
	    ';

	    submit_button();

	    echo '<hr />';
	    if(get_option('ltdbpress_client_id') != "")
	    {
			$req = wp_remote_post("https://api.dropboxapi.com/2/file_requests/list",
				array(
					'timeout' => 120,
					'headers' => array('Authorization' => get_option('ltdbpress_auth_token'))
				)
			);

			die(var_dump($req));
	    }
}

?>