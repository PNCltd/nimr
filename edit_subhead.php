<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-subhead_edit">
        <input type="hidden" name="subhead_id" value="<?php echo $_GET['id']; ?>" readonly>
<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$u = $conn->query("SELECT * FROM subhead where subhead_id =".$_GET['id']);
foreach($u->fetch_array() as $k =>$v){
	$met[$k] = $v;
}
}?>

	<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM head  ORDER BY head ASC");
	$rowCount = $query->num_rows;
   
	$headCheck = $met['head'];

	?>
	<div class="row">
					<div class="col-md-6">
	<div class="form-group">
		
							<label for="" class="control-label">Head</label>
		<select name="head" id="head" type="select" required class="form-control form-control-sm">
			

	

			   			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					//echo '<option value="'.$row['head'].'">'.$row['head'].'</option>';
				?> 
<option value="<?php echo $row["head"];?>"<?php if ($headCheck == $row['head']) { echo 'selected'; } ?>>
					<?php echo $row['head'];?>
			   </option>
			   <?php
					
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
							<input type="text" class="form-control form-control-sm" name="subhead" value="<?php echo $met['subhead'] ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<input type="text" class="form-control form-control-sm" name="subhead_desc" value="<?php echo $met['subhead_desc'] ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Created by</label>
							<input type="text" class="form-control form-control-sm" name="created_by" value="<?php echo $met['created_by'] ?>" readonly>
						</div>
					</div>

					
							<input type="hidden" class="form-control form-control-sm" name="updated_by" value="<?php echo $_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname'] ?>" readonly>
					

				</div>

					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Appropriation</label>
							<input type="text" class="form-control form-control-sm" name="appropriation" value="<?php echo $met['appropriation'] ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Allocation</label>
							<input type="text" class="form-control form-control-sm" name="allocation" value="<?php echo $met['allocation'] ?>" >
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-subhead_edit">Edit Subhead</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-subhead_edit').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=edit_subhead',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Sub Head edited successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=subhead_list'
					},2000)
				}
			}
		})
	})
</script>
