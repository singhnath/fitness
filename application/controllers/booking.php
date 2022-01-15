<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
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
		$data['ongoing_booking']=$this->My_model->ongoing_booking();
		 $this->load->view('admin_header',$data);
		 $this->load->view('ongoing');
		 $this->load->view('admin_footer');
	}

	public function ongoing()
	{
		 $data['ongoing_booking']=$this->My_model->ongoing_booking();
		 $this->load->view('admin_header');
		 $this->load->view('ongoing',$data);
		 $this->load->view('admin_footer');
	}
	public function completed()
	{
		$data['complete_booking']=$this->My_model->complete_booking();
		$this->load->view('admin_header',$data);
		$this->load->view('completed');
		$this->load->view('admin_footer');
		
	}
}