<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-daterange">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

				
						<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Select Issue Category</label>
							
							
		<select name="catg" id="catg" class="custom-select custom-select-sm" required>
         <option value="">Select Category</option>

        <option value="All">All</option>
        <option value="Closed">Closed</option>
        <option value="Open">Open</option>
        <option value="Not Assigned">Unassigned</option>
       
      </select>
							
							
<!--
							<select name="catg" id="catg" class="custom-select custom-select-sm">
								<option value="All" <?php //echo isset($catg) && $catg == All ? 'selected' : '' ?>>All</option>
								<option value="Closed" <?php //echo isset($catg) && $catg == Closed ? 'selected' : '' ?>>Closed</option>
								<option value="Open" <?php //echo isset($catg) && $catg == Open ? 'selected' : '' ?>>Open</option>
							</select>
-->
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
							<small id="date_match" data-status=''></small>

						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-daterange">Search</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-daterange').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_search',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully searched',"success");
					setTimeout(function(){
						location.href = 'index.php?page=issue_detailed_reports'
					},2000)
				}
			}
		})
	})
	
	$('[name="startdate"],[name="enddate"]').keyup(function(){
		var startdate = $('[name="startdate"]').val()
		var enddate = $('[name="enddate"]').val()
		if(enddate == '' ||startdate == ''){
			$('#date_match').attr('data-status','')
		}else{
			if(enddate <= startdate){
				$('#date_match').attr('data-status','1').html('<i class="text-success">Date Matched.</i>')
			}else{
				$('#date_match').attr('data-status','2').html('<i class="text-danger">Invalid Date Selection.</i>')
			}
		}
	})
</script>