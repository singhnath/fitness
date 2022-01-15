<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('My_model');
		$this->load->library('session');
		if (!$this->session->userdata('logged_in'))
		{
        redirect('/welcome');
    	}
		
	}
	public function index()
	{
		/*$data['approve'] = $this->My_model->get_approved_list();
		 $this->load->view('admin_header',$data);
		 $this->load->view('approve');
		 $this->load->view('admin_footer');
		 //print_r($data['approve']);*/
	}

	public function approve()
	{
		 $data['approve'] = $this->My_model->get_approved_list();
		 $this->load->view('admin_header',$data);
		 $this->load->view('approve');
		 $this->load->view('admin_footer');
		 //print_r($data['approve']);
	}
	public function unapprove()
	{   
		$stat = $this->uri->segment(3, 0);
		
		$data['approve'] = $this->My_model->get_unapproved_list($stat);
		 $this->load->view('admin_header',$data);
		 $this->load->view('unapprove');
		 $this->load->view('admin_footer');
		 //print_r($data['approve']);
		
	}
}