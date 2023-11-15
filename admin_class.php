<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(surname,', ',firstname,' ',othername) as name FROM users2 where email = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	






	/*
	function login(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM users where email = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	} */
	
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	
	// Add Department
	
	function save_dept(){
		extract($_POST);
		// var_dump($_FILES);
		$dept = $_POST['dept'];
		$time = time();

		$save = $this->db->query("INSERT INTO department (dept, time) VALUES('$dept', '$time')");
		
		if($save){
			return 1;
		}
	}
	

	// Add Head
	
	function save_head(){
		extract($_POST);
		// var_dump($_FILES);
		$head = $_POST['head'];
		$created_by = $_POST['created_by'];
		$time = time();

		$save = $this->db->query("INSERT INTO head (head, created_by, time) VALUES('$head', '$created_by', '$time')");
		
		if($save){
			return 1;
		}
	}

	function save_subhead(){
		extract($_POST);
		// var_dump($_FILES);
		$head = $_POST['head'];
		$subhead = $_POST['subhead'];
		$subhead_desc = $_POST['subhead_desc'];
		$created_by = $_POST['created_by'];
		$appropriation = $_POST['appropriation'];
		$allocation = $_POST['allocation'];
		$time = time();

		$save = $this->db->query("INSERT INTO subhead (head, subhead, subhead_desc, appropriation, allocation, created_by, time) VALUES('$head', '$subhead', '$subhead_desc',  '$appropriation', '$allocation','$created_by', '$time')");
		
		if($save){
			return 1;
		}
	}

	
	function save_issue(){
		

		$idd=$_POST['id'];
		//$id = 'ISR'.$idd;
		$staff_id=$_POST['staff_id'];
		$requester_name=$_POST['requester_name'];
		$issue_type=$_POST['issue_type'];
		$issue_detail=$_POST['issue_detail'];

		$location=$_POST['location'];

		if($issue_type == 'Request'){
			$id = 'REQ'.$idd;
		}else{
			$id = 'ISS'.$idd;
		}

		//$data = " issue_type ='$issue_type' ";
		//$data = " staff_id ='$staff_id' ";
		//$data = " id ='$nn' ";

		//$data .= ", issue_detail ='".htmlentities(str_replace("'","&#x2019;",$issue_detail))."' ";

			$save = $this->db->query("INSERT INTO issue_log (id, staff_id, requester_name, issue_type, issue_detail, location) VALUES('$id', '$staff_id', '$requester_name', '$issue_type', '$issue_detail', '$location') ") ;
		

			$update_alg = $this->db->query("UPDATE issue_alg set lastno = $idd WHERE id = 1");

		if($save){
			return 1;
		}
	}
	



