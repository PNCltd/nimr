<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-dept">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
               
               <?php //$time = time();?>
<!--                <input type="hidden" name="time" value="<?php //echo isset($time) ? $time : '' ?>">-->


				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Department</label>
							<input type="text" class="form-control form-control-sm" name="dept" value="<?php echo isset($dept) ? $dept : '' ?>" required>
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-dept">Save</button>
    			<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-dept').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_dept',
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
						location.href = 'index.php?page=department_list'
					},500)
				}
			}
		})
	})
</script>