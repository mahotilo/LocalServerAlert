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
    	$IP = $_SERVER['SERVER_ADDR'];
		if ( !filter_var($IP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) )
		{
			array_unshift($page->admin_links, '<i class="fa fa-laptop" style="font-size: x-large; vertical-align: bottom; padding: 0 5px; color: #ccddff;" title="The site is run on a local server: '.$IP.'"></i>');
			$page->head .= '
			<style>
				#gp_admin_html #simplepanel .toolbar { 
					background-color: #303f9f;
				} 
			</style>
			';
		} else {
			array_unshift($page->admin_links, '<i class="fa fa-globe" style="font-size: x-large; vertical-align: bottom; padding: 0 5px;" title="The site is run on an online web server: '.$IP.'"></i>');
		}   	
    }
    return $cmd;
  }
}