function save_allocation(){
		
		
		//$added_by=$_POST['staff_id'];
		$added_by=$_POST['firstname'].' '.$_POST['othername'].' '.$_POST['surname'];
		$transAmount=$_POST['transAmount'];
		$subhead=$_POST['subhead'];
		$narrative=$_POST['narrative'];
		//$balance= $_POST['balance'];
		
		$transtype = 'Allocation';
		
		// Get balance, appropriation, totalAllocated

		$get_last_trans = $this->db->query("SELECT appropriation, totalAllocated, balance FROM transactions_tbl where subhead = '".$subhead."' ORDER by date_added DESC LIMIT 1");


	$row_last_trans = mysqli_fetch_array($get_last_trans);
	$balance = floatval($row_last_trans["balance"]) + floatval($transAmount);
	$appropriation = $row_last_trans["appropriation"];
	$totalAllocated = floatval($row_last_trans["totalAllocated"]) + floatval($transAmount);
		
		//


			$save = $this->db->query("INSERT INTO `transactions_tbl`(`subhead`, `appropriation`, `transAmount`, `totalAllocated`, `added_by`,  `balance`, `narrative`, `transtype`) VALUES('$subhead', '$appropriation', '$transAmount', '$totalAllocated', '$added_by', '$balance', '$narrative', '$transtype') ") ;
		
			
		if($save){
			return 1;
		}
	}
	



	function save_pv(){
		
		$id=$_POST['id'];
		$staff_id=$_POST['staff_id'];
		$staff_name=$_POST['firstname'].' '.$_POST['othername'].' '.$_POST['surname'];
		$head=$_POST['head'];
		$subhead=$_POST['subhead'];
		$subhead_desc=$_POST['subhead_desc'];
		$psum=$_POST['psum'];
		$totalPayable=$_POST['payable'];
		$pv_detail=$_POST['pv_detail'];
		$location=$_POST['location'];
		$pv_type=$_POST['pv_type'];
		
		
		$transtype = 'Expenses';

		$transAmount = $psum;
		
		// Get balance, appropriation, totalAllocated

		$get_last_trans = $this->db->query("SELECT appropriation, totalAllocated, balance FROM transactions_tbl where subhead = '".$subhead."' ORDER by date_added DESC LIMIT 1");


	$row_last_trans = mysqli_fetch_array($get_last_trans);
	$balance = floatval($row_last_trans["balance"]) - floatval($psum);
	$appropriation = $row_last_trans["appropriation"];
	$totalAllocated = floatval($row_last_trans["totalAllocated"]);
		$narrative = 'PV raised';
		//

		//$data = " issue_type ='$issue_type' ";
		//$data = " staff_id ='$staff_id' ";
		//$data = " id ='$nn' ";

		//$data .= ", issue_detail ='".htmlentities(str_replace("'","&#x2019;",$issue_detail))."' ";
// INSERT INTO `pv_table`(`id`, `staff_id`, `staff_name`, `pv_detail`, `head`, `subhead`, `subhead_desc`, `psum`, `totalPayable`, `date_created`, `date_attended_by_audit`, `auditor`, `auditor_remark`, `auditor_approved`, `date_attended_by_treasury`, `treasurer`, `treasurer_remark`, `treasurer_approved`, `staff_ass`, `reassigned`, `reassigned_staff`, `date_assigned`, `status`, `date_reassigned`, `location`)


			$save = $this->db->query("INSERT INTO pv_table (`id`, `staff_id`, `staff_name`, `pv_detail`, `head`, `subhead`, `subhead_desc`, `pv_type`, `psum`, `totalPayable`, `location`) VALUES('$id', '$staff_id', '$staff_name', '$pv_detail', '$head', '$subhead', '$subhead_desc', '$pv_type', '$psum', '$totalPayable','$location') ");
		

			$update_alg = $this->db->query("UPDATE pv_alg set lastno = $id WHERE id = 1");

			$saveTransaction = $this->db->query("INSERT INTO `transactions_tbl`(`subhead`, `appropriation`, `transAmount`, `totalAllocated`, `added_by`,  `balance`, `narrative`, `transtype`) VALUES('$subhead', '$appropriation', '$transAmount', '$totalAllocated', '$staff_name', '$balance', '$narrative', '$transtype') ") ;

			// Trial begins


$files = array_filter($_FILES['doc_file']['name']);
$total_count = count($_FILES['doc_file']['name']);
	if ($total_count > 0) {
	    for( $n=0 ; $n < $total_count ; $n++ ) {
		//The temp file path is obtained
   $tmpFilePath = $_FILES['doc_file']['tmp_name'][$n];
        //A file path needs to be present
       if ($tmpFilePath != ""){
           //Setup our new file path
           
     

       	 $y = $id.'_'.date("m_Y"); 
           $doc_file = $y.$_FILES['doc_file']['name'][$n];
        $newFilePath = "pv_documents/".$doc_file;
       move_uploaded_file($tmpFilePath, $newFilePath);


         //Other code goes here
      
			$doc_name   = $_POST["doc_name"][$n];
			$pv_no = 	$id;
		
			
			// $queryne  = "INSERT INTO pv_documents(`pv_no`,`doc_name `, `doc_file`) VALUES ('$groupid','$doc_name ','$doc_file')";
			// $resultne = mysqli_query($conn, $queryne);


			$saveDoc = $this->db->query("INSERT INTO pv_documents(`pv_no`,`doc_name`, `doc_file`) VALUES ('$pv_no','$doc_name','$doc_file')") ;
		


		}
	    }
	    
	}



			// End of trial

		if($save){
			return 1;
		}
	}
	


	
	function save_search(){
		
		
//		$datey = DateTime::createFromFormat("Y-m-d", $_POST['enddate'])->format("Y");
//		$datem = DateTime::createFromFormat("Y-m-d", $_POST['enddate'])->format("m");
//		$dated = DateTime::createFromFormat("Y-m-d", $_POST['enddate'])->format("d");
//
//$mynewdate = $datem;
//						$_SESSION['enddatenum'] = (intval($_POST['$mynewdate']));
		if($_POST['enddate'] < $_POST['startdate']){
return 1;		}

		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		$catg= $_POST['catg'];

		$_SESSION['startdate'] = $startdate;
							

		$_SESSION['catg'] = $catg;

//		$_SESSION['enddatenum'] = (intval($_POST['enddate']));



				
		//$_SESSION['startdate'] = date('Y-m-d', strtotime($startdate. '-1 day'));

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));


			return 1;
		
	}
	

	function save_search_pv(){
		
	if($_POST['enddate'] < $_POST['startdate']){
return 1;		}

		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		$catg= $_POST['catg'];

		$_SESSION['startdate'] = $startdate;
							

		$_SESSION['catg'] = $catg;

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));

			return 1;
		
	}


	function save_reports(){
		
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		$location= $_POST['location'];

		$_SESSION['startdate'] = $startdate;
							

		$_SESSION['location'] = $location;


				
		//$_SESSION['startdate'] = date('Y-m-d', strtotime($startdate. '-1 day'));

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));


			return 1;
		
	}
	
	function save_reportscat(){
		
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		$issue_catg= $_POST['issue_catg'];

		$_SESSION['startdate'] = $startdate;
							

		$_SESSION['issue_catg'] = $issue_catg;


				
		//$_SESSION['startdate'] = date('Y-m-d', strtotime($startdate. '-1 day'));

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));


			return 1;
		
	}
	
	function save_searcho(){
		
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		
		$_SESSION['startdate'] = $startdate;
				
		//$_SESSION['startdate'] = date('Y-m-d', strtotime($startdate. '-1 day'));

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));


			return 1;
		
	}
	
	
	function save_searchc(){
		
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];

		
		$_SESSION['startdate'] = $startdate;
				

		$_SESSION['enddate'] = date('Y-m-d', strtotime($enddate. '+1 day'));


			return 1;
		
	}
	
	
	
	// Save issue 
	
	
	// end of save issue
	
	
	function save_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}

		$check = $this->db->query("SELECT * FROM users2 where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if($_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users2 set $data");
		}else{
			$save = $this->db->query("UPDATE users2 set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	function update_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','table')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if($_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set $data");
		}else{
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if($save){
			foreach ($_POST as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			if($_FILES['img']['tmp_name'] != '')
			$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users2 where id = ".$id);
		if($delete)
			return 1;
	}
	
	function delete_dept(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM department where dept_id = ".$id);
		if($delete)
			return 1;
	}

		function delete_head(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM head where head_id = ".$id);
		if($delete)
			return 1;
	}

		function delete_subhead(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM subhead where subhead_id = ".$id);
		if($delete)
			return 1;
	}
	
	function delete_location(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM location where loc_id = ".$id);
		if($delete)
			return 1;
	}
	
	function delete_issue(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM issue_log where id = '".$id."'");
		if($delete)
			return 1;
	}
	function upload_file(){
		extract($_FILES['file']);
		// var_dump($_FILES);
		if($tmp_name != ''){
				$fname = strtotime(date('y-m-d H:i')).'_'.$name;
				$move = move_uploaded_file($tmp_name,'assets/uploads/'. $fname);
		}
		if(isset($move) && $move){
			return json_encode(array("status"=>1,"fname"=>$fname));
		}
	}
	function remove_file(){
		extract($_POST);
		if(is_file('assets/uploads/'.$fname))
			unlink('assets/uploads/'.$fname);
		return 1;
	}
	function delete_file(){
		extract($_POST);
		$doc = $this->db->query("SELECT * FROM documents where id= $id")->fetch_array();
		$delete = $this->db->query("DELETE FROM documents where id = ".$id);
		if($delete){
			foreach(json_decode($doc['file_json']) as $k => $v){
				if(is_file('assets/uploads/'.$v))
				unlink('assets/uploads/'.$v);
			}
			return 1;
		}
	}
	function save_upload(){
		extract($_POST);
		// var_dump($_FILES);
		$data = " title ='$title' ";
		$data .= ", description ='".htmlentities(str_replace("'","&#x2019;",$description))."' ";
		$data .= ", user_id ='{$_SESSION['login_staff_id']}' ";
		$data .= ", file_json ='".json_encode($fname)."' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO documents set $data ");
		}else{
			$save = $this->db->query("UPDATE documents set $data where id = $issue_id");
		}
		if($save){
			return 1;
		}
	}
	
	// Save Location
	function save_location(){
		extract($_POST);
		// var_dump($_FILES);
		$location = $_POST['location'];
		$time = $_POST['time'];

		$save = $this->db->query("INSERT INTO location (location, time) VALUES('$location', '$time')");
		
		if($save){
			return 1;
		}
	}
	
	function edit_location(){
		extract($_POST);
		// var_dump($_FILES);
		$loc_id  = $_POST['loc_id'];
		$location  = $_POST['location'];

		$save = $this->db->query("UPDATE location set location = '".$location."' WHERE loc_id = '".$loc_id."' ");
		
		if($save){
			return 1;
		}
	}
	
	function save_color(){
		extract($_POST);

		// var_dump($_FILES);
		$color  = $_POST['color'];

		$save = $this->db->query("UPDATE theme set status = 1  WHERE color = '".$color."' ");
				$save1 = $this->db->query("UPDATE theme set status = 0  WHERE color != '".$color."' ");

		
		if($save){
			return 1;
		}
	}
	
	function save_manager(){
		extract($_POST);
		// var_dump($_FILES);
		$staff_id  = $_POST['staff_id'];
		$manager  = "Yes";
		$date_assigned = date('yy-m-d H:i:s');
		$save = $this->db->query("UPDATE users2 set manager = '".$manager."' WHERE staff_id = '".$staff_id."' ");
		
		if($save){
			
					
		//sending email verification
		
		$get_email = $this->db->query("SELECT email FROM users2 where staff_id = '".$staff_id."'");

$row = mysqli_fetch_array($get_email);

		$to = $row['email'];
		
			$subject = "You have been made a Manager.";
			$message = "
				<html>
				<head>
				<title>Manager's responsibility</title>
				</head>
				<body>
				<h1 style='color:#f40;'>Congratulations Staff!</h1>
				<h2 style='color:#f40;'>You have been made a Manager.</h2>

				<p>Responsibilities Description:</p>
				<h3>Being made a Manager, you have the following responsibilities</h3>
				<h3>1. You will have Staff under you to manage.</h3>
				<h3>2. You will still have your normal responsibility of attending to issue as IT Staff.</h3>
				<h3>3. You  have be checking the activities of Staff under you.</h3>




				<p></p>
				

				<p>Date assigned the responsibility: ".$date_assigned."</p>

				
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

	mail($to,$subject,$message,$headers);
//			
			return 1;
		}
	}
	
	// confirm save manager before saving
	
	function save_managerc(){

		extract($_POST);
		// var_dump($_FILES);
		$_SESSION['manager']  = $_POST['manager'];
				

		//$manager  = "Yes";
			return 1;

		//$save = $this->db->query("UPDATE users2 set manager = '".$manager."' WHERE staff_id = '".$staff_id."' ");
		
	
	}
	
	// Assign Manager to IT Staff
	function save_managers(){
		extract($_POST);
		// var_dump($_FILES);
		$staff_id  = $_POST['staff_id'];
		$my_manager  = $_POST['my_manager'];

		$save = $this->db->query("UPDATE users2 set my_manager = '".$my_manager."' WHERE staff_id = '".$staff_id."' ");
		
		if($save){
			
			//sending email verification
		$email = $this->db->query("SELECT email FROM users2 where concat(firstname,' ',othername,' ',surname) = '".$managertoremove."'");
		$email = $this->db->query("SELECT email FROM users2 where staff_id = '".$staff_id."'");

		$to = $email;
			$subject = "Assigning Manager.";
			$message = "
				<html>
				<head>
				<title>Assigning Manager</title>ger
				</head>
				<body>
				<h1 style='color:#f40;'>Dear ".$staff_id."!</h1>
				<h2 style='color:#f40;'>You have been assigned ".$my_manager." as your Manager.\n He/She will have access to your review the progress of your work.</h2>




				<p></p>
				

				<p>Date assigned the responsibility: ".$date_assigned."</p>

				
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";
			
			
		$email2 = $this->db->query("SELECT email FROM users2 where concat(firstname,' ',othername,' ',surname) = '".$my_manager."'");

		$to2 = $email2;
			$subject2 = "Assigning IT Staff.";
			$message2 = "
				<html>
				<head>
				<title>Assigning IT Staff</title>ger
				</head>
				<body>
				<h1 style='color:#f40;'>Dear ".$my_manager."!</h1>
				<h2 style='color:#f40;'>The Staff with the Id ".$my_manager." have been assigned  to you.\n You will now have access to his/her works to review the progress of the works.</h2>




				<p></p>
				

				<p>Date assigned the responsibility: ".$date_assigned."</p>

				
				</body>
				</html>
				";

		mail($to,$subject,$message,$headers);
			
		mail($to2,$subject2,$message2,$headers);

			
			
			return 1;
		}
	}
	
	//Revoke Manager
	function save_rmanager(){
		extract($_POST);
		// var_dump($_FILES);
		$my_manager  = $_POST['my_manager'];
		$staffname  = $_POST['staffname'];

		//$manager  = "No";
//,concat(surname,', ',firstname,' ',othername)
		$save = $this->db->query("UPDATE users2 set  my_manager = '".$my_manager."' WHERE concat(firstname,' ',othername,' ',surname) = '".$staffname."' ");
		
		if($save){
			return 1;
		}
	} 
	//Revoke Confirmeed Manager with no SUbject
	function save_rmanagerc(){
		extract($_POST);
		// var_dump($_FILES);
		$managertoremove  = $_POST['managertoremove'];
		$date_assigned = date('yy-m-d H:i:s');

		$manager  = "No";
//,concat(surname,', ',firstname,' ',othername)
		$save = $this->db->query("UPDATE users2 set  manager = '".$manager."' WHERE concat(firstname,' ',othername,' ',surname) = '".$managertoremove."' ");
		
		if($save){
			
			//sending email verification
	//	$email = $this->db->query("SELECT email FROM users2 where concat(firstname,' ',othername,' ',surname) = '".$managertoremove."'");

$get_email = $this->db->query("SELECT email FROM users2 where concat(firstname,' ',othername,' ',surname) = '".$managertoremove."'");
$row = mysqli_fetch_array($get_email);

		$to = $row['email'];

	//	$to = $email;
			$subject = "Your Managership have been withdraw.";
			$message = "
				<html>
				<head>
				<title>Revoked Manager's responsibility</title>
				</head>
				<body>
				<h1 style='color:#f40;'>Dear ".$managertoremove."!</h1>
				<h2 style='color:#f40;'>You are no longer a Manager from the time of receipt of this mail.</h2>

				<p>New Responsibilities Description:</p>
				<h3>Due to the withdrawal of your managership, you have the following responsibilities</h3>
				<h3>1. You will no longer have Staff under you to manage.</h3>
				<h3>2. You will  have your normal responsibility of attending to issue as IT Staff.</h3>
				<h3>3. You will not  be checking the activities of other IT Staff again.</h3>




				<p></p>
				

				<p>Date assigned the responsibility: ".$date_assigned."</p>

				
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

		mail($to,$subject,$message,$headers);
			
			return 1;
		}
	} 
	function edit_dept(){
		extract($_POST);
		// var_dump($_FILES);
		$dept_id  = $_POST['dept_id'];
		$dept  = $_POST['dept'];

		$save = $this->db->query("UPDATE department set dept = '".$dept."' WHERE dept_id = '".$dept_id."' ");
		
		if($save){
			return 1;
		}
	}

	function edit_head(){
		extract($_POST);
		// var_dump($_FILES);
		$head_id  = $_POST['head_id'];
		$head  = $_POST['head'];
		$created_by  = $_POST['created_by'];

		$save = $this->db->query("UPDATE head set head = '".$head."', created_by = '".$created_by."' WHERE head_id = '".$head_id."' ");
		
		if($save){
			return 1;
		}
	}

	function edit_subhead(){
		extract($_POST);
		// var_dump($_FILES);
		$subhead_id  = $_POST['subhead_id'];
		$head  = $_POST['head'];
		$subhead  = $_POST['subhead'];
		$appropriation = $_POST['appropriation'];
		$allocation = $_POST['allocation']; 
		$subhead_desc  = $_POST['subhead_desc'];
		$created_by  = $_POST['created_by'];
		$updated_by  = $_POST['updated_by'];

		$save = $this->db->query("UPDATE subhead set head = '".$head."', subhead = '".$subhead."', subhead_desc = '".$subhead_desc."', appropriation = '".$appropriation."', allocation = '".$allocation."', created_by = '".$created_by."',  updated_by = '".$updated_by."' WHERE subhead_id = '".$subhead_id."' ");

//$action = "Updated subhead with head = '".$head."', subhead = '".$subhead."'";

		$action = "Updated subhead with headerytutr";
		$action_by = $updated_by;

	$save_log3 = $this->db->query("INSERT INTO log_track (action, action_by) VALUES('".$action."', '".$updated_by."')");


//$save = $this->db->query("INSERT INTO department (dept, time) VALUES('$dept', '$time')");
		

		// save_logTracking("Diret actjkf", "Direct John ben");
		
		if($save){
			return 1;
		}
	}


	// Log keeping
