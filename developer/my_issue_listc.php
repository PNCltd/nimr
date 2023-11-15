<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_issue"><i class="fa fa-plus"></i> Add New Issue</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Issue</th>
						<th>Dated Added</th>
						<th>Assigned IT Staff</th>
						<th>Status</th>
						<th>Resolution</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$type = array('',"Admin","User","IT Staff");
					$qry = $conn->query("SELECT * FROM issue_log where status = 'Closed' AND staff_id = '".$_SESSION['login_staff_id']."' ");

					while($row= $qry->fetch_assoc()):
$check = $conn->query("SELECT * FROM users2 where staff_id ='".$row['IT_staff_ass']."'" );

					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['issue_detail']) ?></b></td>
						<td><b><?php echo $row['date_reported'] ?></b></td>
<td><b>	<?PHP while($row2= $check->fetch_assoc()):?>
<?php echo ucwords  ($row2['firstname'].' '.$row2['othername'].' '.$row2['surname']) ?>	<?php endwhile; ?>
</b></td>										<td><b><?php echo $row['status'] ?></b></td>
						<td><b><?php echo ucwords($row['resolution']) ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      
		                   <a class="dropdown-item view_issue" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
	                      
		                     
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
	$('.view_issue').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Issue  Details","view_issue.php?id="+$(this).attr('data-id'))
	})
	$('.delete_my_issue').click(function(){
	_conf("Are you sure to delete this Issue?","delete_my_issue",[$(this).attr('data-id')])
	})
	})
	function delete_issue($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_my_issue',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>