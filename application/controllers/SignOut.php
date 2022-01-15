<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class SignOut extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('My_model');
        $this->load->library('session');
        ob_start();
		if (!$this->session->userdata('logged_in'))
		{
        redirect('/welcome');
    	}
	}

	function index()
	{
		$this->load->driver('cache');
		$this->cache->clean();
     	$this->session->sess_destroy();
		
        ob_clean();
		redirect('/welcome');
	}
}
?>