<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage_manager">
				<?php // $time = time() ?>
	
	
<!--	<input type="hidden" name="time" value="<?php // echo $time ? $time : '' ?>">-->


				
				
				<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM users2 where type = 3 AND manager = 'No' ORDER BY firstname ASC");
	$rowCount = $query->num_rows;
	?>
	
<!--	        <input type="hidden" name="manager" value="<?php //echo //isset($row['staff_id']) ? $row['staff_id'] : '' ?>">-->

	<div class="form-group">
							<label for="" class="control-label">Select an IT Staff make a Manager.</label>
		<select name="staff_id" id="staff_id" type="select" class="form-control form-control-sm">
			<option value="">Select an IT Staff to make a Manager</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['staff_id'].'">'.$row['firstname'].' '.$row['othername'].' '.$row['surname'].'</option>';
				}
			}else{
				echo '<option value="">IT Staff Not Available</option>';
			}
			?>
		</select>
						
						
					</div>	
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage_manager">Make the Selected IT Staff a Manager</button>
    		<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage_manager').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_manager',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.href = 'index.php?page=manager_list'
					},2000)
				}
			}
		})
	})
</script>