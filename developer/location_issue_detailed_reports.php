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
		<div align="center" style="color: red">Issues selected are from <strong><?php echo $_SESSION['startdate'].'</strong> to <strong>'.$enddat.' ('.$_SESSION['location'].')'?></strong></div>
		<div class="card-body" >
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Issue</th>
						<th>Dated Reported</th>
						<th>Assigned IT Staff</th>
						<th>Status</th>
						<th>Resolution</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php



	//$rowCount = $query->num_rows;
					$i = 1;
					$type = array('',"Admin","User", "IT Staff");
if($_SESSION['location'] == 'All' && $_SESSION['login_type'] == 1){
	
$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."'")->num_rows;
	
$_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Closed'")->num_rows;
	
$_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Open'")->num_rows;
	
	$chartview = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."'")->num_rows;
	
	$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' ORDER BY date_reported DESC");
	
}elseif($_SESSION['location'] == 'All' && $_SESSION['login_type'] == 3){
	
$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Closed' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Open' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;

	$chartview = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')");	
	
}elseif($_SESSION['location'] == 'All' && $_SESSION['login_type'] == 2){
	$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && staff_id = '".$_SESSION['login_staff_id']."'");
}	
else{
if($_SESSION['login_type'] == 1){
	
	$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."'")->num_rows;
	
$_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Closed' &&  location = '".$_SESSION['location']."'")->num_rows;
	
$_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Open' &&  location = '".$_SESSION['location']."'")->num_rows;
	
		$chartview = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."'")->num_rows;

	$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."'");
	
}elseif($_SESSION['login_type'] == 3){
	
	$_SESSION['rowall'] = $rowall = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowclosed'] = $rowclosed = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Closed' &&  location = '".$_SESSION['location']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
$_SESSION['rowopen'] = $rowopen = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' && status = 'Open' &&  location = '".$_SESSION['location']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;
	
	$chartview = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')")->num_rows;

$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."' && (IT_staff_ass = '".$_SESSION['login_staff_id']."' or reassigned_IT_staff = '".$_SESSION['login_staff_id']."')");	
	
}else{
	$qry = $conn->query("SELECT * FROM issue_log where date_reported >= '".$_SESSION['startdate']."' &&  date_reported <= '".$_SESSION['enddate']."' &&  location = '".$_SESSION['location']."' && staff_id = '".$_SESSION['login_staff_id']."'");
}	
	
}

					

					while($row= $qry->fetch_assoc()):

$check = $conn->query("SELECT * FROM users2 where staff_id ='".$row['IT_staff_ass']."'" );
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['issue_detail']) ?></b></td>
						<td><b><?php echo $row['date_reported'] ?></b></td>
<td><b>	<?PHP while($row2= $check->fetch_assoc()):?>
<?php echo ucwords  ($row2['firstname'].' '.$row2['othername'].' '.$row2['surname']) ?><?php endwhile; ?>
</b></td>					
						<td><b><?php echo $row['status'] ?></b></td>
						<td><b><?php echo ucwords($row['resolution']) ?></b></td> 
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      
		                   <a class="dropdown-item view_issue" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
	                      <?php if($_SESSION['login_type'] == 1): ?>

	                      <div class="dropdown-divider"></div>
	                       <a class="dropdown-item" href="./index.php?page=assign_issue&id=<?php echo $row['id'] ?>">Assign to IT Staff</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_issue&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_issue" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
	$('.view_issue').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Issue Details","view_issue.php?id="+$(this).attr('data-id'))
	})
	$('.delete_my_issue').click(function(){
	_conf("Are you sure to delete this Issue?","delete_issue",[$(this).attr('data-id')])
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
</script><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>