function save_logTracking($action, $action_by){
		
		$save_log3 = $this->db->query("INSERT INTO log_track (action, action_by) VALUES('".$action."', '".$action_by."')");
			}


// End of log keeping


	// End of Save location
	
	
	function save_assign(){
			//extract($_POST);
				//$data = " IT_staff_ass ='$IT_staff_ass' ";
				//$data = " date_assigned ='$date_assigned' ";
				//$data = " date_closed ='$date_assigned' ";


		//IT_staff_ass ='$IT_staff_ass';
if($_POST['issue_type'] == 'Issue')
{
			$issue_catg = $_POST['issue_catg'] ;

}else{
	$issue_catg = 'Request';
}
		
		$IT_staff_ass=$_POST['IT_staff_ass'];
		$date_assigned=$_POST['date_assigned'];
					
		$date_closed=$_POST['date_closed'];
		$issue_id = $_POST['issue_id'];
		$emailarray = $this->db->query("SELECT email, firstname, othername, surname FROM users2 where staff_id = '".$IT_staff_ass."'");
		
// 	
		$save = $this->db->query("UPDATE issue_log set IT_staff_ass = '".$IT_staff_ass."', date_assigned = '".$date_assigned."', date_closed = '".$date_closed."' , issue_catg = '".$issue_catg."'    where id = '".$_SESSION['issue_id']."' ");

		

		if($save){
			 while($rowemail= $emailarray->fetch_assoc()):
  		$staff =  $rowemail['firstname'].' '.$rowemail['othername'].' '.$rowemail['surname'];
		
		$to = $rowemail['email'];;
			endwhile;
			$subject = "Issue has been assigned to you.";
			$message = "
			<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body >
<h1 style='color:#f40;' align='center'>Hi ".$staff."!</h1>
<h2 align='center'>Your attension is needed to attend to an issue.</h2>
				
<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$_POST['requester']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$_POST['issue']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$issue_catg."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$_POST['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$_POST['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <th>$date_assigned</th>
     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
				<h4 align='center'><a href='http://ptmfb.pncitservdesk.com/index.php?page=attend_issue&id=$issue_id'>login to My Account</h4>

</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

		mail($to,$subject,$message,$headers);
			return 1;
		}
	}
	
	function save_attend(){


		$resolution=$_POST['resolution'];
					
		$date_attended=$_POST['date_attended'];
		
		$save = $this->db->query("UPDATE issue_log set  date_attended = '".$date_attended."', resolution = '".$resolution."'    where id = '".$_SESSION['issue_id']."' ") ;


		if($save){
			return 1;
		}
	}

