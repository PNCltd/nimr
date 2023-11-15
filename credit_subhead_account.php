<?php $_SESSION['requester_name'] = $_SESSION['login_surname'].' '.$_SESSION['login_firstname'].' '.$_SESSION['login_othername'] ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?PHP //echo $_SESSION['requester_name']?>
<?PHP 				include('db_connect.php');
	$quer = $conn->query("SELECT lastno FROM pv_alg where id = 1");
			   $rr = mysqli_fetch_array($quer);
			   //echo $rr['lastno'];
			   
			   
			    $nn = intval($rr['lastno'])+1;

			   //echo 'ISR'.$nn;
			   
	?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_allocation">

		<input type="hidden" name="staff_id" value="<?php echo isset($staff_id) ? $staff_id : '' ?>">  
		<!-- <input type="hidden" name="firstname" value="<?php //echo isset($firstname) ? $firstname : '' ?>">  
		 -->		
				<input type="hidden" name="id" value="<?php echo $nn ?>">  


				<div class="row">

					<div class="col-md-6 border-right">
						<b class="text-muted">PV Information</b>
						<div class="form-group">
							<!-- <label for="" class="control-label">Staff ID</label> -->
							<input type="hidden" name="staff_id" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_staff_id']) ?>"  readonly>
						</div>
						
						<div class="form-group">
							<!-- <label for="" class="control-label">First Name</label> -->
							<input type="hidden" name="firstname" class="form-control form-control-sm" required value="<?php echo $_SESSION['login_firstname'] ?>" readonly>
						</div>
					
<!--
						
						<div class="form-group">
							<label for="" class="control-label">First Name</label>
							<input type="text" name="" class="form-control form-control-sm" required value="<?php// echo  ($_SESSION['login_firstname']) ?>"  readonly>
														
							
						</div>
-->
						<div class="form-group">
							<!-- <label for="" class="control-label">Middle Name</label> -->
							<input type="hidden" name="othername" class="form-control form-control-sm"  value="<?php echo ucwords($_SESSION['login_othername']) ?>"  readonly>
						</div>
						<div class="form-group">
							<!-- <label for="" class="control-label">Last Name</label> -->
							<input type="hidden" name="surname" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_surname']) ?>" readonly>
						</div>
						<div class="form-group">
							<!-- <label for="" class="control-label">Location</label> -->
							<input type="hidden" name="location" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_location']) ?>" readonly>
						</div>

						
<!--
	<div class="form-group">
							<label for="" class="control-label">Issue Type</label>
							<select name="issue_type" id="issue_type" type="select" class="form-control form-control-sm" required>
			<option value="<?php //echo isset($issue_type) ? $lissue_type : '' ?>">Select Issue Type</option>
								<option value="Issue">Issue</option>
								<option value="Request">Request</option>

								
							</select>
						</div>
-->
								<?PHP
						include('db_connect.php');
	$query = $conn->query("SELECT * FROM head  ORDER BY head ASC");
	$rowCount = $query->num_rows;
	?>
	
	<div class="form-group">
							<label for="" class="control-label">Head</label>
		<select name="head" id="head" type="select" required class="form-control form-control-sm">
			<option value="">Select Head</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['head'].'">'.$row['head'].'</option>';
				}
			}else{
				echo '<option value="">Head Not Available</option>';
			}
			?>
		</select>
						
						
						</div>


	
                

                <!-- <div class="form-group">
					<label>User Id</label>
					<input type='text' name="user_id"
						id='user_id' class='form-control'
						placeholder='Enter user id'
						onkeyup="GetDetail(this.value)" value="">
				</div>
 -->

                
                 <div class="form-group">
							<label for="" class="control-label">Sub Head</label>
                    <select name="subhead" id="subhead"  class="form-control" required style="background-color:white;" onchange="GetDetail(this.value)">
			<option value="">Select Head First</option>
		</select>
                    <div class="valid-feedback">Subhead field is valid!</div>
                                 <div class="invalid-feedback">Sub head field cannot be blank!</div>
		
                  </div>
               
                
                 <div class="form-group">
							<label for="" class="control-label">Sub Head Description</label>
                       <select name="subhead_desc" id="subhead_desc"  class="form-control" required style="background-color:white;" >
			<option value="">Select Subhead First</option>
		</select>
                    <div class="valid-feedback">Sub Head Description field is valid!</div>
                                 <div class="invalid-feedback">Sub Head Description field cannot be blank!</div>
                  
                  

                </div>
   
              


                <!-- End of auto fill -->

					

					</div>
					
					<div class="col-md-6">
					<b class="text-muted">Account Information</b>

<!--
						<div class="form-group">
							<label class="control-label">Issue Detail</label>
							<textarea name="issue_detail" id="" cols="30" rows="10" class="summernote form-control" required><?php //echo isset($issue_detail) ? $issue_detail : '' ?></textarea>

					</div>
