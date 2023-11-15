<?php

			
			$subject = "Cron Job Test.";
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
<h2 align='center'>If you receive this mail, please revert for it is test email from the portal.</h2>
				
<h2 align='center'>You can as well reply with feedback.</h2>

<h3 align='center'>Regards\n <strong>Support Team.</strong></h3>


</body>
</html>
			";
						
			
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: info@ptmfb.pncitservdesk.com". "\r\n" .
						"CC: john.ochai@nanrotechnology.ng";

		$sentmail = mail($to,$subject,$message,$headers);
if($sentmail){
	echo 'Success';
}else{
	echo 'Failed';
}
			
		// Email End
			
			
				
							?> 
