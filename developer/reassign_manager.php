<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage_managers">
				<?php // $time = time() ?>
	
	
<!--	<input type="hidden" name="time" value="<?php // echo $time ? $time : '' ?>">-->

<?PHP
						include('db_connect.php');
	$querys = $conn->query("SELECT * FROM users2 where staff_id = '".$_GET['id']."'");
	$rowCount = $querys->num_rows;
				$row1 = $querys->fetch_assoc()
	?>

<div class="form-group">
							<label for="" class="control-label">IT Staff</label>
							<input type="text" name="staffname" class="form-control form-control-sm"  readonly value="<?php echo $row1['firstname'].' '.$row1['othername'].' '.$row1['surname'] ?>">
						</div>
				
				
				
					
					
					
		<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM users2 where type = 3 AND manager = 'Yes' ORDER BY firstname ASC");
	$rowCount = $query->num_rows;
	?>
	
<!--	        <input type="hidden" name="manager" value="<?php //echo //isset($row['staff_id']) ? $row['staff_id'] : '' ?>">-->
 
	<div class="form-group">
							<label for="" class="control-label">Manager</label>
		<select name="my_manager" id="my_manager" type="select" class="form-control form-control-sm">
			<option value="">Select Manager to assign to the above selected IT Staff</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['firstname'].' '.$row['othername'].' '.$row['surname'].'">'.$row['firstname'].' '.$row['othername'].' '.$row['surname'].'</option>';
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
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage_managers">Assign the Selected Manager to the IT Staff above</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage_managers').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_rmanager',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Manager revoked successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=revokecheck'
					},500)
				}
			}
		})
	})
</script>