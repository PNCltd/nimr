<?php include'db_connect.php' ?>
<div class="col-lg-12" id="printlist">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
			<?php if(($_SESSION['login_type'] == 1) or ($_SESSION['login_type'] == 2)){ ?>
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_pv"><i class="fa fa-plus"></i> Add New PV</a>
						<?php };?>

			<button type="button" class="btn btn-success float-right"  onclick="printContent('printlist')"><i class="fa fa-print"></i> Print</button>
</div>
	<div class="row">
						
					</div>	
		</div>
		<div class="card-body" >
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>PV Details</th>
						<th>PV NO</th>
						<th>Subhead</th>
						<th>Head</th>
						<th>Dated Created</th>
						<th>Audit Approved</th>
						<th>Treasury Approved</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 1;
					$type = array('',"Admin","User", "IT Staff");

	
					// if($_SESSION['login_type'] == 1){
	
	$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM pv_table  ")->num_rows;
	
$_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM pv_table where  status = 'Closed'")->num_rows;
	
$_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM pv_table where status = 'Open' ")->num_rows;
	
		$chartview = $conn->query("SELECT * FROM pv_table  ")->num_rows;

	$qry = $conn->query("SELECT * FROM pv_table  where  status = 'Open' ORDER by date_created DESC");
	
 //}
 //elseif($_SESSION['login_type'] == 3){
	
// 	$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM pv_table where  (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
// $_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where  status = 'Closed'  && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
// $_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where  status = 'Open'  && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
// 	$chartview = $conn->query("SELECT * FROM issue_log where (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;

// $qry = $conn->query("SELECT * FROM issue_log where (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."') ORDER by date_reported DESC");	
	
// }else
// {
	
// 	$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM issue_log where staff_id =  '".$_SESSION['login_staff_id']."' ")->num_rows;
	
// $_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where status = 'Closed' && staff_id =  '".$_SESSION['login_staff_id']."'")->num_rows;
	
// $_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where  status = 'Open' && staff_id =  '".$_SESSION['login_staff_id']."' ")->num_rows;
	
// 		$chartview = $conn->query("SELECT * FROM issue_log where  staff_id =  '".$_SESSION['login_staff_id']."'")->num_rows;

	
	
// 	$qry = $conn->query("SELECT * FROM issue_log where  staff_id = '".$_SESSION['login_staff_id']."' ORDER by date_reported DESC");
// }	


					while($row= $qry->fetch_assoc()):
		$check = $conn->query("SELECT * FROM users2 where staff_id ='".$row['staff_ass']."'" );


//		$check = $conn->query("SELECT * FROM users2 where concat(firstname,' ',othername,' ',surname) ='".$row['IT_staff_ass']."'" );
			 //

					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['pv_detail']) ?></b></td>
						<td><b><?php echo ucwords($row['id']) ?></b></td>
						<td><b><?php echo ucwords($row['subhead']) ?></b></td>
						<td><b><?php echo ucwords($row['head']) ?></b></td>
						<td><b><?php echo $row['date_created'] ?></b></td>
						<td><b><?php echo $row['auditor_approved'] ?></b></td>
						<td><b><?php echo $row['treasurer_approved'] ?></b></td>

						<td><b><?php echo $row['status'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      
		                   <a class="dropdown-item view_pv" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
	                      <?php if($_SESSION['login_type'] == 1 or $_SESSION['login_type'] == 3): ?>
	                      	<div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=attend_pv&id=<?php echo $row['id'] ?>">Attend to PV</a>
	                      <div class="dropdown-divider"></div>
	                       <a class="dropdown-item" href="./index.php?page=assign_pv&id=<?php echo $row['id'] ?>">Assign to Staff</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_pv&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_pv" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div> <?php endif ?>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
				
			</table>
			 <?php if($chartview > 0){
	include('chartlocation.php');} ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_pv').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> PV Details","view_pv.php?id="+$(this).attr('data-id'))
	})
	$('.delete_pv').click(function(){
	_conf("Are you sure to delete this PV?","delete_pv",[$(this).attr('data-id')])
	})
	})
	function delete_pv($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_pv',
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