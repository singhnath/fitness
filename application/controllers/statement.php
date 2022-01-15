<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statement extends CI_Controller {
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

	public function overallStatement( )
	{   
	    $data['overall'] = $this->My_model->get_overall_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('overall_booking_statement');
		$this->load->view('admin_footer');
	}

	public function trainerStatement( )
	{   
	    $data['trainer'] = $this->My_model->get_trainer_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('trainer_statement');
		$this->load->view('admin_footer');
	}

	public function dailyStatement( )
	{   
	    $data['daily'] = $this->My_model->get_overall_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('daily_statement');
		$this->load->view('admin_footer');
	}

	public function monthlyStatement( )
	{   
	    $data['monthly'] = $this->My_model->get_overall_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('monthly_statement');
		$this->load->view('admin_footer');
	}

	public function yearlyStatement( )
	{   
	    $data['yearly'] = $this->My_model->get_overall_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('yearly_statement');
		$this->load->view('admin_footer');
	}

	public function releasePayment()
	{
		$rid = $this->uri->segment(3, 0);
		$tid = $this->uri->segment(4, 0);
		$amnt = $this->uri->segment(5, 0);

		$data['release'] = $this->My_model->get_release_payment($rid, $tid, $amnt);   
		$this->load->view('admin_header',$data);
		$this->load->view('release_payment');
		$this->load->view('admin_footer');
	}

	public function trainerWallet()
	{
		
       
		$data['trainerWallet'] = $this->My_model->get_wallet_statement();   
		$this->load->view('admin_header',$data);
		$this->load->view('trainer_wallet');
		$this->load->view('admin_footer');
	}

	public function transactionHistory()
	{
		
       
		$data['transHistory'] = "Hello Transaction history";   
		$this->load->view('admin_header',$data);
		$this->load->view('transaction_history');
		$this->load->view('admin_footer');
	}
}