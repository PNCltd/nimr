<?php
include('db_connect.php');
$nown = date('Y-m-d');
$due1 = date('Y-m-d', strtotime($nown . '+2 days'));
$nn = date('Y-M-d H:i:s', strtotime("-1 hour"));
//$nn = date('Y-M-d H:i:s');
//$nn = date('Y-M-d H:i:s');
$now = date('yy-m-d H:i:s');
$chkemail = $conn->query("SELECT * from issue_log where  status = 'Open' && (escalate1 = 'No' or escalate2 = 'No' )") or die('Error '.mysqli_error());
		if($chkemail->num_rows> 0){
			$messagecount = 0;
			while($rowm= $chkemail->fetch_assoc()):
			
			
			// Getting the IT Staff details
			$staff_details = $conn->query("SELECT * from users2 where staff_id = '".$rowm['IT_staff_ass']."'") or die('Error '.mysqli_error());
			
			while($IT_staff = $staff_details->fetch_assoc()):
			
			// Getting the Managers details base on the IT Staff selected
			$manager_details = $conn->query("SELECT * from users2 where staff_id = '".$IT_staff['my_manager']."'") or die('Error '.mysqli_error());
			
			while($staff_manager = $manager_details->fetch_assoc()):
			
				if( ($now) >= (date('yy-m-d H:i:s', strtotime($rowm['date_assigned'] . '+48 hours'))) && $rowm['escalate1'] = 'No' ){
					echo "<br>Issue ".$rowm['id']." was logged at ".$rowm['date_assigned']." and mail will be sent to Manager at ".(date('yy-m-d H:i:s', strtotime($rowm['date_assigned'] . '+48 hours'))).' through '.$IT_staff['email']. ' and '.$staff_manager['email'];
					
					// Send mail 
					// Manager of IT Staff receives mail if issue not closed within 48 hours 
					
					$subject = "Issue Overdue to Close.";
			$to = $staff_manager['email'];

			
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
<h1 style='color:#f40;' align='center'>Hi ".$staff_manager['firstname'].' '.$staff_manager['othername']. ' '.$staff_manager['surname']."!</h1>
<h2 align='center'>Your attention is needed for issue due to be closed.</h2>

<h2 align='center'>Issue assigned to ".$IT_staff['firstname'].' '.$IT_staff['othername']. ' '.$IT_staff['surname']." has not been attended to.</h2>


<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$rowm['requester_name']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$rowm['issue_detail']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$rowm['issue_catg']."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$rowm['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$rowm['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <th>".$rowm['date_assigned']."</th>
     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
				<h4 align='center'><a href='http://ptmfb.pncitservdesk.com/index.php?page=home'>login to My Account</h4>

</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: '".$IT_staff['email']."'";

		mail($to,$subject,$message,$headers);
					// End send mail to Manager
					
				//Update the Escalation to avoid further mail bein sent
				$update_issue_log = $conn->query("UPDATE issue_log set escalate1 = 'Yes' WHERE id = '".$rowm['id']."'");

					$messagecount = $messagecount + 1;

					
					
				}
			if(($now) >= (date('yy-m-d H:i:s', strtotime($rowm['date_assigned'] . '+72 hours'))) && $rowm['escalate2'] = 'No'){
					echo '<br>Issue was logged at '.$rowm['date_assigned'].' and mail will be sent to Admin at '.(date('yy-m-d H:i:s', strtotime($rowm['date_assigned'] . '+72 hours'))).' through '.$IT_staff['email']. ' and '.$staff_manager['email'];
				
				// Send mail 
					// Admin receives mail if issue not closed within 72 hours 
					
					$subject = "Issue Overdue to Close.";
			$to ="info@ptmfb.pncitservdesk.com";

			
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
<h1 style='color:#f40;' align='center'>Hi ".$staff_manager['firstname'].' '.$staff_manager['othername']. ' '.$staff_manager['surname']."!</h1>
<h2 align='center'>Your attention is needed for issue due to be closed.</h2>

<h2 align='center'>Issue assigned to ".$IT_staff['firstname'].' '.$IT_staff['othername']. ' '.$IT_staff['surname']." and under the supervision of ".$staff_manager['firstname'].' '.$staff_manager['othername']. ' '.$staff_manager['surname']." has not been attended to.</h2>


<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$rowm['requester_name']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$rowm['issue_detail']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$rowm['issue_catg']."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$rowm['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$rowm['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <th>".$rowm['date_assigned']."</th>
     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
				<h4 align='center'><a href='http://ptmfb.pncitservdesk.com/index.php?page=home'>login to My Account</h4>

</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: '".$IT_staff['email']."'";

		mail($to,$subject,$message,$headers);
					// End send mail to Manager
				$update_issue_log = $conn->query("UPDATE issue_log set escalate2 = 'Yes' WHERE id = '".$rowm['id']."'");
							$messagecount = $messagecount + 1;

				}endwhile;endwhile;
		// Email start
			
			$subject = "Issue Overdue to Close.";
			$to = "info@ptmfb.pncitservdesk.com";

			
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
<h1 style='color:#f40;' align='center'>Hi Admin!</h1>
<h2 align='center'>Your attention is needed for issue due to be closed.</h2>
				
<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$rowm['requester_name']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$rowm['issue_detail']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$rowm['issue_catg']."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$rowm['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$rowm['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Due for closing</td>
    // <th>$due1</th>
    
        <th>".date('yy-m-d H:i:s', strtotime($rowm['date_reported'] . '+48 hours'))."</th>

     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
			<h4 align='center'><a href='http://ptmfb.pcnitservdesk.com/index.php?page=attend_issue&id=".$rowm['id']."'>login to My Account</h4>
</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: ochaijohnben@gmail.com";

		mail($to,$subject,$message,$headers);
			
		// Email End
			
			
			
			//$messagecount = $messagecount + 1;
			
		 endwhile;			
			echo "Message was sent $messagecount times for Open issues";
			
			//die();

		} //echo "Message was sent '".$messagecount."' times";
