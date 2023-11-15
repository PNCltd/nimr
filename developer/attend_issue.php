<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
    </script>
    <script type="text/javascript">
    function clickButton(){
    var message=document.getElementById('message').value;
    var user_id=document.getElementById('user_id').value;
    $.ajax({
            type:"post",
            url:"server_action.php",
            data: 
            {  
               'message' :message,
               'user_id' :user_id
            },
            cache:false,
            success: function (html) 
            {
              
               $('#msg').html(html);
								

  		document.getElementById('message').value = '';
				
 //$( "#content" ).load(window.location.href + " #content" );
				
				
  
            }
            });
	
            return false;
     };

    </script>
    


<?php 
//session_start();
include('db_connect.php');
 include 'last_seen.php';
//echo $time = time_stamp($time); for the last seen
//Try
if(isset($_GET['id'])){
$issue = $conn->query("SELECT * FROM issue_log, users2 where issue_log.staff_id = users2.staff_id && issue_log.id ='".$_GET['id']."'" );
foreach($issue->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}}
//end of try
	$issue_id	= $_GET['id'];
$_SESSION['issue_id'] = $issue_id;
$date_attended = date('yy-m-d H:i:s'); //2020-11-20 16:14:06 
?>


<!--Posting chat-->

<!--

chat settings
-->
<?php 

?>
<!-- end of chat-->
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" id="accordion">
                    <span class="fa fa-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </div>
					
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body" id="content"  style="height: 300px; overflow: auto;">

                    <ul class="chat">
                       
                        
                       
                                <p>
									        <div id = "show"> </div>

                                  	
                                </p>
                            </div>
                        </li>
                        <div class="w-100" id="cfooter">
                        
                        
			<table class="table" >
				<tr>
					<td width="90%">
					

						<form  method="post" <?php echo $_SERVER['PHP_SELF'];?>>
							<input type="hidden" name="convo_id" value="<?php echo isset($convo_id) ? $convo_id : '' ?>">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['login_staff_id'].','.$meta['staff_id'] ?>" id="user_id">
							<textarea class="form-control w-100" name="message" id="message" required></textarea>
						
					</td>
					<td width="10%">
						<button class="btn btn-primary" type="submit"  onclick="return clickButton();"><i class="fa fa-paper-plane"></i></button>
					</form>
					    <p id="msg"></p>

					
					</td>
				</tr>
			</table>
			
		</div>

                    </ul>
                </div>
<!--
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
-->
            </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_attend">

		<input type="hidden" name="issue_id" value="<?php echo isset($issue_id) ? $$issue_id : '' ?>">  
<input type="hidden" name="date_attended" value="<?php echo $date_attended ?>">  
 <input type="hidden" name="closed_by" value="<?php echo ($_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname']) ?>
">  

  

				<div class="row">


					<div class="col-md-6 border-right">
						<b class="text-muted">Issue/Request Information</b>
						<div class="form-group">
							<label for="" class="control-label">Type</label>
							<input type="text" name="issue_type" class="form-control form-control-sm"  placeholder="<?php echo $meta['issue_type'] ?>" readonly>
						</div>
						<?php if($meta['issue_type'] == 'Issue'){
	?>

						<div class="form-group">
							<label for="" class="control-label">Issue Category</label>
							<input type="text" name="issue_catg" class="form-control form-control-sm"  placeholder="<?php echo $meta['issue_catg'] ?>" readonly>
						</div>
								<?php }?>
						<div class="form-group">
							<label for="" class="control-label">Requester Name</label>
							<input type="text" name="firstname" class="form-control form-control-sm"  placeholder="<?php echo $meta['surname'].' '.$meta['firstname'].' '.$meta['othername'] ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Location</label>
							<input type="text" name="location" class="form-control form-control-sm"  value="" placeholder="<?php echo $meta['location']  ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Requester Department</label>
							<input type="text" name="dept" class="form-control form-control-sm"  value=""  placeholder="<?php echo $meta['dept']  ?>" readonly>
						</div>
					
						
	</div>
						<div class="form-group">

							<label class="control-label">Issue Description</label>
							<textarea name="address" id="" cols="30" rows="4" class="form-control"  readonly><?php echo $meta['issue_detail'] ?></textarea>
				 
	<div class="form-group">
						
						<label class="control-label">Your Resolution</label>
							<textarea name="resolution" id="" cols="30" rows="10" class=" form-control" required placeholder="If You have fix the issue/request, describe briefly what was/were done"></textarea>
					
						
						
					</div>	
					
						</div>
						
										
					</div>
	
						
						
						
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save Resolution</button>
					
					
					<button class="btn btn-secondary" type="button" onclick="document.location.href = 'index.php?page=issue_listopen'">Cancel</button>
				</div>
				
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('chatload.php')
			}, 1000);
		});
	</script>
<style>
	img#cimg{
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
	em {
  float: right;
  position: relative;
  bottom: 0px;
</style>
<script>

	$('#manage_attend').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_attend',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Issue/Request resolved and closed successfully',"success");
					setTimeout(function(){
						location.href = 'index.php?page=issue_listme'
					},500)
				}
			}
		})
	})
</script>