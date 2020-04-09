<?php
/**
 *
 * @author      Mahotilo
 * @version     1.0
 */

defined('is_running') or die('Not an entry point...');

class LocalServerAlert {

  /* 
   * Typesetter Filter hook 
   */
  public static function PageRunScript($cmd) {
    global $page, $dirPrefix;
    if( \gp\tool::LoggedIn() ){
    	$Server_IP = $_SERVER['SERVER_ADDR'];
    	$User_IP = $_SERVER['REMOTE_ADDR'];
		$whitelist = array('127.0.0.1','::1');

		if ( !filter_var($Server_IP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) &&
			 in_array($User_IP, $whitelist)
		)
		{
			array_unshift($page->admin_links, '<i class="fa fa-laptop" style="font-size: x-large; vertical-align: bottom; padding: 0 5px; color: #ccddff;" title="The site is run on a local server. Server IP: '.$Server_IP.' User IP: '.$User_IP.'"></i>');
			$page->head .= '
			<style>
				#gp_admin_html #simplepanel .toolbar { 
					background-color: #303f9f;
				} 
			</style>
			';
		} else {
			array_unshift($page->admin_links, '<i class="fa fa-globe" style="font-size: x-large; vertical-align: bottom; padding: 0 5px;" title="The site is run on an online web server. Server IP: '.$Server_IP.' User IP: '.$User_IP.'"></i>');
		}   	
    }
    return $cmd;
  }
}