<?php include'db_connect.php' ?>
<div class="col-lg-12" id="printlist">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				
			<button onclick="printContent('printlist')" class="fa fa-print">Print Content</button>
</div>
		</div>
		<?php 		$enddat = date('Y-m-d', strtotime($_SESSION['enddate']. '-1 day'));
?>
		<div align="center" style="color: red">Issues selected are from <strong><?php echo $_SESSION['startdate'].'</strong> to <strong>'.$enddat.' ('.$_SESSION['catg'].')'?></strong></div>
		<div class="card-body">
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
if($_SESSION['catg'] == 'All' && $_SESSION['login_type'] == 1){
	
	$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'")->num_rows;
	
$_SESSION['rowclosed'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed'")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open'")->num_rows;
	
$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass != 'Not Assigned'")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned'")->num_rows;

	$qry = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' ORDER BY date_created DESC");
	
	$chartview = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'")->num_rows;
	
	
	
}elseif($_SESSION['catg'] == 'All' && $_SESSION['login_type'] == 3){
	
	
$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'")->num_rows;
	
$_SESSION['rowclosed'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed'")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open'")->num_rows;
	
$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass != 'Not Assigned'")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned' ")->num_rows;

	//$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."'");
	
	$chartview = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'")->num_rows;
	
$qry = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' ORDER BY date_created DESC");	
	
}elseif($_SESSION['catg'] == 'All' && $_SESSION['login_type'] == 2){
	
	$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['rowclosed'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass != 'Not Assigned' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_reported >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;

	//$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."'");
	
	$chartview = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
	$qry = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_id = '".$_SESSION['login_staff_id']."' ORDER BY date_created DESC");
}	
else{
if($_SESSION['login_type'] == 1){
	
	$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'")->num_rows;
	
$_SESSION['rowclosed'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed'")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open'")->num_rows;
	
	
	$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass != 'Not Assigned'")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned'")->num_rows;
	
	
$chartview = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' &&  (status = '".$_SESSION['catg']."' OR staff_ass = '".$_SESSION['catg']."')")->num_rows;
	
	
	
	$qry = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' &&  ((status = '".$_SESSION['catg']."') OR ((staff_ass = '".$_SESSION['catg']."') )) ORDER BY date_created DESC");
	
	
}elseif($_SESSION['login_type'] == 3){
	
	$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowclosed'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
	
	$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'  && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
	
$chartview = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' &&  status = '".$_SESSION['catg']."' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
	
	
	//$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  ((status = '".$_SESSION['catg']."') OR ((staff_ass = '".$_SESSION['catg']."') ))");
	
$qry = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' &&  status = '".$_SESSION['catg']."' && (staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_staff = '".$_SESSION['login_staff_id']."') ORDER BY date_created DESC");	
	
}else{
	
	$_SESSION['rowall'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['rowclosed'] = $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Closed'  && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['rowopen'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."' && status = 'Open'  && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
	
	$_SESSION['assigned'] =  $conn->query("SELECT * FROM pv_table where date_created >= '".$_SESSION['startdate']."' &&  date_created <= '".$_SESSION['enddate']."'  &&  staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
$_SESSION['unassigned'] =  $conn->query("SELECT * FROM pv_table where date_createddate_created >= '".$_SESSION['startdate']."' &&  date_createddate_created <= '".$_SESSION['enddate']."' && staff_ass = 'Not Assigned' &&  staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
	
$chartview = $conn->query("SELECT * FROM pv_table where date_createddate_created >= '".$_SESSION['startdate']."' &&  date_createddate_created <= '".$_SESSION['enddate']."' &&  status = '".$_SESSION['catg']."' && staff_id = '".$_SESSION['login_staff_id']."'")->num_rows;
	
	$qry = $conn->query("SELECT * FROM pv_table where date_createddate_created >= '".$_SESSION['startdate']."' &&  date_createddate_created <= '".$_SESSION['enddate']."' &&  (status = '".$_SESSION['catg']."' OR staff_ass = '".$_SESSION['catg']."'  ) && staff_id = '".$_SESSION['login_staff_id']."' ORDER BY date_created DESC");
}	
	
}

					

					while($row= $qry->fetch_assoc()):

$check = $conn->query("SELECT * FROM users2 where staff_id ='".$row['staff_ass']."'" );
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
	                      <?php if($_SESSION['login_type'] == 1): ?>
	                      	<div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=auditor_attend_pv&id=<?php echo $row['id'] ?>">Attend to PV</a>
	                      <div class="dropdown-divider"></div>
	                       <a class="dropdown-item" href="./index.php?page=assign_pv&id=<?php echo $row['id'] ?>">Assign to Staff</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_pv&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_pv" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div> <?php endif ?>

		                      <?php if($_SESSION['login_type'] == 3 && $_SESSION['login_dept'] == 'Audit'): ?>
	                      	<div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=auditor_attend_pv&id=<?php echo $row['id'] ?>">Attend to PV</a>
	                      <div class="dropdown-divider"></div>
	                       <a class="dropdown-item" href="./index.php?page=assign_pv&id=<?php echo $row['id'] ?>">Assign to Staff</a>	                  
		                    </div> <?php endif ?>

		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
					<?php if($chartview > 0){
	include('chartreports.php');} ?>

		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_pv').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Issue Details","view_pv.php?id="+$(this).attr('data-id'))
	})
	$('.delete_my_issue').click(function(){
	_conf("Are you sure to delete this Pv?","delete_pv",[$(this).attr('data-id')])
	})
	})
	function delete_issue($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_issue',
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