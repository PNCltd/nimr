<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
			<div class="card-header">

		<div class="card-tools">
			
				<button onclick="printContent('printlist')" class="fa fa-print">Print Content</button> 
			</div>
		</div>
		<div class="card-body" id="printlist">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						
						<th>Assigned IT Staff</th>
						<th>Location</th>
						<th>Date Added</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$type = array('',"Admin","User","IT Staff");
		$qry = $conn->query("SELECT *  FROM   users2 where my_manager = '".$_SESSION['login_staff_id']."'");

//$qry = $conn->query("SELECT * FROM  issue_log, users2 where issue_log.IT_staff_ass = 'Me You Us' && users2.my_manager = '".$_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname']."'");

					while($row= $qry->fetch_assoc()):
//$check = $conn->query("SELECT * FROM users2 where staff_id ='".$row['IT_staff_ass']."'" );

					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['firstname'].' '.$row['othername'].' '.$row['surname'] ?></b></td>
							<td><b><?php echo $row['location'] ?></b></td>

						<td><b><?php echo ucwords($row['date_added']) ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      <a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php echo $row['staff_id'] ?>">View</a>
	                      
	                      
		                     
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
	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Subject  Details","view_user.php?id="+$(this).attr('data-id'))
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
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>