// Audit attend to PV
	function save_attend_a(){


		$auditor_remark=$_POST['auditor_remark'];
				
		$date_attended_by_audit=$_POST['date_attended'];
		$auditor_approved=$_POST['auditor_approved'];
		$auditor=$_POST['auditor'];
		
		//`date_attended_by_audit`, `auditor`, `auditor_remark`, `auditor_approved`,

		$save = $this->db->query("UPDATE pv_table set  date_attended_by_audit = '".$date_attended_by_audit."', auditor_remark = '".$auditor_remark."', auditor_approved = '".$auditor_approved."', auditor = '".$auditor."'    where id = '".$_SESSION['pv_id']."' ") ;


		if($save){
			return 1;
		}
	}


	// attend to PV
	function save_attend_pv(){


if($_POST['dept'] =='Audit'){


		$auditor_remark=$_POST['auditor_remark'];
		$date_attended_by_audit=$_POST['date_attended'];
		$auditor_approved=$_POST['auditor_approved'];
		$auditor=$_POST['auditor'];
		
		//`date_attended_by_audit`, `auditor`, `auditor_remark`, `auditor_approved`,

		$save = $this->db->query("UPDATE pv_table set  date_attended_by_audit = '".$date_attended_by_audit."', auditor_remark = '".$auditor_remark."', auditor_approved = '".$auditor_approved."', auditor = '".$auditor."'    where id = '".$_SESSION['pv_id']."' ") ;


		if($save){
			return 1;
		}
	}


	if($_POST['dept'] =='Treasury'){


		$treasurer_remark=$_POST['treasurer_remark'];
		$date_attended_by_treasury=$_POST['date_attended'];
		$treasurer_approved=$_POST['treasurer_approved'];
		$treasurer=$_POST['treasurer'];
		
		//`date_attended_by_audit`, `auditor`, `auditor_remark`, `auditor_approved`,

		$save = $this->db->query("UPDATE pv_table set  date_attended_by_treasury = '".$date_attended_by_treasury."', treasurer_remark = '".$treasurer_remark."', treasurer_approved = '".$treasurer_approved."', treasurer = '".$treasurer."'    where id = '".$_SESSION['pv_id']."' ") ;


		if($save){
			return 1;
		}
	}
}

	
		function save_close(){
			

		
		$date_closed =$_POST['date_closed'];
		$status = "Closed";
		$closed_by = $_POST['closed_by'];
			
			
		
		$save = $this->db->query("UPDATE issue_log set status = '".$status."', closed_by = '".$closed_by."', date_closed = '".$date_closed."'    where id = '".$_SESSION['issue_id']."' ");

     
		if($save){
			return 1;
		}
	}
	  
	function save_reassign(){
				
		$date_reassigned=$_POST['date_reassigned'];
		$reassigned = "Yes";
		$reassigned_IT_staff = $_POST['reassigned_IT_staff'];
		$save = $this->db->query("UPDATE issue_log set date_reassigned = '".$date_reassigned."', reassigned = '".$reassigned."', reassigned_IT_staff = '".$reassigned_IT_staff."'   where id = '".$_SESSION['issue_id']."' ") or die('Error Occured'.mysql_error());

	if($save){
		
//		//sending email verification
		$email = $this->db->query("SELECT email FROM users2 where staff_id = '".$reassigned_IT_staff."'");

		$to = $email;
			$subject = "Issue has been reassigned to you.";
			$message = "
				<html>
				<head>
				<title>Issue Reassigned</title>
				</head>
				<body>
				<h1 style='color:#f40;'>Hi Staff!</h1>
				<h2>Your attension needed to attend to an issue.</h2>
				<p>Issue Description:</p>
				<p>Requester: ".$_POST['requester']."</p>
				<p>Issue: ".$_POST['issue']."</p>
				<p>Issue Category: ".$issue_catg."</p>
				<p>Requested From: ".$_POST['location']."</p>

				<p>IT Staff Assigned: ".$IT_staff_ass."</p>
				<p>Date reassigned: ".$date_reassigned."</p>

				<p>Please click the link below to login to your account.</p>
				<h4><a href='http://www.issuelog.com/activate.php?uid=$issue_catg&code=$date_reassigned'>Activate My Account</h4>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"BC: ochaijohnben@gmail.com";

		mail($to,$subject,$message,$headers);
			return 1;
		}
	}
	
	function send_chat(){
		extract($_POST);
		return 1;
		$data = " message = '$message' ";
		$data .= ", user_id = '{$_SESSION['login_staff_id']}' ";
		if(empty($convo_id)){
			$cdata = " user_ids = '$user_id,{$_SESSION['login_staff_id']}' ";
			$cdata2 = " user_ids = '{$_SESSION['login_staff_id']},$user_id' ";
			$user_ids = $_SESSION['login_staff_id'].",".$user_id;
			$chk = $this->db->query("SELECT * from thread where $cdata or $cdata2 ");
			if($chk->num_rows> 0){
				$convo_id = $chk->fetch_array()['id'];
			}else{
				$thread = $this->db->query("INSERT INTO thread set $cdata ");
				$convo_id = $this->db->insert_id;
			}
		}else{
			$qry =$this->db->query("SELECT * from thread where md5(id) ='$convo_id' ")->fetch_array();
			$convo_id = $qry['id'];
			$user_ids = $qry['user_ids'];

		}
		$data .= ", convo_id = '$convo_id' ";
		$save = $this->db->query("INSERT INTO messages set $data");
		if($save)
			return json_encode(array('status'=>1,'convo_id'=>md5($convo_id),'convo_users'=>$user_ids));
	}
	function load_convo(){
		extract($_POST);
		$data = array();
		$get = $this->db->query("SELECT m.message,u.staff_id,u.firstname,u.avatar FROM messages m inner join users2 u on u.staff_id = m.user_id where md5(m.convo_id) = '$convo_id' ");
		while($row= $get->fetch_assoc()){
			$data[] = $row;
		}
		return json_encode($data);
	}
}