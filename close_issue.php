<?php 
//session_start();
include('db_connect.php');

//Try
if(isset($_GET['id'])){
$issue = $conn->query("SELECT * FROM issue_log, users2 where issue_log.staff_id = users2.staff_id && issue_log.id ='".$_GET['id']."'" );
foreach($issue->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}}
//end of try
	$issue_id	= $_GET['id'];
$_SESSION['issue_id'] = $issue_id;

$date_closed = date('yy-m-d H:i:s'); //2020-11-20 16:14:06 
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_close">

		<input type="hidden" name="issue_id" value="<?php echo isset($issue_id) ? $$issue_id : '' ?>">  
<input type="hidden" name="date_closed" value="<?php echo $date_closed ?>">  
 <input type="hidden" name="closed_by" value="<?php echo ($_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname']) ?>
">  

  

				<div class="row">


					<div class="col-md-6 border-right">
						<b class="text-muted">Issue/Request Information</b>
						<div class="form-group">
							<label for="" class="control-label">Type</label>
							<input type="text" name="issue_type" class="form-control form-control-sm"  placeholder="<?php echo $meta['issue_type'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Name</label>
							<input type="text" name="firstname" class="form-control form-control-sm"  placeholder="<?php echo $meta['surname'].' '.$meta['firstname'].' '.$meta['othername'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Location</label>
							<input type="text" name="location" class="form-control form-control-sm"  value="" placeholder="<?php echo $meta['location']  ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Department</label>
							<input type="text" name="dept" class="form-control form-control-sm"  value=""  placeholder="<?php echo $meta['dept']  ?>" readonly>
						</div>
					
						
	</div>
						<div class="form-group">

							<label class="control-label">Issue Description</label>
							<textarea name="address" id="" cols="30" rows="4" class="form-control"  readonly><?php echo $meta['issue_detail'] ?></textarea>
				
	<div class="form-group">
						
						<label class="control-label">IT Staff Resolution</label>
							<textarea name="resolution" id="" cols="30" rows="10" class=" form-control" required placeholder="If the problem is solved, please close the issue" readonly></textarea>
					
						
						
					</div>	
					
						</div>
						
						
						
					</div>

<!--
						<div class="form-group">
							<label class="control-label">Issue Detail</label>
							<textarea name="issue_detail" id="" cols="30" rows="10" class="summernote form-control" required><?php //echo isset($issue_detail) ? $issue_detail : '' ?></textarea>

					</div>
-->
					
						
						
						
						
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Close if resolved</button>
					
					
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=issue_listopen'">Cancel</button>
				</div>
				
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
</style>
<script>

	$('#manage_close').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_close',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Issue/Request resolved and closed successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=issue_listme'
					},500)
				}
			}
		})
	})
</script>