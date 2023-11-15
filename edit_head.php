<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-head_edit">
        <input type="hidden" name="head_id" value="<?php echo $_GET['id']; ?>" readonly>
<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$u = $conn->query("SELECT * FROM head where head_id =".$_GET['id']);
foreach($u->fetch_array() as $k =>$v){
	$met[$k] = $v;
}
}?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Head</label>
							<input type="text" class="form-control form-control-sm" name="head" value="<?php echo $met['head'] ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Created by</label>
							<input type="text" class="form-control form-control-sm" name="created_by" value="<?php echo $met['created_by'] ?>">
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-head_edit">Edit Head</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-head_edit').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=edit_head',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Head edited successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=head_list'
					},2000)
				}
			}
		})
	})
</script>