//echo $due1.'<p>'


$chkunassigned = $conn->query("SELECT * from issue_log where  IT_staff_ass = 'Not Assigned'") or die('Error '.mysqli_error());
		if($chkunassigned->num_rows> 0){
			$messagecount1 = 0;
			while($row_unass= $chkunassigned->fetch_assoc()):

			if( ($now) >= (date('yy-m-d H:i:s', strtotime($row_unass['date_reported'] . '+24 hours'))) ){
					echo "<br>Issue ".$row_unass['id']." was logged at ".$row_unass['date_reported']." and mail will be sent to Admin at ".(date('yy-m-d H:i:s', strtotime($row_unass['date_reported'] . '+24 hours')));
					
					// Send mail 
					// Manager of IT Staff receives mail if issue not closed within 48 hours 
					
					$subject = "Issue Overdue to be ASSIGNED.";
					
							//	$to = "info@ptmfb.pncitservdesk.com"; 18/03/2022

			$to = "inem.uko@pnconsultingltd.com"; //18/03/2022

			
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
<h1 style='color:#f40;' align='center'>Hi Admin!</h1>
<h2 align='center'>Your attention is needed for issue due to be Assigned.</h2>



<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$row_unass['requester_name']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$row_unass['issue_detail']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$row_unass['issue_catg']."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$row_unass['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$row_unass['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <th>".$row_unass['date_assigned']."</th>
     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
				<h4 align='center'><a href='http://ptmfb.pncitservdesk.com/index.php?page=home'>login to My Account</h4>

</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: john.ochai@nanrotechnology.ng";

		mail($to,$subject,$message,$headers);
					// End send mail to Manager
					
				//Update the Escalation to avoid further mail bein sent
							//$messagecount1 += 1;
							$messagecount1 = $messagecount1 + 1;



			}
			
			endwhile;
			

									//echo "Message was sent $messagecount1 times for unassigned issues";

		}

//Emailing head of IT
	$chkunassigned_head = $conn->query("SELECT * from issue_log where  IT_staff_ass = 'Not Assigned'") or die('Error '.mysqli_error());
		if($chkunassigned_head->num_rows> 0){
			$messagecount2 = 0;

			while($row_unass_head= $chkunassigned_head->fetch_assoc()):

			if( ($now) >= (date('yy-m-d H:i:s', strtotime($row_unass_head['date_reported'] . '+48 hours'))) ){
					echo "<br>Issue ".$row_unass_head['id']." was logged at ".$row_unass_head['date_reported']." and mail will be sent to Admin at ".(date('yy-m-d H:i:s', strtotime($row_unass_head['date_reported'] . '+48 hours')));
					
					// Send mail 
					// Admin receives mail if issue not assigned within 48 hours 
					
					$subject = "Issue Overdue to be ASSIGNED.";
			$to = "info@ptmfb.pncitservdesk.com";

			
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
<h1 style='color:#f40;' align='center'>Hi Admin!</h1>
<h2 align='center'>Your attention is needed for issue due to be Assigned.</h2>



<h2 align='center'>Issue Discription</h2>

<table align='center'>
  
  <tr>
    <td>Requester</td>
    <th>".$row_unass_head['requester_name']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <th>".$row_unass_head['issue_detail']."</th>
  </tr>
  <tr>
    <td>Issue Category</td>
    <th>".$row_unass_head['issue_catg']."</th>
  </tr>
  <tr>
    <td>Requested From</td>
    <th>".$row_unass_head['location']."</th>
  </tr>
  
  <tr>
    <td>Date Reported</td>
    <th>".$row_unass_head['date_reported']."</th>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <th>".$row_unass_head['date_assigned']."</th>
     </tr>
    
  
</table>
<p align='center'>Please click the link below to login to your account.</p>
				<h4 align='center'><a href='http://localhost/issuelog/index.php?page=home'>login to My Account</h4>

</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: john.ochai@nanrotechnology.ng";

		mail($to,$subject,$message,$headers);
					// End send mail to Manager
					
				//Update the Escalation to avoid further mail bein sent
							//$messagecount1 += 1;
							$messagecount2 = $messagecount2 +1 ;



			}
			
			endwhile;
			

									//echo "Message was sent $messagecount2 times to Head of IT";

		
						
		}

			
			die();
		
							?> 
