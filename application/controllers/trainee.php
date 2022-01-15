<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Trainee extends CI_Controller {

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

		$data['customer']=$this->My_model->get_customer();

		 $this->load->view('trainee/trainee_header',$data);

		 $this->load->view('trainee/tainee_dashbord');

		 $this->load->view('trainee/tainee_footer');

	}

	public function workout()
 {
 	  $result['data'] =$this->My_model->getAllRecord('vg_workout');
	  $this->form_validation->set_rules('name', 'Name', 'required');
	  $this->form_validation->set_rules('description', 'Description', 'required');
	  $this->form_validation->set_rules('img', 'Image', 'required');
                if ($this->form_validation->run() == FALSE)
                {
  
					$this->load->view('trainers/tainers_header');
					$this->load->view('trainers/workout',$result);
					$this->load->view('trainers/tainers_footer');
                }
                else
                {
                     $data=array('name'=>$this->input->post('name'),
                     	'description'=>$this->input->post('description'));
                     if(!empty($data)){
                     			$this->session->set_flashdata('error_message','<div class="alert alert-custom alert-dismissible my_message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="text-align:right" style="text-align:right">×</button>Invalid name or Description !</div>');

				        $this->load->view('trainers/tainers_header');
						$this->load->view('trainers/workout',$result);
						$this->load->view('trainers/tainers_footer');
                     }


                }

	 }
	public function workout_plan(){
	      $user_id=$this->session->userdata('logged_in');
	      print_r($user_id);exit;
	     
	      $data['trainees']=$this->My_model->getMultipleData('vg_users',array('ID'=>$user_id));
	      //days
	      $data['days']=['1'=>'Day 1','Day 2', 'Day 3', 'Day 4','Day 5']; 
		 $this->load->view('trainee/trainee_header');

		 $this->load->view('trainee/workout_plan',$data);

		 $this->load->view('trainee/tainee_footer');

	}

	public function workout_plan_view($workout_plan_id="")
	{

		// trainees
		$data['trainee_row']=$this->My_model->getSingleData('vg_workout_plan',array('id'=>$workout_plan_id));
		if (empty($data['trainee_row'])) {
       	   redirect('trainee/workout_plan');
		}
       //workout_plan_id
        $data['workout_plan_id'] = $workout_plan_id;
        // trainees
		$data['trainees']=$this->My_model->get_customer();
		// workouts
		$data['workouts']=$this->My_model->getAllRecord('vg_workout');
		
	      	// days
		$data['days']=['1'=>'Day 1','Day 2', 'Day 3', 'Day 4','Day 5'];
		 $this->load->view('trainee/trainee_header');

		 $this->load->view('trainee/workout_plan_view',$data);

		 $this->load->view('trainee/tainee_footer');
	}
	public function report()
	{

		$data['customer']=$this->My_model->get_customer();

		 $this->load->view('trainee/trainee_header',$data);

		 $this->load->view('trainee/report');

		 $this->load->view('trainee/tainee_footer');

	}


}

?>