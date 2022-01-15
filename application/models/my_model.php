<?php



class My_model extends CI_Model{

	function __construct() {



	   //parent::Model();



		$this->load->database();

    }



    function admin_login($userEmail,$password,$UserType){
       
       if ($UserType==0) {
       $check_login = $this->db->query("SELECT * 
                     FROM `vg_admin`
                     WHERE `email` = '$userEmail'
                     AND `password` = '$password'
                     AND `UserType` = '$UserType'"); 
        } elseif ($UserType==1) {
          $check_login = $this->db->query("SELECT * 
                     FROM `vg_users`
                     WHERE `UserEmail` = '$userEmail'
                     AND `UserPassword` = '$password'
                     AND `UserType` = '$UserType'"); 
        }
        else{
            $check_login = $this->db->query("SELECT * 
                     FROM `vg_users`
                     WHERE `UserEmail` = '$userEmail'
                     AND `UserPassword` = '$password'
                     AND `UserType` = '$UserType'"); 
        } 

       if($check_login->num_rows() > 0)

        { 

            $rs = $check_login->row_array();

            return $rs;

        }else{

            return FALSE;

        }

    }



	function get_customer() {

        $query = $this->db->query("select * from `vg_users` where `UserType`='2' and `is_deleted`=0");   
        return $query->result_array();
    }



    function get_approved_list(){

        

        $query = $this->db->query("SELECT a.`ID` accountID,a.`trainerID`, b.`UserName`,a.`transitNumber`, a.`institutionNumber`, a.`accountNumber` FROM  vg_trainer_account as a JOIN  vg_users as b ON a.`trainerID` = b.`ID` WHERE a.`approved` = 'true'");

        return $query->result_array();

       

    }

    function get_unapproved_list($arg){

         

         $this->db->set('approved', 'true');

         $this->db->where('ID', $arg);

         $this->db->update('vg_trainer_account');

        

        $query = $this->db->query("SELECT a.`ID` accountID,a.`trainerID`, b.`UserName`,a.`transitNumber`, a.`institutionNumber`, a.`accountNumber` FROM  vg_trainer_account as a JOIN  vg_users as b ON a.`trainerID` = b.`ID` WHERE a.`approved` = 'false'");

        return $query->result_array();

       

    }



    function get_trainer()

    {

        $query = $this->db->query("select a.ID,a.UserName,a.UserPhone,a.UserEmail,a.UserProfile,a.`UserType`,b.`Skills`,b.`experience`,b.`cost_hours`,b.`address` as traingAddress,b.`availableHoursStart`,b.`availableHoursEnd`,b.`availableMon`,b.`availableThe`,b.`availableWed`,b.`availableThu`,b.`availableFri`,b.`availableSat`,b.`availableSun` from `vg_users` as a LEFT JOIN `vg_trainerProfile` as b on (a.`ID`=b.`userID`) where `UserType`='1' and `is_deleted`='0'");

        return $query->result_array();

    }

    function insert_category($data){

    	$this->db->insert('hs_categories', $data); 

    	return "Category Added Successfully";

    }



    function insert_subcategory($data){

        $this->db->insert('hs_sub_categories', $data); 

        return "Subcategory Added Successfully";

    }

    function insert_service($data){

    	$this->db->insert('hs_services', $data); 

    	return "Service Created Successfully";

    }



    function insert_vendor($data){

        $this->db->insert('hs_users', $data); 

        $insert_id = $this->db->insert_id();

        $post_data['user_id']=$insert_id;

        return  $post_data;

    }

    function ongoing_booking(){

        $query = $this->db->query("SELECT a.bookingID, b.`UserName` AS userNm, d.`UserName` AS TrainerNm, a.bookedDate, a.bookedTime, a.bookedHours, c.`cost_hours`,a.`bookingStatus`

FROM `vg_booking` a

JOIN `vg_users` b ON ( a.`userID` = b.`ID` )

JOIN `vg_users` d ON ( a.`trainerID` = d.`ID` )

JOIN `vg_trainerProfile` c ON ( a.`trainerID` = c.`ID` ) where a.`bookingStatus`=1 OR a.`bookingStatus`=2");

         return $query->result_array();

    }



     function complete_booking(){

        $query = $this->db->query("SELECT a.bookingID, b.`UserName` AS userNm, d.`UserName` AS TrainerNm, a.bookedDate, a.bookedTime, a.bookedHours, c.`cost_hours`,a.`bookingStatus`

FROM `vg_booking` a

JOIN `vg_users` b ON ( a.`userID` = b.`ID` )

JOIN `vg_users` d ON ( a.`trainerID` = d.`ID` )

JOIN `vg_trainerProfile` c ON ( a.`trainerID` = c.`ID` ) where a.`bookingStatus`=1 OR a.`bookingStatus`=2");

         return $query->result_array();

    }



    function get_overall_statement(){



        $query = $this->db->query("SELECT b1.`bookingID`, u1.`UserName`as customerName , u2.`UserName` as trainerName, b1.`bookingDate`, b1.`bookedDate`, b1.`bookedTime`, p1.`paymentAmount`, p1.`transactionID`, p1.`chargeID` FROM `vg_booking` as b1 join `vg_users` as u1  on b1.userID = u1.ID join `vg_users` as u2 on b1.trainerID = u2.ID  join `vg_payment` as p1 on b1.`userID` = p1.`customerID`    WHERE b1.`bookingStatus` in (2,3) and b1.`bookingID` = p1.`bookingID`");    

        return $query->result_array();



    }



    function get_trainer_statement(){

         $query = $this->db->query("SELECT b1.`trainerID`,  u1.`UserName` trainerName, u2.`UserName` customerName, p1.`paymentAmount` totalAmount, (p1.`paymentAmount`*10/100)as commission, pr.`releaseDate`, pr.`releaseStatus`   FROM `vg_booking` as b1 join `vg_payment` as p1 on b1.`bookingID` = p1.`bookingID` join `vg_users` as u1 on (b1.`trainerID` = u1.`ID` ) join `vg_users` as u2 on (p1.`customerID` = u2.`ID` ) join `vg_payment_release` as pr on p1.`bookingID` = pr.`bookingID`");    

        return $query->result_array();

        

    }



    

    function get_wallet_statement(){

         $query = $this->db->query("SELECT w1.`walletID`, u1.`UserName` walletName, SUM(w1.`walletCredit`) walletAmount FROM `vg_wallet` as w1 join `vg_users` as u1 on w1.`walletUserID` = u1.`ID` WHERE 1");    

        return $query->result_array();

        

    } 



    function get_release_payment($param1, $param2, $param3)
    {   

        $dt=date("Y-m-d h:m:s");

        $this->db->set('releaseStatus', '3');

        $this->db->set('releaseDate', $dt);

        $this->db->where('releaseID', $param1);

        $this->db->update('vg_payment_release');

        if ($this->db->affected_rows() > 0) {

           



                $data = array('walletUserID' => $param2,

                              'walletCredit' => $param3 );

                $this->db->insert('vg_wallet', $data);

            

        }else{

            

            $query = $this->db->query("SELECT pr.`releaseID`, pr.`bookingID`,pr.`trainerID`, pr.`releaseRequestDate`, ut.`UserName`, p1.`paymentAmount`  FROM `vg_payment_release` as pr join `vg_users` as ut on pr.`trainerID` = ut.`ID` join `vg_payment` as p1 on pr.`bookingID` = p1.`bookingID` WHERE pr.`releaseStatus` = '2'");    

            return $query->result_array();

        }

         

         $query = $this->db->query("SELECT pr.`releaseID`, pr.`bookingID`,pr.`trainerID`, pr.`releaseRequestDate`, ut.`UserName`, p1.`paymentAmount`  FROM `vg_payment_release` as pr join `vg_users` as ut on pr.`trainerID` = ut.`ID` join `vg_payment` as p1 on pr.`bookingID` = p1.`bookingID` WHERE pr.`releaseStatus` = '2'");    

            return $query->result_array();

        

    }

//==========================================================LOG Maintains========================

    public function Insert($tableName='',$tableData='')
    {
      $result=$this->db->insert($tableName, $tableData); 
      return $result;
    }

    public function getSingleData($tableName='',$fieldName='')
    {
       $query=$this->db->where($fieldName)
       ->get($tableName)->row_array();
       return $query;
    }

      public function getMultipleData($tableName='',$fieldName='')
    {
       $query=$this->db->where($fieldName)
       ->get($tableName)->result_array();
       return $query;
    }
    public function Update($tableName='',$tableData='',$ID='')
    {
         $this->db->set($tableData);
         $this->db->where($ID);
         $this->db->update($tableName);
         if ($this->db->affected_rows() > 0) {
            return true;
         }
         else{
            return false;
         }
    }
    public function Delete($tableName='',$fieldName='')
    {
       $this->db->where($fieldName);
       $this->db->delete($tableName);
        if ($this->db->affected_rows() > 0) {
            return true;
         }
         else{
            return false;
         }
    }
    public function getAllRecord($tableName='')
    {
       return $this->db->get($tableName)->result_array();
    }
     //getRecordById
    public function getRecordById($tableName='',$id="")
    {
       return $this->db->where('id',$id)->get($tableName)->row_array();
    }
    //updateRecordById
    public function updateRecordById($tableName='',array $data=[],$id="")
    {
        $this->db->where('id', $id);
        $this->db->update($tableName, $data);
        return true;
    }
    //Get workout plan function
     public function getWorkOutPlan()
    {
        $query = $this->db->query("SELECT wp.`id`,usr.`UserName`,wp.`day` FROM `vg_workout_plan` as wp join `vg_users` as usr on wp.`traineeID` = usr.`ID` where usr.`UserType`=2 and wp.`is_deleted`=0");    

        return $query->result_array();
    }
    //Get workout plan function for trainer
     public function getWorkOutPlanfforTrainer($trainerID)
    {
        $query = $this->db->query("SELECT wp.`id`,usr.`UserName`,wp.`day` FROM `vg_workout_plan` as wp join `vg_users` as usr on wp.`traineeID` = usr.`ID` where usr.`UserType`=2 and wp.`is_deleted`=0 and usr.`trainersID`=$trainerID");    

        return $query->result_array();
    }
    // get all trainers tranee
    public function getTranerTranees($trainersID="")
    {  
       $this->db->where('trainersID', $trainersID);
       $this->db->where(array('UserType'=>2,'is_deleted'=>0));
       return $this->db->get("vg_users")->result_array();
    }
   

}
?>