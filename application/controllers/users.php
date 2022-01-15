<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Users extends CI_Controller {

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

		 $this->load->view('admin-header',$data);

		 $this->load->view('customer');

		 $this->load->view('admin_footer');

	}



	public function customer()

	{

		 $data['customer']=$this->My_model->get_customer();

		 $this->load->view('admin_header',$data);

		 $this->load->view('customer');

		 $this->load->view('admin_footer');

	}

	public function trainer()

	{

		$data['trainer']=$this->My_model->get_trainer();

		$this->load->view('admin_header',$data);

		$this->load->view('trainer');

		 $this->load->view('admin_footer');

		

	}

	public function add_trainee()
	{
		$data['trainers']=$this->My_model->get_trainer();
		$this->load->view('admin_header');

		$this->load->view('add_trainee',$data);

		$this->load->view('admin_footer');
	}

   public function submit_trainee()
	{ 
		if($_POST){
			   $this->form_validation->set_rules('trainee_name','Trainee Name','required');
			   $this->form_validation->set_rules('trainee_email','Trainee email','required|valid_email|max_length[128]|trim');
			   $this->form_validation->set_rules('trainee_number','Trainee Phone number','required');
			   $this->form_validation->set_rules('trainee_address','Trainee Address','required');
			   $this->form_validation->set_rules('trainee_password','Trainee Password','required');
			if ($this->form_validation->run()==TRUE)
			 {
			      if(!empty($_FILES['trainee_file']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['trainee_file']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('trainee_file')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('trainee_file');
              }

              $data=array(

              	'UserName' =>$this->input->post('trainee_name'),

              	 'UserPhone'=>$this->input->post('trainee_number'),

              	 'UserEmail'=>$this->input->post('trainee_email'),

              	 'UserType'=>2,

              	 'UserPassword'=>md5($this->input->post('trainee_password')),

              	 'UserAddress'=>$this->input->post('trainee_address'),
              	 'trainersID'=>$this->input->post('trainersID'),

                 'UserProfile'=>$Profile_img
              	);
              $res=$this->My_model->Insert('vg_users',$data);
              if ($res==true)
              {
              		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							trainer add successfully !
							</div>');

              	 redirect('users/customer');

              }
			}
									
	}

}
public function edit_trainee()
	{
		$traineeId = $this->uri->segment(3);
		$id=array('ID'=>$traineeId);
		$result['data']=$this->My_model->getSingleData('vg_users',$id);
		$this->load->view('admin_header');
		$this->load->view('edit_trainee',$result);
		$this->load->view('admin_footer');
	}

   public function submit_edit_trainee()
	{ 
		if($this->input->post('ID')){
			   $this->form_validation->set_rules('trainee_name','Trainee Name','required');
			   $this->form_validation->set_rules('trainee_email','Trainee email','required|valid_email|max_length[128]|trim');
			   $this->form_validation->set_rules('trainee_number','Trainee Phone number','required');
			   $this->form_validation->set_rules('trainee_address','Trainee Address','required');
			   // $this->form_validation->set_rules('trainee_password','Trainee Password','required');
			if ($this->form_validation->run()==TRUE)
			 {
			    if(!empty($_FILES['trainee_file']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['trainee_file']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('trainee_file')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('trainee_file');
              }
              $data=array(
              	 'UserName' =>$this->input->post('trainee_name'),
              	 'UserPhone'=>$this->input->post('trainee_number'),
              	 'UserEmail'=>$this->input->post('trainee_email'),
              	 'UserType'=>2,
              	 // 'UserPassword'=>$this->input->post('trainee_password'),
              	 'UserAddress'=>$this->input->post('trainee_address'),
                 'UserProfile'=>$Profile_img
              	);
              $id=array('ID'=>$this->input->post('ID'));
              $res=$this->My_model->Update('vg_users',$data,$id);
              if ($res==true)
              {
              		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							trainer update successfully !
							</div>');

              	 redirect('users/customer');

              }
			}
									
	}
 }

 public function delete_trainee($value='')
 {
 	$id=array('ID'=>$this->uri->segment(3));
 	 $res=$this->My_model->Delete('vg_users',$id);
 	 if ($res==true) {
      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>Success!</strong>
					trainer deleted successfully !
					</div>');

      	 redirect('users/customer');

      }
 }



 public function add_trainers()
	{
		$this->load->view('admin_header');

		$this->load->view('add_trainers');

		$this->load->view('admin_footer');
	}

   public function submit_trainers()
	{ 
		if($_POST){
			   $this->form_validation->set_rules('trainee_name','Trainee Name','required');
			   $this->form_validation->set_rules('trainee_email','Trainee email','required|valid_email|max_length[128]|trim');
			   $this->form_validation->set_rules('trainee_number','Trainee Phone number','required');
			   $this->form_validation->set_rules('trainee_address','Trainee Address','required');
			   $this->form_validation->set_rules('trainee_password','Trainee Password','required');
			if ($this->form_validation->run()==TRUE)
			 {
			      if(!empty($_FILES['trainee_file']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['trainee_file']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('trainee_file')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('trainee_file');
              }

              $data=array(

              	'UserName' =>$this->input->post('trainee_name'),

              	 'UserPhone'=>$this->input->post('trainee_number'),

              	 'UserEmail'=>$this->input->post('trainee_email'),

              	 'UserType'=>1,

              	 'UserPassword'=>md5($this->input->post('trainee_password')),

              	 'UserAddress'=>$this->input->post('trainee_address'),

                 'UserProfile'=>$Profile_img
              	);
              $res=$this->My_model->Insert('vg_users',$data);
              if ($res==true)
              {
              		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							trainer add successfully !
							</div>');

              	 redirect('users/trainer');

              }
			}
									
	}

}
public function edit_trainers()
	{
		$traineeId = $this->uri->segment(3);
		$id=array('ID'=>$traineeId);
		$result['data']=$this->My_model->getSingleData('vg_users',$id);
		$this->load->view('admin_header');
		$this->load->view('edit_trainers',$result);
		$this->load->view('admin_footer');
	}

   public function submit_edit_trainers()
	{ 
		if($this->input->post('ID')){
			   $this->form_validation->set_rules('trainee_name','Trainee Name','required');
			   $this->form_validation->set_rules('trainee_email','Trainee email','required|valid_email|max_length[128]|trim');
			   $this->form_validation->set_rules('trainee_number','Trainee Phone number','required');
			   $this->form_validation->set_rules('trainee_address','Trainee Address','required');
			   // $this->form_validation->set_rules('trainee_password','Trainee Password','required');
			if ($this->form_validation->run()==TRUE)
			 {
			    if(!empty($_FILES['trainee_file']['name'])){
                  $config['upload_path'] = 'img';
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = $_FILES['trainee_file']['name'];
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('trainee_file')){
                      $uploadData = $this->upload->data();
                      $Profile_img = $uploadData['file_name'];
                  }
                  else{
                      $Profile_img = '';
                  } 

              }
            else{

                 $Profile_img = $this->input->post('trainee_file');
              }
              $data=array(
              	 'UserName' =>$this->input->post('trainee_name'),
              	 'UserPhone'=>$this->input->post('trainee_number'),
              	 'UserEmail'=>$this->input->post('trainee_email'),
              	 'UserType'=>1,
              	 // 'UserPassword'=>$this->input->post('trainee_password'),
              	 'UserAddress'=>$this->input->post('trainee_address'),
                 'UserProfile'=>$Profile_img
              	);
              $id=array('ID'=>$this->input->post('ID'));
              $res=$this->My_model->Update('vg_users',$data,$id);
              if ($res==true)
              {
              		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong>Success!</strong>
							trainers update successfully !
							</div>');

              	 redirect('users/trainer');

              }
			}
									
	}
 }

 public function delete_trainers($value='')
 {
 	$id=array('ID'=>$this->uri->segment(3));
 	 $res=$this->My_model->Delete('vg_users',$id);
 	 if ($res==true) {
      		$this->session->set_flashdata('success_message','<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>Success!</strong>
					trainers deleted successfully !
					</div>');

      	 redirect('users/trainer');

      }
 }
 public function soft_delete_trainee($id)
   {
     $res=$this->My_model->Update('vg_users',array('is_deleted'=>1),array('ID' =>$id,'UserType'=>2));
      if ($res==true){
      	return 1;
       echo 'Deleted successfully.';
      }

   }

   public function soft_delete_trainer($id)
   {
    $res=$this->My_model->Update('vg_users',array('is_deleted'=>1),array('ID' =>$id,'UserType'=>1));
      if ($res==true){
      	return 1;
       echo 'Deleted successfully.';
      }

   }
 

}
?>