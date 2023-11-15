<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-dept_edit">
        <input type="text" name="dept_id" value="<?php echo $_GET['id']; ?>" readonly>
<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$u = $conn->query("SELECT * FROM department where dept_id =".$_GET['id']);
foreach($u->fetch_array() as $k =>$v){
	$met[$k] = $v;
}
}?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Department</label>
							<input type="text" class="form-control form-control-sm" name="dept" value="<?php echo $met['dept'] ?>">
						</div>
					</div>
				</div>
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-dept_edit">Edit Department</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage-dept_edit').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=edit_dept',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Department edited successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=department_list'
					},2000)
				}
			}
		})
	})
</script>
