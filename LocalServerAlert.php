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
		if ( !filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) )
		{
			array_unshift($page->admin_links, '<i class="fa fa-lock" style="font-size: x-large; vertical-align: bottom;" title="The site is run on a local server" data-toggle="tooltip"></i>');
			$page->head .= '
			<style>
				#gp_admin_html #simplepanel .toolbar { 
					background-color: #303f9f;
				} 
			</style>
			';
		} else {
			array_unshift($page->admin_links, '<i class="fa fa-globe" style="font-size: x-large; vertical-align: bottom;" title="The site is run on an online web server" data-toggle="tooltip"></i>');
		}   	
    }
    return $cmd;
  }

}