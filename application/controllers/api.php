<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . '/libraries/REST_Controller.php';
/*include APPPATH .'/third_party/stripe/config.php';*/
class Api extends REST_Controller{

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('API_model');
		define( 'API_ACCESS_KEY', 'AAAA2bXTNNE:APA91bEwdBYMc881PEGOH23_o3U_6gD_XaReBPzdnwTIrLa_MDXogiJ2oNSTtthERXKn4l3yvLagC73y9Mr-CK5DP7_TnSIstYSqg0r8mfzdHlQlcIFfWbbrbt1oVN3fPntFigioFHET' );
	}
	

	public function user_registration_post(){
		$email=$this->post('userEmail');
		$phone=$this->post('userPhone');
		$name=$this->post('userName');
		$password=$this->post('userPassword');
		if(!empty($password) && $password!=''){
			$password=md5($password);
		}
		else{
			$password='';
		}
		$userType=$this->post('userType');
		$post_data = array(
        'UserName'   =>  $name,
        'UserEmail'   => $email,
        'UserPhone' => $phone,
        'UserPassword' => $password,
        'UserProfile'=>'',
        'UserType'=>$userType,
        'UserAddress'=>$this->post('userAddress'),
        'UserLat'=>$this->post('userLat'),
        'UserLong'=>$this->post('userLong'),
        'UserfirbaseID'=>$this->post('userfirbaseID'),
    	);
    	$userexist=$this->API_model->user_exist($email,$phone);
    	if ($userexist)
		{
			$this->response([
			'status' => FALSE,
			'response' => 'User Already Exist'
			], 400);
		}
		else
		{
			
			$data=$this->API_model->user_registration($post_data);
			if ($data)
			{
				if($userType=='2'){
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
				}
				else{
					//print_r($data);
					$arr=array('ID'=>$data['user_id'],'UserName'=>$data['UserName'],'UserEmail'=>$data['UserEmail'],'UserPhone'=>$data['UserPhone'],'UserProfile'=>'','UserType'=>$data['UserType'],'skills'=>'','experience'=>'','cost_hours'=>'','traingAddress'=>'','availableHoursStart'=>'','availableHoursEnd'=>'','availableMon'=>'','availableThe'=>'','availableWed'=>'','availableThu'=>'','availableFri'=>'','availableSat'=>'','availableSun'=>'','trainerLat'=>'','trainerLong'=>'','UserfirbaseID'=>'');
					$this->response([
					'status' => TRUE,
					'response' => $arr
					], 200);
				}
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'error' => 'No Data Available'
				], 400);
			}
		}
	}

	public function user_login_post(){
		$email=$this->post('userEmail');
		$password=$this->post('userPassword');
		$fcm_id=$this->post('fcm_id');
		$userType=$this->post('userType');
		$userexist=$this->API_model->user_exist($email,$phone=NULL);
		if(!$userexist):
			$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
		else:
			$data=$this->API_model->user_login($email,$password,$userType);
			//print_r($userexist);
			$userID=$userexist[0]['ID'];
			$post_data=array(
				'UserfirbaseID'=>$fcm_id
			);
			$dd=$this->API_model->update_userProfile($post_data,$userID,$userTypes=NULL);
			if ($data)
			{
				if($userType==2){
				//	print_r($data);
				$arr=$data;
				}
				else{
						//print_r($data);
						if(isset($data[0]['skills'])):
							$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserProfile'=>$data[0]['UserProfile'],'UserType'=>$data[0]['UserType'],'skills'=>$data[0]['skills'],'experience'=>$data[0]['experience'],'cost_hours'=>$data[0]['cost_hours'],'traingAddress'=>$data[0]['traingAddress'],'availableHoursStart'=>$data[0]['availableHoursStart'],'availableHoursEnd'=>$data[0]['availableHoursEnd'],'availableMon'=>$data[0]['availableMon'],'availableThe'=>$data[0]['availableThe'],'availableWed'=>$data[0]['availableWed'],'availableThu'=>$data[0]['availableThu'],'availableFri'=>$data[0]['availableFri'],'availableSat'=>$data[0]['availableSat'],'availableSun'=>$data[0]['availableSun'],'trainerLat'=>$data[0]['trainerLat'],'trainerLong'=>$data[0]['trainerLong'],'UserfirbaseID'=>$data[0]['UserfirbaseID']);
						else:
							
						$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserProfile'=>$data[0]['UserProfile'],'UserType'=>$data[0]['UserType'],'skills'=>'','experience'=>'','cost_hours'=>'','traingAddress'=>'','availableHoursStart'=>'','availableHoursEnd'=>'','availableMon'=>'','availableThe'=>'','availableWed'=>'','availableThu'=>'','availableFri'=>'','availableSat'=>'','availableSun'=>'','trainerLat'=>'','trainerLong'=>'','UserfirbaseID'=>'');
						endif;
						//print_r($arr);
						
				}
				$this->response([
				'status' => TRUE,
				'response' => $arr
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		endif;
		//print_r($data);
	}
	
	public function my_requested_service_get($id=NULL){
		$id = $this->get('userID');
		if($id!=NULL){
			$data = $this->API_model->my_requested_service($id);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'error' => 'please use valid parameter'
			], 400);
		}
	}

	public function update_userProfile_post()
	{
		$userID=$this->post('userID');
		$userImage=$this->post('userImage');
		$userName=$this->post('userName');
		$userfirbaseID=$this->post('userfirbaseID');
		$skills=$this->post('skills');
		$experience=$this->post('experience');
		$cost_hours=$this->post('cost_hours');
		$address=$this->post('trainingAddress');
		$trainerLat=$this->post('trainerLat');
		$trainerLong=$this->post('trainerLong');
		$availableHoursStart=$this->post('availableHoursStart');
		$availableHoursEnd=$this->post('availableHoursEnd');
		$availableMon=$this->post('availableMon');
		$availableThe=$this->post('availableThe');
		$availableWed=$this->post('availableWed');
		$availableThu=$this->post('availableThu');
		$availableFri=$this->post('availableFri');
		$availableSat=$this->post('availableSat');
		$availableSun=$this->post('availableSun');
		$checkUser = $this->API_model->get_users($userID);
		//print_r($checkUser);
		$userType='';
		$base_url=FCPATH.'userImage/';
		if (!file_exists($base_url.'/'.$userID)) {
		    mkdir($base_url.'/'.$userID, 0777, true);
		}
		if(!empty($userImage)){

			$kyc_image_name='userProfile'.time();
			$kyc_image=FCPATH.'userImage/'.$userID.'/'.$kyc_image_name.'.jpg';
			$kyc_image_url=base_url().'userImage/'.$userID.'/'.$kyc_image_name.'.jpg';
			file_put_contents($kyc_image,base64_decode($userImage));
			$post_data=array(
				'userProfile'=>$kyc_image_url,
				);
			$data = $this->API_model->update_userProfile($post_data,$userID,$userType=NULL);
		}
		if(!empty($userName)){
			$post_data=array(
				'userName'=>$userName,
				);
			$data = $this->API_model->update_userProfile($post_data,$userID,$userType=NULL);
		}
		if(!empty($userfirbaseID)){
			$post_data=array(
				'userfirbaseID'=>$userfirbaseID,
				);
			$data = $this->API_model->update_userProfile($post_data,$userID,$userType=NULL);
		}

		/*Trainer*/

		if(!empty($skills)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'skills'=>$skills,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'skills'=>$skills,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($experience)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'experience'=>$experience,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'experience'=>$experience,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($cost_hours)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'cost_hours'=>$cost_hours,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'cost_hours'=>$cost_hours,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($address)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'address'=>$address,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'address'=>$address,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($trainerLat)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'trainerLat'=>$trainerLat,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'trainerLat'=>$trainerLat,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($trainerLong)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'trainerLong'=>$trainerLong,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'trainerLong'=>$trainerLong,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableHoursStart)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableHoursStart'=>$availableHoursStart,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableHoursStart'=>$availableHoursStart,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableHoursEnd)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableHoursEnd'=>$availableHoursEnd,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableHoursEnd'=>$availableHoursEnd,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableMon)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableMon'=>$availableMon,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableMon'=>$availableMon,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableThe)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableThe'=>$availableThe,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableThe'=>$availableThe,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableWed)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableWed'=>$availableWed,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableWed'=>$availableWed,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableThu)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableThu'=>$availableThu,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableThu'=>$availableThu,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}

		if(!empty($availableFri)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableFri'=>$availableFri,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableFri'=>$availableFri,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}
		if(!empty($availableSat)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableSat'=>$availableSat,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableSat'=>$availableSat,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}
		if(!empty($availableSun)){
			$checkUser = $this->API_model->get_users($userID);
			$post_data=array(
				'availableSun'=>$availableSun,
				);
			if($checkUser):
				$data = $this->API_model->update_userProfile($post_data,$userID,'trainer');
			else:
				$post_data=array(
				'userID'=>$userID,
				'availableSun'=>$availableSun,
				);
				$data = $this->API_model->profile_inset($post_data,$userID);
			endif;
		}
		if ($data)
		{
			if(isset($data[0]['traingAddress'])){
				$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserType'=>$data[0]['UserType'],'UserProfile'=>$data[0]['UserProfile'],'skills'=>$data[0]['skills'],'experience'=>$data[0]['experience'],'cost_hours'=>$data[0]['cost_hours'],'traingAddress'=>$data[0]['traingAddress'],'availableHoursStart'=>$data[0]['availableHoursStart'],'availableHoursEnd'=>$data[0]['availableHoursEnd'],'availableMon'=>$data[0]['availableMon'],'availableThe'=>$data[0]['availableThe'],'availableWed'=>$data[0]['availableWed'],'availableThu'=>$data[0]['availableThu'],'availableFri'=>$data[0]['availableFri'],'availableSat'=>$data[0]['availableSat'],'availableSun'=>$data[0]['availableSun'],'trainerLat'=>$data[0]['trainerLat'],'trainerLong'=>$data[0]['trainerLong'],'UserfirbaseID'=>$data[0]['UserfirbaseID']);
			}
			else{
				$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserType'=>$data[0]['UserType'],'UserProfile'=>$data[0]['UserProfile'],'UserAddress'=>$data[0]['UserAddress'],'UserLat'=>$data[0]['UserLat'],'UserLong'=>$data[0]['UserLong'],'UserfirbaseID'=>$data[0]['UserfirbaseID']);
			}
			$this->response([
			'status' => TRUE,
			'response' => $arr
			], 200);
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}
  	function near_trainer_post()
	{
		$lati=$this->post('lati');
		$longi=$this->post('longi');
		if(!empty($lati) && !empty($longi)){
			$data = $this->API_model->near_trainer($lati,$longi,$key=NULL);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function trainer_details_get(){
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID))
		{
			$data = $this->API_model->trainer_details($trainerID);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function search_trainer_post(){
		$key=$this->post('search_key');
		$lati=$this->post('lati');
		$longi=$this->post('longi');
		if(!empty($key) && !empty($lati) && !empty($longi)){
			$data = $this->API_model->near_trainer($lati,$longi,$key);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function booking_trainer_post(){
		$userID=$this->post('userID');
		$trainerID=$this->post('trainerID');
		$bookedDate=$this->post('bookedDate');
		$bookedTime=$this->post('bookedTime');
		$bookedHours=$this->post('bookedHours');
		$bookingDate=date("Y-m-d h:m:s");
		if(!empty($userID) && !empty($trainerID) && !empty($bookedHours) && !empty($bookedTime) && !empty($bookedDate))
		{
			$post_data=array(
				'userID'=>$userID,
				'trainerID'=>$trainerID,
				'bookedDate'=>$bookedDate,
				'bookedTime'=>$bookedTime,
				'bookedHours'=>$bookedHours,
				'bookingStatus'=>'1',
				'bookingDate'=>$bookingDate
				);
			$data = $this->API_model->booking_trainer($post_data);
			if ($data)
			{
				$arr=array('bookingID'=>$data);
				$this->response([
				'status' => TRUE,
				'response' => $arr
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function trainer_booking_history_get(){
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID)){
			$data = $this->API_model->trainer_booking_history($trainerID);
			
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function customer_booking_history_get(){
		$userID=$this->get('userID');
		if(!empty($userID)){
			$data = $this->API_model->customer_booking_history($userID);
			
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	public function review_post(){
		$reviewBy=$this->post('reviewBy');
		$bookingID=$this->post('bookingID');
		$reviewFor=$this->post('reviewFor');
		$comment=$this->post('comment');
		$ratingNumber=$this->post('ratingNumber');
		// $reviewBy=$this->post('reviewBy');
		$reviewDate=date("Y-m-d h:m:s");
		if(!empty($reviewBy) && !empty($bookingID) && !empty($reviewFor) && !empty($comment) && !empty($ratingNumber)){
				$post_data=array(
					'bookingID'=>$bookingID,
					'reviewBy'=>$reviewBy,
					'reviewFor'=>$reviewFor,
					'comment'=>$comment,
					'ratingNumber'=>$ratingNumber,
					'reviewDate'=>$reviewDate
					);
				$rs=$this->API_model->check_review($bookingID,$reviewBy);
				if($rs){
					$this->response([
						'status' => FALSE,
						'response' => 'Already left review'
						], 200);
				}
				else{

					$data = $this->API_model->review($post_data);
				
					if ($data)
					{
						$this->response([
						'status' => TRUE,
						'response' => 'Thanks for Your Feedback'
						], 200);
					}
					else
					{
						$this->response([
						'status' => FALSE,
						'response' => []
						], 400);
					}
				}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function trainer_account_post()
	{
		$vendorID=$this->post('trainerID');
		$transitNumber=$this->post('transitNumber');
		$institutionNumber=$this->post('institutionNumber');
		$accountNumber=$this->post('accountNumber');
		$dateTime=date("Y-m-d h:m:s");
		if(!empty($vendorID) && !empty($transitNumber) && !empty($institutionNumber) && !empty($accountNumber))
		{
			$post_data=array(
				'trainerID'=>$vendorID,
				'transitNumber'=>$transitNumber,
				'institutionNumber'=>$institutionNumber,
				'accountNumber'=>$accountNumber,
				'agreement'=>'1',
				'approved'=>'false',
				'dateTime'=>$dateTime
				);
			$checkExist=$this->API_model->trainer_accountGet($vendorID);
			if($checkExist){
				$this->response([
					'status' => FALSE,
					'response' =>'Already You added your account'
					], 400);
			}
			else{
				$data = $this->API_model->trainer_account($post_data);
				if ($data)
				{
					$this->response([
					'status' => TRUE,
					'response' => 'Wait For Admin Approval'
					], 200);
				}
				else
				{
					$this->response([
					'status' => FALSE,
					'response' => []
					], 400);
				}
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function trainer_account_get()
	{
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID))
		{
			$data = $this->API_model->trainer_accountGet($trainerID);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function chatting_post()
	{
		$messageBy=$this->post('messageBy');
		$messageFor=$this->post('messageFor');
		$message=$this->post('message');
		$messageDate=date("Y-m-d h:m:s");
		if(!empty($messageBy) && !empty($messageFor) && !empty($message))
		{
			$post_data=array(
				'messageBy'=>$messageBy,
				'messageFor'=>$messageFor,
				'message'=>$message,
				'messageDate'=>$messageDate
				);
			$data = $this->API_model->chattig($post_data);
			if ($data)
			{
				$res=$this->API_model->get_firebaseID($messageFor);
				$resBY=$this->API_model->get_firebaseID($messageBy);
				$messageForUserName=$resBY[0]['UserName'];
				$messageForFirebaseID=$res[0]['UserfirbaseID'];
		     	$msg = array(
					'body' 	=> $message,
					'title'	=> $messageForUserName,
		         	'icon'	=> 'myicon',/*Default Icon*/
		          	'sound' => 'mySound'/*Default sound*/
			          );
				$fields = array(
							'to'		=> $messageForFirebaseID,
							'notification'	=> $msg
						);
					
					
				$headers = array(
							'Authorization: key=' . API_ACCESS_KEY,
							'Content-Type: application/json'
						);
				$chatting_Res = $this->API_model->puch_notification($headers,$fields);
				$this->response([
				'status' => TRUE,
				'response' => 'Message Sent'
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function chatting_list_get()
	{
		$userID=$this->get('userID');
		if(!empty($userID))
		{
			$data = $this->API_model->chatting_list($userID);
			
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>$data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}else
		{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function chatting_list_trainer_get()
	{
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID))
		{
			$data = $this->API_model->chatting_list_trainer($trainerID);
			
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>$data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}else
		{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	public function chatting_history_post(){
		$messageBY=$this->post('messageBY');
		$messageTo=$this->post('messageFor');
		if( !empty($messageTo) && !empty($messageBY))
		{
			$data = $this->API_model->chatting_history($messageTo,$messageBY);
			if($data){
				$this->response([
					'status' => TRUE,
					'response' => $data
					], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else
		{
			$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
		}
	}
	function payment_process_post()
	{

		include APPPATH .'/third_party/stripe/config.php';

		$cardNumber=$this->post('cardNumber');
		$amount=$this->post('amount');
		$cvv=$this->post('cvv');
		$expiryMonth=$this->post('expiryMonth');
		$expiryYear=$this->post('expiryYear');
		$customerID=$this->post('customerID');
		$bookingID=$this->post('bookingID');
		if(!empty($cardNumber) && !empty($amount) && !empty($cvv) && !empty($customerID) && !empty($expiryYear) && !empty($expiryMonth) && !empty($bookingID))
		{
			 try {
				$token = \Stripe\Token::create(array(
					  "card" => array(
						"number" => $cardNumber,
						"exp_month" => $expiryMonth,
						"exp_year" => $expiryYear,
						"cvc" => $cvv
					  )
					));
				$charge = \Stripe\Charge::create(array(
					  'source'  => $token->id,
				      'amount'   => $amount.'00',
				      'currency' => 'usd'
				  ));
				// print_r($charge);die;
				$balance_transaction=$charge->balance_transaction;
				$chargeID=$charge->id;
				$response=$charge->status;
				if($response=='succeeded')
				{
					$booking_data=array(
						'bookingStatus'=>'2'
						);
					$post_data=array(
						'customerID'=>$customerID,
						'bookingID'=>$bookingID,
						'paymentAmount'=>$amount,
						'tokanID'=>$token->id,
						'transactionID'=>$balance_transaction,
						'chargeID'=>$chargeID,
						'paymentStatus'=>'true'
						);
					$res=$this->API_model->booking_status($bookingID,$booking_data);
					$data=$this->API_model->customer_payment($post_data);
					if ($data)
					{
						$resFirbase=$this->API_model->get_firebaseID($customerID);
						$messageForUserName=$resFirbase[0]['UserName'];
						$messageForFirebaseID=$resFirbase[0]['UserfirbaseID'];
						$trainerDetails=$this->API_model->booking_details($bookingID);
						$trainerID=$trainerDetails[0]['trainerID'];

						$resFirbaseTrainer=$this->API_model->get_firebaseID($trainerID);
						$trainerUserName=$resFirbaseTrainer[0]['UserName'];

						$trainerFirebaseID=$resFirbaseTrainer[0]['UserfirbaseID'];


						/* Trainer Notification to Booked BY Customer */
							
							
					     	$msg = array(
								'body' 	=> 'Hi '.$trainerUserName.' you got new booking by '.$messageForUserName,
								'title'	=> 'New Schedule',
					         	'icon'	=> 'myicon',/*Default Icon*/
					          	'sound' => 'mySound'/*Default sound*/
						          );
							$fields = array(
										'to'		=> $trainerFirebaseID,
										'notification'	=> $msg
									);
								
								
							$headers = array(
										'Authorization: key=' . API_ACCESS_KEY,
										'Content-Type: application/json'
									);
							$chatting_Ress = $this->API_model->puch_notification($headers,$fields);

						/* rainer Notification to Booked BY Customer */

						/* Payment Notification to Customer*/
							
							
					     	$msg = array(
								'body' 	=> 'Hi '.$messageForUserName.' your payment approved',
								'title'	=> 'Payment Completed',
					         	'icon'	=> 'myicon',/*Default Icon*/
					          	'sound' => 'mySound'/*Default sound*/
						          );
							$fields = array(
										'to'		=> $messageForFirebaseID,
										'notification'	=> $msg
									);
								
								
							$headers = array(
										'Authorization: key=' . API_ACCESS_KEY,
										'Content-Type: application/json'
									);
							$chatting_Res = $this->API_model->puch_notification($headers,$fields);

						/* Payment Notification to Customer*/


						$this->response([
						'status' => TRUE,
						'response' => 'Payment Successfully Done'
						], 200);
					}
					else
					{
						$this->response([
						'status' => FALSE,
						'response' => []
						], 400);
					}
				}
				
				else
					{
						$this->response([
						'status' => FALSE,
						'response' => 'Payment Faild'
						], 400);
					}

			  } 
			  catch(\Stripe\Error\Card $e) {
			      $body = $e->getJsonBody();
			      $err  = $body['error'];

			      // print('Status is:' . $e->getHttpStatus() . "\n");
			      // print('Type is:' . $err['type'] . "\n");
			      // print('Code is:' . $err['code'] . "\n");
			      // // param is '' in this case
			      // print('Param is:' . $err['param'] . "\n");
			      // print('Message is:' . $err['message'] . "\n");
			      $this->response([
					'status' => FALSE,
					'response' => $err['message']
					], 400);
			    }
				catch (\Stripe\Error\InvalidRequest $e) {
			      	$this->response([
					'status' => FALSE,
					'response' => $err['message']
					], 400);

			    } catch (\Stripe\Error\Authentication $e) {
				      $this->response([
						'status' => FALSE,
						'response' => $err['message']
						], 400);
			    } catch (\Stripe\Error\ApiConnection $e) {
			      	$this->response([
					'status' => FALSE,
					'response' => $err['message']
					], 400);

			    } catch (Exception $e) {

					$this->response([
					'status' => FALSE,
					'response' => []
					], 400);
			    }
			
		die;
			
		}else{
			$this->response([
			'status' => FALSE,
			'response' => []
			], 400);
		}
	}

	function booking_status_post()
	{
		$bookingID=$this->post('bookingID')	;
		$status=$this->post('bookingStatus');
		if(!empty($bookingID) && !empty($status))
		{
			$post_data=array(
				'bookingStatus'=>$status
				);
			$data = $this->API_model->booking_status($bookingID,$post_data);
			if ($data)
			{
				$releaseData = $this->API_model->release_insert($bookingID,$paymentStatus=NULL);
				$this->response([
				'status' => TRUE,
				'response' => 'Thanks For Update'
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
		else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
	}

 

	function booking_details_get(){
		$bookingID=$this->get('bookingID');
		if(!empty($bookingID))
		{
			$data = $this->API_model->booking_details($bookingID);
			if ($data)
			{
				$this->response([
				'status' => TRUE,
				'response' => $data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => []
				], 400);
			}
		}
	}

	function test_notification_get()
	{
      	
	    $registrationIds = 'fpd9okPCz7I:APA91bFIlXRMFEIa0eXTyiCBtRpH2Z_-LiPqytKL3H9kYdMFazVJ6nE-mlBIKdxYb35huzNQvbqD2szJncuaSETSpBr7r9fMDVcoNozqdG003gIa2EAP6CUlKi7je5crt_JRpJCfSaD0';
     	$msg = array(
			'body' 	=> 'Body  Of Notification',
			'title'	=> 'Title Of Notification',
         	'icon'	=> 'myicon',/*Default Icon*/
          	'sound' => 'mySound'/*Default sound*/
	          );
		$fields = array(
					'to'		=> $registrationIds,
					'notification'	=> $msg
				);
			
			
		$headers = array(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
		$messageFor=4;
		// $res=$this->API_model->get_firebaseID($messageFor);
		// 		print_r($res);die;
			$data = $this->API_model->puch_notification($headers,$fields);
			// if ($data)
			// {
			// 	$this->response([
			// 	'status' => TRUE,
			// 	'response' => $data
			// 	], 200);
			// }
			// else
			// {
			// 	$this->response([
			// 	'status' => FALSE,
			// 	'response' => []
			// 	], 400);
			// }
	}
	

	function release_status_post()
	{
		$bookingID = $this->post('bookingID');
		$paymentStatus = $this->post('status');
		if(!empty($bookingID) && strlen($paymentStatus))
		{
			$releaseData = $this->API_model->release_insert($bookingID,$paymentStatus);

			if ($releaseData)
			{
				$this->response([
				'status' => TRUE,
				'response' => $releaseData
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => ['release Failed']
				], 400);
			}
		}else
		{
				$this->response([
				'status' => FALSE,
				'response' => ['release Failed']
				], 400);
		}
	}

	function test_account_pay_post()
	{
		include APPPATH .'/third_party/stripe/config.php';
		$token=\Stripe\Payout::create(array(
	  "amount" => 400,
	  "currency" => "usd",
	  'description'=>'Stripe Transfer',
	  'destination'=>'acct_18rsqhJ6m0aiknMB',
	  "method"=> "standard",
	  'source_type'=>'bank_account',
	  'statement_descriptor'=> "Transfer from Managed Account Stripe balance to Managed Account Bank Account"


	));
		print_r($token);
	}

	function become_trainer_customer_post()
	{	
		$userID=$this->post('userID');
		$userBecome=$this->post('userBecome');
		if(!empty($userID) && !empty($userBecome))
		{
			$data=$this->API_model->become_trainer_customer($userID,$userBecome);
			if($data){
				if($userBecome==1)
				{
					$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserProfile'=>$data[0]['UserProfile'],'UserType'=>$data[0]['UserType'],'skills'=>'','experience'=>'','cost_hours'=>'','traingAddress'=>'','availableHoursStart'=>'','availableHoursEnd'=>'','availableMon'=>'','availableThe'=>'','availableWed'=>'','availableThu'=>'','availableFri'=>'','availableSat'=>'','availableSun'=>'','trainerLat'=>'','trainerLong'=>'','UserfirbaseID'=>'');
					$this->response([
					'status' => TRUE,
					'response' => $arr
					], 200);
				}
				else{
					$arr=array('ID'=>$data[0]['ID'],'UserName'=>$data[0]['UserName'],'UserEmail'=>$data[0]['UserEmail'],'UserPhone'=>$data[0]['UserPhone'],'UserProfile'=>$data[0]['UserProfile'],'UserType'=>$data[0]['UserType'],'UserAddress'=>$data[0]['UserAddress'],'UserLat'=>$data[0]['UserLat'],'UserLong'=>$data[0]['UserLong'],'UserfirbaseID'=>$data[0]['UserfirbaseID']);
					$this->response([
					'status' => TRUE,
					'response' =>$arr
					], 200);
				}
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' => ''
				], 400);
			}
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' => ''
			], 400);
		}
	}

	function trainer_wallet_get()
	{
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID))
		{
			$data=$this->API_model->trainer_wallet($trainerID);
			if($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>$data
				], 200);
			}
			else
			{
				$this->response([
				'status' => FALSE,
				'response' =>''
				], 400);
			}
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' =>''
			], 400);
		}
	}

	function change_password_post()
	{
		$userID=$this->post('userID');
		$password=$this->post('password');
		$old_pass=$this->post('old_password');
		if(!empty($userID) && !empty($password) && !empty($old_pass))
		{
			$dd=$this->API_model->check_oldPassword($userID,$old_pass);
			if($dd):
				$data=$this->API_model->change_password($userID,$password);
				if($data)
				{
					$this->response([
					'status' => TRUE,
					'response' =>'Password Changed Successfully'
					], 200);
				}
				else
				{
					$this->response([
					'status' => FALSE,
					'response' =>''
					], 400);
				}
			else:
				$this->response([
					'status' => FALSE,
					'response' =>'Old Password Not Correct'
					], 400);
			endif;
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' =>''
			], 400);
		}
	}

	function customer_transaction_get(){
		$customerID=$this->get('customerID');
		if(!empty($customerID))
		{
			$data=$this->API_model->customer_transaction($customerID);
			if($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>$data
				], 200);
			}
			else
			{
				$this->response([
				'status' => TRUE,
				'response' =>[]
				], 200);
			}
		}
		else
		{
			$this->response([
			'status' => FALSE,
			'response' =>''
			], 400);
		}
		
	}

	function trainer_transaction_get()
	{
		$trainerID=$this->get('trainerID');
		if(!empty($trainerID))
		{
			$data=$this->API_model->trainer_transaction($trainerID);
			if($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>$data
				], 200);
			}
			else
			{
				$this->response([
				'status' => TRUE,
				'response' =>[]
				], 200);
			}
		}
		else{
			
			$this->response([
			'status' => FALSE,
			'response' =>''
			], 400);
		}
	}

	function forget_password_post()
	{
		$mobileNumebr=$this->post('mobileNumber');
		$password=$this->post('password');
		if(!empty($mobileNumebr) && !empty($password))
		{
			$data=$this->API_model->forget_password($mobileNumebr,$password);
			if($data)
			{
				$this->response([
				'status' => TRUE,
				'response' =>'Password Changed'
				], 200);
			}
			else
			{
				$this->response([
				'status' => TRUE,
				'response' =>[]
				], 200);
			}
		}
		else{
			
			$this->response([
			'status' => FALSE,
			'response' =>''
			], 400);
		}
	}
} 
?>