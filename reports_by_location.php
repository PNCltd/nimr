<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-reports">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

				
						<div class="row">
					<div class="col-md-6">
					<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM location  ORDER BY location ASC");
	$rowCount = $query->num_rows;
	?>
	
<!--	        <input type="hidden" name="manager" value="<?php //echo //isset($row['staff_id']) ? $row['staff_id'] : '' ?>">-->

	<div class="form-group">
							<label for="" class="control-label">Manager</label>
		<select name="location" id="location" type="select" class="form-control form-control-sm" required>
			<option value="">Select Location</option>
			<option value="All">All</option>

			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['location'].'">'.$row['location'].' </option>';
				}
			}else{
				echo '<option value="">Location Not Available</option>';
			}
			?>
		</select>
						
						
					</div>
					</div>
						</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Start Date</label>
							<input type="date" class="form-control form-control-sm" name="startdate" value="" max="<?php echo date('Y-m-d')?>"  required>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">End Date</label>
							<input type="date" class="form-control form-control-sm" name="enddate" value="" max="<?php echo date('Y-m-d')?>" required>
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-reports">Search</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-reports').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_reports',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Reports successfully generated',"success");
					setTimeout(function(){
						location.href = 'index.php?page=location_issue_detailed_reports'
					},2000)
				}
			}
		})
	})
</script>