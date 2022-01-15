<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_model extends CI_Model{

	
	/* users */

	public function user_exist($email, $phone=NULL){
		$query = $this->db->query("select ID from `vg_users` where `UserEmail` = '".$email."' OR `UserPhone` = '".$email."'");
		return $query->result_array();		
	}
	public function user_registration($post_data){
		$this->db->insert('vg_users', $post_data);
   		$insert_id = $this->db->insert_id();
   		$post_data['user_id']=$insert_id;
   		return  $post_data;
	}

	public function user_login($email, $password,$userType){
		if($userType=='2')
			{
				//$userType='2';
				if(!empty($password)):
					$query = $this->db->query("select * from `vg_users` where (`UserEmail` = '".$email."' OR `UserPhone` = '".$email."') AND `UserPassword`='".md5($password)."' AND `UserType` LIKE '%".$userType."%'");
				endif;
			return $query->result_array();
			}else{
				$userType='1';
				if(!empty($password)):
					$query = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun`,b.`trainerLat`,b.`trainerLong`,a.`UserfirbaseID` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where `UserEmail` = '".$email."' AND `UserPassword`='".md5($password)."' AND `UserType` LIKE '%".$userType."%'");
					$query2 = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,a.`UserfirbaseID` from `vg_users` as a where `UserEmail` = '".$email."' AND `UserPassword`='".md5($password)."' AND `UserType` LIKE '%".$userType."%'");
				endif;
				$res=$query->result_array();
				if($res):
					return $res;
				else:
					return $query2->result_array();
				endif;
			}
		
	}

	public function get_users($id){
		$query2 = $this->db->query("select a.`ID` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where a.`ID` = '".$id."' AND a.`UserType` LIKE '%1%'");
		$result=$query2->result_array();
		return $result;
	}

	public function update_userProfile($data,$userID,$userType)
  	{
  		
  		if($userType=='trainer'):
  			$this->db->where('userID',$userID);
  			$data= $this->db->update('vg_trainerProfile', $data); 
  		else:
  			$this->db->where('ID',$userID);
  			$data= $this->db->update('vg_users', $data); 
  		endif;
  		
  		if($data){
  			$query2 = $this->db->query("select * from `vg_users` where `ID` = '".$userID."'");
  			$result=$query2->result_array();
        $userTypeS=explode(',', $result[0]['UserType']);
  			if(in_array('1', $userTypeS)){
          if(in_array('2', $userTypeS))
          {
           
            $query = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,a.UserAddress,a.UserLat,a.`UserLong`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun`,a.`UserfirbaseID`,b.`trainerLat`,b.`trainerLong` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where a.`ID` = '".$userID."'");
           // print_r("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,a.UserAddress,a.UserLat,a.`UserLong`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun`,a.`UserfirbaseID`,b.`trainerLat`,b.`trainerLong` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where a.`ID` = '".$userID."'");
          }
          else
          {
            $query = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun`,a.`UserfirbaseID`,b.`trainerLat`,b.`trainerLong` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where a.`ID` = '".$userID."'");
          }
  			}else{
  				$query = $this->db->query("select * from `vg_users` where `ID` = '".$userID."'");
  			}
  	     return $query->result_array();
  		}
  	}

  	public function profile_inset($data,$userID)
  	{
  		$this->db->insert('vg_trainerProfile', $data);
   		$insert_id = $this->db->insert_id();
  		if($insert_id){
  		$query2 = $this->db->query("select * from `vg_users` where `ID` = '".$userID."'");
  		$result=$query2->result_array();
      $userTypeS=explode(',', $result[0]['UserType']);
  		if(in_array('1', $userTypeS)){
  			$query = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun` from `vg_users` as a join `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where a.`ID` = '".$userID."'");
  		}else{
  			$query = $this->db->query("select * from `vg_users` where `ID` = '".$userID."'");
  		}
		  return $query->result_array();
  		}
  	}
	public function change_request_status($id,$data)
  	{
  		$array = array('requestID' => $id);
  		$this->db->where($array);
  		return $this->db->update('hs_service_request', $data); 
  	}
  	
  	function near_trainer($lati,$longi,$searchBy){
  		$query="SELECT a.`ID`,a.`UserName`,a.`UserProfile`,u.`distance`,u.`address` as traingAddress,u.`cost_hours` from `vg_users` as a INNER JOIN
				(SELECT `userID`,`address`,`cost_hours`,( 6371 * acos( cos( radians( '".$lati."' ) ) * cos( radians( `trainerLat` ) ) * cos(radians( `trainerLong` ) - radians('".$longi."')) + sin(radians('".$lati."')) * sin(radians(`trainerLat`))) ) `distance` FROM `vg_trainerProfile` WHERE `trainerLong` !='1'   HAVING `distance` < 50  ORDER BY `distance`) as u
				on (a.`ID`=u.`userID`) where a.`UserType` LIKE '%1%' AND a.`UserName` LIKE '".$searchBy."%'";
  		//print_r($query);
      $query2 = $this->db->query($query);
  		$result=$query2->result_array();
  		return $result;
  	}

  	function trainer_details($trainerID){
  		$query2 = $this->db->query("SELECT a.`UserName`,a.`UserEmail`,a.`UserProfile`,b.`skills`,b.`experience`,b.`cost_hours`,b.`address` as trainerAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun`,AVG(v.`ratingNumber`) as averageRating from `vg_users` as a join `vg_trainerProfile` as b on(a.`ID`=b.`userID`) left join `vg_review` as v on(a.`ID`=v.`reviewFor`) where a.`UserType` LIKE '%1%' AND a.`ID`='".$trainerID."'");
		$result=$query2->result_array();
		return $result;
  	}
  	function booking_trainer($data)
  	{
  		$this->db->insert('vg_booking', $data);
   		$insert_id = $this->db->insert_id();
   		return  $insert_id;
  	}

  	function trainer_booking_history($trainerID){
  		$query2 = $this->db->query("SELECT a.`bookingID`,a.`bookedDate`,a.`bookedTime`,a.`bookedHours`,a.`userID`,b.`UserName`,b.`UserProfile`,b.`UserEmail`,a.`bookingStatus`,v.`ratingNumber` as ratingStatus from `vg_booking` as a join `vg_users` as b on(a.`userID`=b.`ID`) left join `vg_review` as v on(a.`bookingID`=v.`bookingID`) where a.`trainerID`='".$trainerID."' AND a.`bookingStatus` > 1 ORDER BY `bookingDate` DESC");
		  $result=$query2->result_array();
		  return $result;
  	}
  	function customer_booking_history($userID){
  		$query2 = $this->db->query("SELECT a.`bookingID`,a.`bookedDate`,a.`bookedTime`,a.`bookedHours`,a.`trainerID`,b.`UserName`,b.`UserProfile`,b.`UserEmail`,a.`bookingStatus`,c.`releaseStatus`,v.`ratingNumber` as ratingStatus from `vg_booking` as a join `vg_users` as b on(a.`trainerID`=b.`ID`) left join  `vg_payment_release` as c on(a.`bookingID`=c.`bookingID`) left join `vg_review` as v on(a.`bookingID`=v.`bookingID`) where a.`userID`='".$userID."' ORDER BY `bookingDate` DESC");
		  $result=$query2->result_array();
		  return $result;
  	}

    public function check_review($bookingID,$reviewBy)
    {
        $query2 = $this->db->query("SELECT * from `vg_review` where `bookingID`='".$bookingID."' AND `reviewBy`='".$reviewBy."'");
        $result=$query2->result_array();
        return $result;
    }
  	public function review($data){
  		$this->db->insert('vg_review', $data);
   		$insert_id = $this->db->insert_id();
   		return  $data;
  	}

  	function trainer_account($data)
  	{
	  	$this->db->insert('vg_trainer_account', $data);
   		$insert_id = $this->db->insert_id();
   		return  $data;
  	}

  	function trainer_accountGet($trainerID)
  	{
  		$query2 = $this->db->query("SELECT `transitNumber` ,`institutionNumber`,`accountNumber`,`approved` as approvalStatus from `vg_trainer_account` where `trainerID`='".$trainerID."'");
		  $result=$query2->result_array();
		  return $result;
  	}

    function chattig($data)
    {
      $this->db->insert('vg_chat', $data);
      $insert_id = $this->db->insert_id();
      return  $data;
    }
    
    function chatting_list($userID)
    {
      $query2 = $this->db->query("SELECT  DISTINCT a.`trainerID`,b.`UserName`,b.`UserProfile` from `vg_booking` as a join `vg_users` as b on(a.`trainerID`=b.`ID`) left join  `vg_payment_release` as c on(a.`bookingID`=c.`bookingID`) where a.`userID`='".$userID."' AND a.`bookingStatus` > 1 ORDER BY a.`bookingDate` DESC");
      $result=$query2->result_array();
      return $result;
    }

    function chatting_list_trainer($trainerID)
    {
      $query2 = $this->db->query("SELECT DISTINCT a.`messageBy` as customerID,b.`UserName`,b.`UserProfile` from `vg_chat` as a join `vg_users` as b on(a.`messageBy`=b.`ID`) where a.`messageFor`='".$trainerID."' ORDER BY a.`messageDate` DESC");
      $result=$query2->result_array();
      return $result;
    }

    public function chatting_history($messageTo,$messageBY){
      $query = $this->db->query("SELECT `messageBy`,`messageFor`,`message`,`messageDate` FROM `vg_chat` where (`messageBY` ='".$messageBY."' AND `messageFor`='".$messageTo."' || `messageBY` ='".$messageTo."' AND `messageFor`='".$messageBY."')");
      $result=$query->result_array();
      return $result;
    }


    function booking_status($bookingID,$data)
    {
      $this->db->where('bookingID',$bookingID);
      $datas= $this->db->update('vg_booking', $data); 
      return $datas;
    }

    function booking_details($bookingID)
    {
      $query2 = $this->db->query("SELECT a.`bookingID`,a.`bookedDate`,a.`bookedTime`,a.`bookedHours`,a.`userID` as customerID ,b.`UserName` as customName ,b.`UserProfile` as customerProfile ,b.`UserEmail` as customerEmail,a.`trainerID` as trainerID ,c.`UserName` as trainerName ,c.`UserProfile` as trainerProfile ,c.`UserEmail` as trainerEmail,a.`bookingStatus`,v.`ratingNumber` as ratingStatus from `vg_booking` as a join `vg_users` as b on(a.`userID`=b.`ID`) join `vg_users` as c on(a.`trainerID`=c.`ID`) left join `vg_review` as v on(a.`bookingID`=v.`bookingID`) where a.`bookingID`='".$bookingID."'");
      $result=$query2->result_array();
      return $result;
    }

    function customer_payment($data)
    {
      $this->db->insert('vg_payment', $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }

    function get_firebaseID($userID)
    {
      $query2 = $this->db->query("SELECT `UserName`,`UserfirbaseID` from `vg_users` where `ID`='".$userID."'");
      $result=$query2->result_array();
      return $result;
    }
    function puch_notification($headers,$fields )
    {
      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
      $result = curl_exec($ch );
      curl_close( $ch );
      return 1;
    }

    function release_insert($bookingID,$status)
    {
        $this->db->select('trainerID');
        $this->db->from('vg_booking');
        $this->db->where('bookingID', $bookingID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {

            $rs = $query->row_array();
           $trainerID = $rs['trainerID'];
           
           

            $this->db->select('*');
            $this->db->from('vg_payment_release');
            $this->db->where('bookingID', $bookingID);
            $query1 = $this->db->get();
            if ($query1->num_rows() > 0) 
            {    
                $rsStatus = $query1->row_array();          
               if ($status == null) {
                 $stat = $rsStatus['releaseStatus'];
                 $data = array('bookingID' =>$bookingID ,
                            'releaseStatus' => $stat );
               }else{

                 $data = array('bookingID' =>$bookingID ,
                            'releaseStatus' => $status );
               }
              


              $this->db->where('bookingID', $bookingID);
              $this->db->update('vg_payment_release', $data);
              $insert_id = 'release payment updated';
              return $insert_id ;

            }else{

              $data = array('bookingID' =>$bookingID ,
                         'trainerID' =>$trainerID ,
                         'releaseStatus' => '1' );
           

              $this->db->insert('vg_payment_release', $data);
              $insert_id = 'release payment inserted';
              return $insert_id ;
            }
        }
        else
        {
            return false;
        }        
  
    }

    function become_trainer_customer($userID,$userBecome)
    {
       $this->db->where('ID', $userID);
       $query2 = $this->db->query("select * from `vg_users` where `ID` = '".$userID."'");
       $result=$query2->result_array();
       $data=array('UserType'=>$result[0]['UserType'].','.$userBecome);
       $res=$this->db->update('vg_users', $data);
       if($userBecome==1){
        $query = $this->db->query("select * from `vg_users` where `ID` = '".$userID."' AND `UserType` LIKE '%1%'");
      }else{
        $query = $this->db->query("select * from `vg_users` where `ID` = '".$userID."' AND `UserType` LIKE '%2%'");
      }
      return $query->result_array();
    }

    function trainer_wallet($trainerID){
         $query = $this->db->query("SELECT w1.`walletID`, u1.`UserName` trainerName, SUM(w1.`walletCredit`) walletAmount FROM `vg_wallet` as w1 join `vg_users` as u1 on w1.`walletUserID` = u1.`ID` WHERE w1.`walletUserID`='".$trainerID."'");    
         return $query->result_array();
        
    }

    function check_oldPassword($userID,$oldPassword)
    {
        $query = $this->db->query("SELECT * from `vg_users` WHERE `ID`='".$userID."' AND `UserPassword`='".md5($oldPassword)."'");    
        return $query->result_array();
    }

    function change_password($userID,$password){
      $this->db->where('ID', $userID);
      $data=array('UserPassword'=>md5($password));
      $res=$this->db->update('vg_users', $data);
      return $res;
    }

    function customer_transaction($customerID)
    {
        $query = $this->db->query("SELECT b1.`bookingID`, p1.`paymentAmount`, p1.`transactionID`, p1.`chargeID` FROM `vg_booking` as b1 join `vg_payment` as p1 on b1.`userID` = p1.`customerID`    WHERE b1.`bookingStatus` in (2,3) and b1.`bookingID` = p1.`bookingID` AND b1.`userID`='".$customerID."'");    
        return $query->result_array();
    }

    function trainer_transaction($trainerID)
    {
        $query = $this->db->query("SELECT b1.`trainerID`,  u1.`UserName` trainerName, u2.`UserName` customerName, p1.`paymentAmount` totalAmount, (p1.`paymentAmount`*10/100)as commission, pr.`releaseDate`, pr.`releaseStatus`   FROM `vg_booking` as b1 join `vg_payment` as p1 on b1.`bookingID` = p1.`bookingID` join `vg_users` as u1 on (b1.`trainerID` = u1.`ID` ) join `vg_users` as u2 on (p1.`customerID` = u2.`ID` ) join `vg_payment_release` as pr on p1.`bookingID` = pr.`bookingID` AND b1.`trainerID`='".$trainerID."'");    
        return $query->result_array();
    }

    function forget_password($mobileNumber,$password){

      $query = $this->db->query("select ID from `vg_users` where `UserPhone` = '".$mobileNumber."'");
      $ss= $query->result_array();  
      if($ss)
      {
        $this->db->where('ID', $ss[0]['ID']);
        $data=array('UserPassword'=>md5($password));
        $res=$this->db->update('vg_users', $data);
        return $res;
      }
      else
      {
        return false;
      }
    }
}
