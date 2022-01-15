<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class workout extends CI_Controller {

	public function __construct()

    {

		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->model('My_model');

        $this->load->library(array('session','form_validation'));

		if (!$this->session->userdata('logged_in'))

		{

        redirect('/welcome');

    	}		
	}
	public function index()
	{
       $result['data'] =$this->My_model->getMultipleData('vg_workout',array('is_deleted'=>0));
	  $this->form_validation->set_rules('name', 'Name', 'required');
	  $this->form_validation->set_rules('description', 'Description', 'required');
	  $this->form_validation->set_rules('img', 'Image', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                       	    $this->load->view('admin_header');
						$this->load->view('workout', $result);
					    $this->load->view('admin_footer');
                }
                else
                {
                     $data=array('name'=>$this->input->post('name'),
                     	'description'=>$this->input->post('description'));
                     if(!empty($data)){
                     			$this->session->set_flashdata('error_message','<div class="alert alert-custom alert-dismissible my_message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="text-align:right" style="text-align:right">×</button>Invalid name or Description !</div>');

        		       $this->load->view('admin_header');
						$this->load->view('workout', $result);
					    $this->load->view('admin_footer');
                     }


                }

	

	}

	public function dashboard()
	{
		 $this->load->view('admin_header');

		 $this->load->view('dashboard');

		 $this->load->view('admin_footer');
	}

	public function workout_add()

	{
		 $this->load->view('admin_header');

		 $this->load->view('workout_add');

		 $this->load->view('admin_footer');

	}

	public function workout_edit_submit()
	{
		if(!empty($this->input->post('id'))){
			   $this->form_validation->set_rules('name','workout Name','required');
			   $this->form_validation->set_rules('description','workout description','required');
			   // $this->form_validation->set_rules('img','workout Image','required');
			if($this->form_validation->run()==TRUE)
			 {
			      if(!empty($_FILES['img']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['img']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('img')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('img');
              }
              $user_id=$this->session->userdata('login_id');
              $UserType=$this->session->userdata('UserType');
              $data=array(
              	'name' =>$this->input->post('name'),
              	'description'=>$this->input->post('description'),
                'img'=>$Profile_img,
                'user_id'=>$user_id,
                'UserType'=>$UserType,
                'updated_at'=>date('Y-m-d H:i:s')
              	);
              // print_r($data);
              // die();
              $id =array('id'=>$this->input->post('id'));
              $res=$this->My_model->Update('vg_workout',$data,$id);
              if ($res==true)
              {
              $this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							Workoput Update Successfully !
							</div>');

              	 redirect('workout');
              }
			   }			
	   }
	}

	public function workout_plan()
	{
		$data['trainees']=$this->My_model->getWorkOutPlan();
				// days
		$data['days']=['1'=>'Day 1','Day 2', 'Day 3', 'Day 4','Day 5'];
		
		 $this->load->view('admin_header');

		 $this->load->view('workout_plan',$data);

		 $this->load->view('admin_footer');
	}

	public function workout_plan_create()
	{
		// trainers
		$data['trainers']=$this->My_model->get_trainer();
		$data['trainees']=$this->My_model->get_customer();
		//trainer
		$data['trainer']=$this->My_model->get_trainer();
		// workouts
		$data['workouts']=$this->My_model->getAllRecord('vg_workout');
		// days
		$data['days']=['1'=>'Day 1','Day 2', 'Day 3', 'Day 4','Day 5'];

		//echo "<pre>"; print_r($data['trainers']); die();
	
		 $this->load->view('admin_header');

		 $this->load->view('workout_form',$data);

		 $this->load->view('admin_footer');
	}

	/**
	 * @param null
	 * @method workout_plan_add
	 * @return void 
	*/
    
    public function workout_plan_add(){
       $user_id=$this->session->userdata('User_id');
		   $UserType=$this->session->userdata('UserType');
       $workout_id = $this->input->post('workoutID');
       $repetition = $this->input->post('repetition');
       $data=array(
           'traineeID' =>$this->input->post('traineeID'),
           'trainersID' =>$this->input->post('trainersID'),
      	   'day'=>$this->input->post('day'),
           'workoutID'=> implode(',', $workout_id),
           'repetition'=> implode(',', $repetition),
           'user_id'=>$user_id,
           'UserType'=>$UserType,
           'created_at'=>date('Y-m-d H:i:s')
      	);

       $res=$this->My_model->Insert('vg_workout_plan',$data);
       if ($res==TRUE){
      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>Success!</strong>
					Workout plan added successfully !
					</div>');

      	 redirect('workout/workout_plan');

      }

    }
    	/**
	 * @param null
	 * @method workout_plan_edit
	 * @return void 
	*/

	 public function workout_plan_edit($workout_plan_id=""){
       // trainees
		$data['trainee_row']=$this->My_model->getSingleData('vg_workout_plan',array('id'=>$workout_plan_id));

		if (empty($data['trainee_row'])) {
       	   redirect('workout/workout_plan');
		}
       //workout_plan_id
        $data['workout_plan_id'] = $workout_plan_id;
       // trainers
		$data['trainers']=$this->My_model->get_trainer();
		// workouts
		$data['workouts']=$this->My_model->getAllRecord('vg_workout');
			// days
		$data['days']=['1'=>'Day 1','Day 2','Day 3', 'Day 4','Day 5'];
	
		 $this->load->view('admin_header');

		 $this->load->view('workout_form',$data);

		 $this->load->view('admin_footer',$data);
    }

    /**
	 * @param null
	 * @method getTrainerTranees
	 * @return void 
	*/
    
    public function getTrainerTranees(){
        
        $workout_plan_id = $this->input->post('workout_plan_id');
        $trainersID = $this->input->post('trainersID');
    	// tranees to be edited
    	$data['trainee_row']=$this->My_model->getSingleData('vg_workout_plan',array('id'=>$workout_plan_id));
    	// get all tranees, accordingly by trainers id
    	$data['trainees']=$this->My_model->getTranerTranees($trainersID);
    	// get all the options of the dropdown of the tranee
    	$html = $this->load->view('workout/workout_plan_inc',$data,true);

        echo $html; exit;

    }

 /**
	 * @param int $workout_plan_id
	 * @method workout_plan_update
	 * @return void 
	*/
    
    public function workout_plan_update($workout_plan_id=''){

		      $user_id=$this->session->userdata('User_id');
		      $UserType=$this->session->userdata('UserType');
		    	$workout_id = $this->input->post('workoutID');
	        $repetition = $this->input->post('repetition');
         $data=array(
           'traineeID' =>$this->input->post('traineeID'),
           'trainersID' =>$this->input->post('trainersID'),
      	   'day'=>$this->input->post('day'),
           'workoutID'=> implode(',', $workout_id),
           'repetition'=> implode(',', $repetition),
           'user_id'=>$user_id,
           'UserType'=>$UserType,
           'updated_at'=>date('Y-m-d H:i:s')
      	 );
		 $res=$this->My_model->updateRecordById('vg_workout_plan',$data,$workout_plan_id);
	      if ($res==true)
	      {
	      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>Success!</strong>
						Workout plan updated successfully !
						</div>');

	      	 redirect('workout/workout_plan');

	      }
        
    }

	public function report()
	{
		
		 $this->load->view('admin_header');

		 $this->load->view('report');

		 $this->load->view('admin_footer');
	}

	public function edit_workout()
	{
		$workoutId = $this->uri->segment(3);
		$id=array('id'=>$workoutId);
		$result['data']=$this->My_model->getSingleData('vg_workout',$id);
		$this->load->view('admin_header');
		$this->load->view('edit_workout', $result);
		$this->load->view('admin_footer');
	}

	public function workout_submit()
	{

		if(isset($_POST)){
			   $this->form_validation->set_rules('name','workout Name','required');
			   $this->form_validation->set_rules('description','workout description','required');
			   // $this->form_validation->set_rules('img','workout Image','required');
			if ($this->form_validation->run()==TRUE)
			 {
			      if(!empty($_FILES['img']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['img']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('img')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('img');
              }
              $user_id=$this->session->userdata('User_id');
              $UserType=$this->session->userdata('UserType');
              $data=array(
              	'name' =>$this->input->post('name'),
              	 'description'=>$this->input->post('description'),
                'img'=>$Profile_img,
                'user_id'=>$user_id,
                'UserType'=>$UserType,
                'created_at'=>date('Y-m-d H:i:s')
              	);
              // print_r($data);
              // die();

              $res=$this->My_model->Insert('vg_workout',$data);
              if ($res==true)
              {
              		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							workout update successfully !
							</div>');

              	 redirect('workout');

              }
			}
									
	}
	}

	 public function delete_workout()
 {
 	$id=array('id'=>$this->uri->segment(3));
 	 $res=$this->My_model->Delete('vg_workout',$id);
 	 if ($res==true) {
      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>Success!</strong>
					workout deleted successfully !
					</div>');

      	 redirect('workout');

      }
 }

 public function submit_workoutPlan()
 {
    $this->form_validation->set_rules('traineeID','trainee Name','required');
    $this->form_validation->set_rules('day','workout day','required');
    $this->form_validation->set_rules('workoutID','workout Name','required');
	  if ($this->form_validation->run()==TRUE)
		 {
		 	  $data=array('traineeID'=>$this->input->post('traineeID'),
		 	 'day'=>$this->input->post('day'),
		 	 'workoutID'=>implode( "," ,$this->input->post('workoutID')),
		 	 'how_many'=>implode( "," ,$this->input->post('how_many')));  
        $res=$this->My_model->Insert('vg_workout_plan',$data);
        if ($res==true)
        {
        		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>Success!</strong>
				workout plan add successfully !
				</div>');

        	 redirect('workout/workout_plan');

        }
		 }
		 else
		 {
		 	$this->session->set_flashdata('error_message','<div class="alert alert-danger" id="danger-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Warning!</strong>
						    Something went wrong ..!
							</div>');
		 }
 }
  /**
	 * @param int $workout_plan_id
	 * @method workout_plan_delete
	 * @return void 
	*/
    public function workout_plan_delete($workout_plan_id='')
	 {
	 	 $res=$this->My_model->Delete('vg_workout_plan',['id'=>$workout_plan_id]);
	 	 if ($res==true) {
	      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>Success!</strong>
						Workout plan deleted successfully !
						</div>');

	      	 redirect('workout/workout_plan');

	      }
	 }

	   public function soft_delete_workout_plan($id)
   {
     $res=$this->My_model->Update('vg_workout_plan',array('is_deleted'=>1),array('id' =>$id));
      if ($res==true){
      	return 1;
       echo 'Deleted successfully.';
      }

   }

   public function soft_delete_workout($id)
   {
     $res=$this->My_model->Update('vg_workout',array('is_deleted'=>1),array('id' =>$id));
      if ($res==true){
      	return 1;
       echo 'Deleted successfully.';
      }

   }


}