<?php include'db_connect.php' ?>
<?php 
		$check = $conn->query("SELECT * FROM users2 where my_manager ='".$_SESSION['manager']."'" )->num_rows;
	if($check > 0){
			echo "This manager has <strong> ".$check." </strong> IT Staff under him, you must reassign that/those staff to other manager before revoking the Previlege";
		?>
		<div class="col-lg-12">
	<div class="card card-outline card-success">
		
		<div class="card-body" id="printlist">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>IT Staff</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$i = 1;
					$type = array('',"Admin","User", "IT Staff");
					$qry = $conn->query("SELECT * FROM users2 where my_manager = '".$_SESSION['manager']."'");
					while($row= $qry->fetch_assoc()):

					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['firstname'].' '.$row['othername'].' '.$row['surname']) ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      <div class="dropdown-divider"></div>
	                       <a class="dropdown-item" href="./index.php?page=reassign_manager&id=<?php echo $row['staff_id'] ?>"> Reassign this Staff</a>
		                      
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	
	</div>
</div>
	<?php }else{ ?>
		<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage_rmanager">
				
				
<div class="form-group">
							<label for="" class="control-label">Selected Manager</label>
							<input type="text" name="managertoremove" class="form-control form-control-sm"  value="<?php echo ucwords($_SESSION['manager']) ?>"  readonly>
						</div>	
				
				<div id="f-inputs" class="d-none"></div>

			
          </div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage_rmanager">Revoke Manager</button>
    			<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>

	$('#manage_rmanager').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_rmanagerc',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Manager revoked successfully ',"success");
					setTimeout(function(){
						location.href = 'index.php?page=manager_list'
					},500)
				}
			}
		})
	})
</script>
	<?php
	}
?>

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
</script>