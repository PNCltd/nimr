  <style>
chatbody {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.showTimestamp { padding-top:20px;font-size:11px; float:right; color:#999999;font-style:normal;font-weight:normal; }

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
<?php  
session_start()	;	
include('db_connect.php');

	
	include 'last_seen.php';
//echo $time = time_stamp($time); for the last seen
	
	
$issue = $conn->query("SELECT * FROM issue_log, users2 where issue_log.staff_id = users2.staff_id && issue_log.id ='".$_SESSION['issue_id']."'" );
foreach($issue->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}


// IT Staff
if($_SESSION['login_type'] == 3){
$cdata = " user_id = '{$meta['staff_id']},{$_SESSION['login_staff_id']}' ";
$cdata2 = " user_id = '{$_SESSION['login_staff_id']},{$meta['staff_id']}' ";
$staff = $conn->query("SELECT * FROM  users2 where staff_id  ='".$meta['staff_id']."'" );
foreach($staff->fetch_array() as $p =>$q){
	$staffd[$p] = $q;
}
}else{
// User	
$cdata = " user_id = '{$meta['IT_staff_ass']},{$_SESSION['login_staff_id']}' ";
$cdata2 = " user_id = '{$_SESSION['login_staff_id']},{$meta['IT_staff_ass']}' ";
$staff = $conn->query("SELECT * FROM  users2 where staff_id  ='".$meta['IT_staff_ass']."'" );
foreach($staff->fetch_array() as $p =>$q){
	$staffd[$p] = $q;
}

}

		
		$chkm = $conn->query("SELECT * from messages where  ($cdata or $cdata2) AND convo_id = '".$_SESSION['issue_id']."' ORDER BY date_created DESC");
		if($chkm->num_rows> 0){

			while($rowm= $chkm->fetch_assoc()):
			list ($me, $you) = explode(',', $rowm['user_id']);
			//if($_SESSION['login_staff_id'] == $me){
			if($_SESSION['login_staff_id'] == $me){

							

//			echo "<li class='right clearfix'><span class='chat-img pull-right'><em>
//                            <img src='assets/uploads/".$_SESSION['login_avatar']."' style='width: 38px;height:38px' class='img-circle elevation-2' alt='User Avatar' class='img-circle' />
//                        </span>
//                            <div class='chat-body clearfix' float: right>
//                                <div class='header' float: right>
//                                    <strong class='primary-font'>".$_SESSION['login_firstname']."</strong> 
//									
//									
//                                </div>
//                                <p>
//                                    ".$rowm['message']."
//									</br><small class='pull-right text-muted'>
//                                        <span class='fa fa-time' ></span>".$rowm['date_created']."</small>
//                                </p>
//                            </div>
//                        </em></li>";
				echo "	<div class='container darker'>
  <img src='assets/uploads/".$_SESSION['login_avatar']."' alt='Avatar' style='width: 38px;height:38px'  class='right'>
  <p>".$rowm['message']."</p>
  <span class='time-right'>".$rowm['date_created']."</span>
 

</div>";
			
echo '<p>';
				}else{
//				echo "<li class='left clearfix'><span class='chat-img pull-left'>
//                            <img src='assets/uploads/".$staffd['avatar']."' style='width: 38px;height:38px' class='img-circle elevation-2' alt='User Avatar' class='img-circle' />
//                        </span>
//                            <div class='chat-body clearfix'>
//                                <div class='header'>
//                                    <strong class='primary-font'>".$staffd['firstname']."</strong> 
//                                </div>
//                                <p>
//                                    ".$rowm['message']."
//									<br><small class='pull-right text-muted'>
//                                        <span class='fa fa-time'></span>".$rowm['date_created']."</small>
//                                </p>
//                            </div>
//                        </li>";
				
				echo "	<div class='container'>
  <img src='assets/uploads/".$staffd['avatar']."' style='width: 38px;height:38px'>
  <p>".$rowm['message']."</p>
  <span class='time-left'>".$rowm['date_created']."</span>
</div>";
			}
			//}else{
				// IT Staff
				
				
				
				
			//}
			 endwhile; 
		}else{
			echo 'No data';
		}

?>