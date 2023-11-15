<?php include 'db_connect.php' ?>
<?php include 'last_seen.php' ?>

<?php
if(isset($_GET['id'])){
	
	$qry = $conn->query("SELECT * FROM department where dept_id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<div class="card card-widget widget-user shadow">
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username"><?php echo ucwords($dept) ?></h3>
        <h5 class="widget-user-desc">Added: <?php echo $time = time_stamp($time); ?></h5>
      </div>
     
		
      <div class="card-footer">
        <div class="container-fluid">
        	<dl>
        		<dt>Department</dt>
        		<dd><?php echo $dept ?></dd>
        	</dl>
        	<dl>
        		<dt>Date Added</dt>
        		<dd><?php echo $date_added ?></dd>
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