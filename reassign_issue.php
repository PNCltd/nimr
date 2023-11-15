<?php 
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
$date_reassigned = date('yy-m-d H:i:s'); //2020-11-20 16:14:06 
?>

<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_reassign">

		<input type="hidden" name="issue_id" value="<?php echo isset($issue_id) ? $$issue_id : '' ?>">  
		<input type="hidden" name="date_reassigned" value="<?php echo $date_reassigned ?>">
  

				<div class="row">


					<div class="col-md-6 border-right">
						<b class="text-muted">Issue/Request Information</b>
						<div class="form-group">
							<label for="" class="control-label">Type</label>
							<input type="text" name="issue_type" class="form-control form-control-sm"   value="<?php echo $meta['issue_type'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Name</label>
							<input type="text" name="requester" class="form-control form-control-sm"  value="<?php echo $meta['surname'].' '.$meta['firstname'].' '.$meta['othername'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Location</label>
							<input type="text" name="location" class="form-control form-control-sm"  value="<?php echo $meta['location']  ?>"  readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Department</label>
							<input type="text" name="dept" class="form-control form-control-sm"  value="<?php echo $meta['dept']  ?>"   readonly>
						</div>
					
						
	</div>
						<div class="form-group">

							<label class="control-label">Issue Description</label>
							<textarea name="issue" id="" cols="30" rows="4" class="form-control"  readonly><?php echo $meta['issue_detail'] ?></textarea>
							
				<div class="form-group">
							<label for="" class="control-label">Issue Category</label>
							<input type="text" name="issue_catg" class="form-control form-control-sm"  value="<?php echo $meta['issue_catg']  ?>" readonly>
						</div>
							<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM users2 where type = 3  ORDER BY firstname ASC");
	$rowCount = $query->num_rows;
	?>
	<div class="form-group">
							<label for="" class="control-label">Select an IT Staff to assign the above issue.</label>
		<select name="reassigned_IT_staff" id="reassigned_IT_staff" type="select" class="form-control form-control-sm">
			<option value="">Select IT Staff to reassign the issue</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['staff_id'].'">'.$row['firstname'].' '.$row['othername'].' '.$row['surname'].'</option>';
				}
			}else{
				echo '<option value="">Staff Not Available</option>';
			}
			?>
		</select>
						
						
					</div>	
					
						</div>
						
						
						
					</div>
			</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Re-Assign</button>
					<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=issue_listopen'">Cancel</button>
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

	$('#manage_reassign').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_reassign',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Issue/Request reassigned successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=issue_listme'
					},500)
				}
			}
		})
	})
</script>