<?php
/**
 * Plugin Name: LT's Openload Plugin
 * Plugin URI: http://lerietaylor.com
 * Description: Integrate Openload API into your Wordpress blog
 * Version: 1.0.0
 * Author: Lerie Taylor
 * Author URI: http://lerietaylor.com
 * License: GPL2
 */

add_action('admin_menu', 'ltoload_menu');
function ltoload_menu()
{
	add_menu_page('Openload', 'Openload', 'administrator', 'ltoload_plugin_settings_page', 'ltoload_plugin_settings_page', 'dashicons-admin-generic');
}

add_action('admin_init', 'ltoload_plugin_settings');
function ltoload_plugin_settings()
{
	register_setting('ltoload-plugin-settings-group', 'ltoload_login');
	register_setting('ltoload-plugin-settings-group', 'ltoload_key');
	register_setting('ltoload-plugin-settings-group', 'ltoload_email');
	register_setting('ltoload-plugin-settings-group', 'ltoload_bal');
}

function ltoload_plugin_settings_page()
{
	echo '
	<div class="wrap">
	<h2>Openload</h2>

	<form method="post" action="options.php">';

	    settings_fields("ltoload-plugin-settings-group");
	    do_settings_sections("ltoload-plugin-settings-group");
	    
	    echo '<table class="form-table">
	        <tr valign="top">
	        <th scope="row">Login</th>
	        <td><input type="text" name="ltoload_login" value="'.esc_attr(get_option('ltoload_login')).'" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">API Key</th>
	        <td><input type="text" name="ltoload_key" value="'.esc_attr(get_option('ltoload_key')).'" /></td>
	        </tr>
	        </table>';

	    submit_button();

	    $oload = new Oload();
	    $oload->login = get_option('ltoload_login');
	    $oload->key = get_option('ltoload_key');
	    $oload->listFolder();

	    echo '<ul>';
	    foreach($oload->folders as $folder)
	    {
	    	echo '<li><a href="#" onclick="showFolder('.$folder->id.')">'.$folder->name.'</a></li>';
	    }
	    echo '</ul>';

	    //$body = json_decode(wp_remote_retrieve_body($req));

	    //update_option('ltoload_email', $body->result->email);
	    //update_option('ltoload_bal', $body->result->balance);
}

class Oload
{
	private $url;
	public $login;
	public $key;
	public $req;
	public $folders = array();

	function __construct()
	{
		//
	}

	function getInfo()
	{
		$this->url = "https://api.openload.co/1/account/info?login=".$this->login."&key=".$this->key;
		$this->makeReq();
		return $this->req->body;
	}

	function listFolder($folder=null)
	{
		if($folder != null)
		{
			$this->url = "https://api.openload.co/1/file/listfolder?login=".$this->login."&key=".$this->key."&folder=".$folder;
		} else {
			$this->url = "https://api.openload.co/1/file/listfolder?login=".$this->login."&key=".$this->key;
		}

		$this->makeReq();
		$this->folders = json_decode($this->req['body'])->result->folders;
	}

	function makeReq()
	{
		try
		{
			$this->req = wp_remote_get($this->url, array('httpversion' => '1.1', 'timeout' => 120));
		} catch(Exception $ex)
		{
			die(var_dump($ex));
		}
	}
}

?>