-->

  



						
						
					<!-- NIRM -->	




<!-- 	<input id="vat"  type="text" name="vat" class="form-control form-control-sm" required value="7.5%" readonly style="display:none"> -->


<!-- <script>
function VATFunction() {
	let amount = document.getElementById('psum').value;
  var checkBox = document.getElementById("VATCheck");
 var vatCharge = document.getElementById("vatCharge");
  if (checkBox.checked == true){
       vatCharge.style.display = "block";
    $("#amount").val(amount * (7.5/100));
  } else {
  	     vatCharge.style.display = "none";
  }
}
</script>

<script>
function SDFunction() {
	let amount = document.getElementById('psum').value;
  var SD_checkBox = document.getElementById("SDCheck");
 var stampduty = document.getElementById("stampduty");
  if (SD_checkBox.checked == true){
       stampduty.style.display = "block";
    $("#amount").val(amount * (7.5/100));
  } else {
  	     stampduty.style.display = "none";
  }
}
</script> -->



<!-- 
 <input id="psum1" type="text" name="psum1" class="form-control form-control-sm" required onInput="edValueKeyPress()" > -->


<br><label for="" class="control-label">Appropriation</label>
<input id="appropriation" type="text" name="appropriation" placeholder ="Select Subhead" class="form-control form-control-sm" required readonly="" style="background-color:white;">
<br><label for="" class="control-label">Balance</label>
<input id="balance" type="text" name="balance" placeholder ="Select Subhead" class="form-control form-control-sm" required  readonly="" style="background-color:white;">
<br><label for="" class="control-label">Allocations received so far</label>
<input id="totalAllocated" type="text" name="totalAllocated" placeholder ="Select Subhead" class="form-control form-control-sm" required  readonly="" style="background-color:white;">
<br><label for="" class="control-label">Amount to be credited</label>
<input id="transAmount" type="text" name="transAmount" placeholder ="Allocation at hand"class="form-control form-control-sm" required >
<br><label for="" class="control-label">Narrative</label>
<input id="narrative" type="text" name="narrative" class="form-control form-control-sm" required >




    <!-- <script>
       let amount1 = document.getElementById('psum');

      function edValueKeyPress() {
	internationalNumberFormat = new Intl.NumberFormat('en-US', {minimumFractionDigits: 2})

  		// let vatChargea = document.getElementById('vatCharge').value;

  		let grossTotal = amount1.value;
  		let vatCharge = parseFloat(grossTotal * (7.5/100));
  		let stampduty = parseFloat(grossTotal * (1/100));
  		let totalPay_raw = internationalNumberFormat.format(parseFloat(grossTotal - (vatCharge + stampduty)));


  		
  		let totalPay =totalPay_raw;
                             
    //             let charges =  internationalNumberFormat.format(s_charges);


let charg = (stampduty + vatCharge);
  	  	let payable = amount1 - vatCharge; 


    $("#vatCharge").val(vatCharge);
    $("#stampduty").val(stampduty);
    // $("#payable").val(amount1 + ((parseFloat(vatCharge) + parseFloat(stampduty))));

        $("#payable").val(totalPay_raw);

}
    </script> -->
<!-- NIRM -->
					</div>
						
						
						
						
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=pv_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		max-height: 15vh;
		/*max-width: 6vw;*/
	}
</style>
<script>

	$('#manage_allocation').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_allocation',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.href = 'index.php?page=subhead_list'
					},2000)
				}
			}
		})
	})
</script>




 <script type="text/javascript">
$(document).ready(function(){
    $('#head').on('change',function(){
        var headID = $(this).val();
        if(headID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'head_id='+headID,
                success:function(html){
                    $('#subhead').html(html);
                    $('#subhead_desc').html('<option value="">Select Subhead First</option>'); 
                }
            }); 
        }else{
            $('#subhead').html('<option value="">Select Head First</option>');
            $('#subhead_desc').html('<option value="">Select Sub Head First</option>'); 
        }
    });
    $('#subhead').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'subhead_id='+stateID,
                success:function(html){
                    $('#subhead_desc').html(html);
                }
            }); 
        }else{
            $('#subhead_desc').html('<option value="">Select Sub Head First</option>'); 
            
        }
    });
    
});
</script> 

 <script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("balance").value = "";
				document.getElementById("appropriation").value = "";
				document.getElementById("totalAllocated").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("appropriation").value = myObj[0];

							document.getElementById
							("totalAllocated").value = myObj[1];

							document.getElementById
							("balance").value = myObj[2];
						
						// Assign the value received to
						// last name input field
						// document.getElementById(
						// 	"last_name").value = myObj[1];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "testCFile.php?subhead=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>