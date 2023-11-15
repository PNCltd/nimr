<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage_theme">
				<?php // $time = time() ?>
	
	
<!--	<input type="hidden" name="time" value="<?php // echo $time ? $time : '' ?>">-->


					<div class="form-group">

				
				
			  <p>
					  <label>
					    <input type="radio" name="color" value="Red" id="color_0">
					    Red</label>
					  <br>
					  <label>
					    <input type="radio" name="color" value="Blue" id="color_1">
					    Blue</label>
					  <br>
			  </p>

	
<!--	        <input type="hidden" name="manager" value="<?php //echo //isset($row['staff_id']) ? $row['staff_id'] : '' ?>">-->

							
						
						
					</div>	
					
					
	
<!--	        <input type="hidden" name="manager" value="<?php //echo //isset($row['staff_id']) ? $row['staff_id'] : '' ?>">-->
	
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
  </div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage_theme">Change theme</button>
    			<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage_theme').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_color',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Theme successfully changed',"success");
					setTimeout(function(){
						location.href = 'index.php?page=home'
					},500)
				}
			}
		})
	})
</script>