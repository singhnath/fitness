<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Welcome extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -  

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in 

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see http://codeigniter.com/user_guide/general/urls.html

	 */

	 public function __construct()

    {

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('My_model');

		$this->load->library('session');

		$this->load->model('Api_model');

	}

	public function index()

	{

		// $this->load->view('header');

		 //$this->load->view('admin_header');

		 $this->load->view('login');

		 //$this->load->view('admin_footer');

	}

	public function admin_login(){
		$userEmail=$this->input->post('email');
		$userPassword=md5($this->input->post('userPassword'));
		$UserType =$this->input->post('UserType');
		$data=$this->My_model->admin_login($userEmail,$userPassword,$UserType);
		if($data == TRUE)
		{

			 $this->session->set_flashdata('error', 'Session has Expired');
			if ($data['UserType']==0) {
				$login_detail = array('login_id' =>$data['id'] ,
					                'UserType'=>$data['UserType'],
					                'User_id'=>$data['ID'],
			                       'login_name' =>$data['name'] ,
			                       'logged_in' => TRUE  );
				$this->session->set_userdata($login_detail);
				redirect('/users/customer');
			}elseif ($data['UserType']==1) {
				$login_detail = array('login_id' =>$data['ID'] ,
									 'UserType'=>$data['UserType'],
									 'User_id'=>$data['ID'],
			                         'login_name' =>$data['UserName'] ,
			                         'logged_in' => TRUE );
				$this->session->set_userdata($login_detail);
				redirect('/trainers');
			}else{
				$login_detail = array('login_id' =>$data['ID'] ,
					 				'UserType'=>$data['UserType'],
					 				'User_id'=>$data['ID'],
			                       'login_name' =>$data['UserName'] ,
			                       'logged_in' => TRUE  );
				$this->session->set_userdata($login_detail);
				redirect('/trainee');
			}
			
		}
		else
		{
		$this->session->set_flashdata('error','<div class="alert alert-warning" id="warning-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Warning!</strong>
							please fill the correct information !
							</div>');
			redirect('/welcome');
		}
	}

	public function categories(){

		$data['categories']=$this->My_model->get_category();

		$this->load->view('header',$data);

		$this->load->view('categories');

		$this->load->view('admin-footer');

	}
}

?>