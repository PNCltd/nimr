<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
		$qry = $conn->query("SELECT * FROM issue_log where id = '".$_GET['id']."'")->fetch_array() or die('error occured'.mysqli_error());
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<div class="card card-widget widget-user shadow">
      <div class="widget-user-header bg-red">
        <h3 class="widget-user-username"><?php echo ucwords($issue_detail) ?></h3>
        <h5 class="widget-user-desc">Issue/Request Status:<?php echo ' ' .$status ?></h5>
      </div>
     
		
      <div class="card-footer">
        <div class="container-fluid">
        	<dl>
        		<dt>Date Reported</dt>
        		<dd><?php echo $date_reported ?></dd>
        	</dl>
        	<dl><?php $check = $conn->query("SELECT * FROM users2 where staff_id ='".$IT_staff_ass."'" );
?>
        		<dt>IT Staff Assigned</dt>
        		<dd><?PHP while($row2= $check->fetch_assoc()):?>
<?php echo ucwords  ($row2['firstname'].' '.$row2['othername'].' '.$row2['surname']) ; endwhile; ?></dd>
        	</dl>
        </div>
    </div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>