<?php $_SESSION['requester_name'] = $_SESSION['login_surname'].' '.$_SESSION['login_firstname'].' '.$_SESSION['login_othername'] ?>

<?PHP //echo $_SESSION['requester_name']?>
<?PHP 				include('db_connect.php');
	$quer = $conn->query("SELECT lastno FROM issue_alg where id = 1");
			   $rr = mysqli_fetch_array($quer);
			   //echo $rr['lastno'];
			   
			   
			    $nn = intval($rr['lastno'])+1;

			   //echo 'ISR'.$nn;
			   
	?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_issue">

		<input type="hidden" name="staff_id" value="<?php echo isset($staff_id) ? $staff_id : '' ?>">  
		<input type="hidden" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>">  
				
				<input type="hidden" name="id" value="<?php echo $nn ?>">  


				<div class="row">

					<div class="col-md-6 border-right">
						<b class="text-muted">Issue/Request Information</b>
						<div class="form-group">
							<label for="" class="control-label">Staff ID</label>
							<input type="text" name="staff_id" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_staff_id']) ?>"  readonly>
						</div>
						
						<div class="form-group">
							<label for="" class="control-label">Requester</label>
							<input type="text" name="requester_name" class="form-control form-control-sm" required value="<?php echo $_SESSION['login_firstname'].' '.$_SESSION['login_othername'].' '.$_SESSION['login_surname'] ?>" readonly>
						</div>
					
<!--
						
						<div class="form-group">
							<label for="" class="control-label">First Name</label>
							<input type="text" name="" class="form-control form-control-sm" required value="<?php// echo  ($_SESSION['login_firstname']) ?>"  readonly>
														
							
						</div>
-->
						<div class="form-group">
							<label for="" class="control-label">Middle Name</label>
							<input type="text" name="" class="form-control form-control-sm"  value="<?php echo ucwords($_SESSION['login_othername']) ?>"  readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Name</label>
							<input type="text" name="" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_surname']) ?>" readonly>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Location</label>
							<input type="text" name="location" class="form-control form-control-sm" required value="<?php echo ucwords($_SESSION['login_location']) ?>" readonly>
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
	$query = $conn->query("SELECT * FROM issue_type  ORDER BY issue_type ASC");
	$rowCount = $query->num_rows;
	?>
	<div class="form-group">
							<label for="" class="control-label">Issue Type.</label>
		<select name="issue_type" id="issue_type" type="select" class="form-control form-control-sm">
			<option value="">Select Issue Type</option>
			<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['issue_type'].'">'.$row['issue_type'].'</option>';
				}
			}else{
				echo '<option value="">Issue Type Not Available</option>';
			}
			?>
		</select>
						
						
					</div>	
					
					

					</div>
					
					<div class="col-md-6">
						<div class="col-md-10">
								
					</div>	

<!--
						<div class="form-group">
							<label class="control-label">Issue Detail</label>
							<textarea name="issue_detail" id="" cols="30" rows="10" class="summernote form-control" required><?php //echo isset($issue_detail) ? $issue_detail : '' ?></textarea>

					</div>
-->
						<div class="form-group">
							<label for="" class="control-label">Issue/Request Description</label>
							<textarea name="issue_detail" id="issue_detail" cols="30" rows="10" class="summernote form-control" required>
							</textarea>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Project sum</label>
							<input id="psum" type="text" name="psum" class="form-control form-control-sm" required onInput="edValueKeyPress()" >

						</div>
						
					<!-- NIRM -->	
						<label for="myCheck">VAT Charges (7.5%):</label> 
<input type="checkbox" id="VATCheck" onclick="VATFunction()">	<!-- <input id="vat"  type="text" name="vat"   value="7.5%" readonly style="display:none"> -->

<input id="vatCharge" type="text" name="vatCharge" class="form-control form-control-sm" required  style="display:none">

<br><label for="" class="control-label">Stamp Duty</label>
<input type="checkbox" id="SDCheck" onclick="SDFunction()">
<input id="stampduty" type="text" name="stampduty" class="form-control form-control-sm" required style="display:none">



<!-- 	<input id="vat"  type="text" name="vat" class="form-control form-control-sm" required value="7.5%" readonly style="display:none"> -->


<script>
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
</script>



<!-- 
 <input id="psum1" type="text" name="psum1" class="form-control form-control-sm" required onInput="edValueKeyPress()" > -->



<br><label for="" class="control-label">Amount Payable</label>
<input id="payable" type="text" name="payable" class="form-control form-control-sm" required >

<!--      <input id="lblValue" type="text" name="lblValue">
 -->
<!-- <span id="lblValue"># </span>
 -->  
    <script>
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
    </script>
<!-- NIRM -->
					</div>
						
						
						
						
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=issue_list'">Cancel</button>
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

	$('#manage_issue').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_issue',
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
						location.href = 'index.php?page=my_issue_list'
					},2000)
				}
			}
		})
	})
</script>