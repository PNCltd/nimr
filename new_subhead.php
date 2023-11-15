<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-subhead">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
               
               <?php //$time = time();?>
<!--                <input type="hidden" name="time" value="<?php //echo isset($time) ? $time : '' ?>">-->

							
							
							<input type="hidden" name="created_by" class="form-control form-control-sm" required value="<?php echo $_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname'] ?>" readonly>
						
						<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM head  ORDER BY head ASC");
	$rowCount = $query->num_rows;
	?>
	<div class="row">
					<div class="col-md-6">
	<div class="form-group">
							<label for="" class="control-label">Head</label>
		<select name="head" id="head" type="select" required class="form-control form-control-sm">
			<option value="">Select Head</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['head'].'">'.$row['head'].'</option>';
				}
			}else{
				echo '<option value="">Head Not Available</option>';
			}
			?>
		</select>
						
						
					</div>	</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Sub Head</label>
							<input type="text" class="form-control form-control-sm" name="subhead" value="<?php echo isset($subhead) ? $subhead : '' ?>" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Sub Head Description</label>
							<input type="text" class="form-control form-control-sm" name="subhead_desc" value="<?php echo isset($subhead_desc) ? $subhead_desc : '' ?>" required>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Appropriation</label>
							<input type="text" class="form-control form-control-sm" name="appropriation" value="<?php echo isset($appropriation) ? $appropriation : '' ?>" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Allocation</label>
							<input type="text" class="form-control form-control-sm" name="allocation" value="<?php echo isset($allocation) ? $allocation : '' ?>" required>
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-subhead">Save</button>
    			<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-subhead').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_subhead',
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
						location.href = 'index.php?page=subhead_list'
					},500)
				}
			}
		})
	})
</script>