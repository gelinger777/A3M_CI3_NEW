<?php
/**
 * A3M (Account Authentication & Authorization) is a CodeIgniter 3.x package.
 * It gives you the CRUD to get working right away without too much fuss and tinkering!
 * Designed for building webapps from scratch without all that tiresome login / logout / admin stuff thats always required.
 *
 * @link https://github.com/donjakobo/A3M GitHub repository
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * End point for social providers return data
 * @package A3M
 * @subpackage Controllers
 */
class Connect_end extends CI_Controller
{
  /**
  * Constructor
  */
  function __construct()
  {
    parent::__construct();
    
    
       // Load the necessary stuff...
        $this->load->helper(array('language', 'account/ssl', 'url'));
        $this->load->library(array('account/Authentication', 'account/Authorization', 'account/Hybrid_auth_lib'));
        $this->load->model(array('account/Account_model', 'account/Account_details_model', 'account/Account_providers_model'));
        $this->load->language(array('general', 'account/connect_third_party'));
  }

  /**
   * Endpoint for Hybrid Auth connection
   */
  public function Index()
  {
    log_message('debug', 'controllers.HAuth.endpoint called.');
    log_message('debug', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

  	/*
  	 * @todo fix for CodeIgnter
  	 */
          if ($_SERVER['REQUEST_METHOD'] === 'GET')
          {
  	    log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
  	    $_GET = $_REQUEST;
          }

          log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
  	
  	/**
  	* HybridAuth
  	* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
  	* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
  	*/

  	// ------------------------------------------------------------------------
  	//	HybridAuth End Point
  	// ------------------------------------------------------------------------

  	require_once( APPPATH.'/third_party/Hybrid/Auth.php' );
  	require_once( APPPATH.'/third_party/Hybrid/Endpoint.php' );

  	Hybrid_Endpoint::process();
  }
}
/* End of file Connect_end.php */
/* Location: ./application/controllers/account/Connect_end.php */
