<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
			<?php 
			if($_SESSION['login_type'] == 1){
			
			?>
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_dept"><i class="fa fa-plus"></i> Add New Department</a><?php }?>
				<button onclick="printContent('printlist')" class="btn btn-primary float-right" class="fa fa-print">Print Content</button> 
			</div>
		</div>
		<div class="card-body" id="printlist">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Department</th>
						<th>Dated Added</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$type = array('',"Admin","User");
					$qry = $conn->query("SELECT * FROM department");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['dept']) ?></b></td>
						<td><b><?php echo $row['date_added'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      
		                   <a class="dropdown-item view_department" href="javascript:void(0)" data-id="<?php echo $row['dept_id'] ?>">View</a>
	                      
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_department&id=<?php echo $row['dept_id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_dept" href="javascript:void(0)" data-id="<?php echo $row['dept_id'] ?>">Delete</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_department').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Department Details","view_department.php?id="+$(this).attr('data-id'))
	})
	$('.delete_dept').click(function(){
	_conf("Are you sure to delete this Department?","delete_dept",[$(this).attr('data-id')])
	})
	})
	function delete_dept($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_dept',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},500)

				}
			}
		})
	}
</script>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>