<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
			<?php 
			if($_SESSION['login_type'] == 1){
			
			?>
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_head"><i class="fa fa-plus"></i> Add New Head</a><?php }?>
				<button onclick="printContent('printlist')" class="btn btn-primary float-right" class="fa fa-print">Print Content</button> 
			</div>
		</div>
		<div class="card-body" id="printlist">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Head</th>
						<th>Created by</th>
						<th>Dated Added</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$type = array('',"Admin","User");
					$qry = $conn->query("SELECT * FROM head");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['head']) ?></b></td>
						<td><b><?php echo ucwords($row['created_by']) ?></b></td>
						<td><b><?php echo $row['date_added'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
	                      
	                      
		                   <a class="dropdown-item view_head" href="javascript:void(0)" data-id="<?php echo $row['head_id'] ?>">View</a>
	                      
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_head&id=<?php echo $row['head_id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_head" href="javascript:void(0)" data-id="<?php echo $row['head_id'] ?>">Delete</a>
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
	$('.view_head').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Head Details","view_head.php?id="+$(this).attr('data-id'))
	})
	$('.delete_head').click(function(){
	_conf("Are you sure to delete this Head?","delete_head",[$(this).attr('data-id')])
	})
	})
	function delete_head($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_head',
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