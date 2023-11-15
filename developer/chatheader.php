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
				
 $( "#content" ).load(window.location.href + " #content" );
  
            }
            });
            return false;
     }
    </script>
    
    <script> 
function refreshDiv() {
	//make sure braces are on the same line as the block statement, it's a good convention in JS

    document.getElementById("content"); 

} 

window.setInterval(refreshDiv, 50); //place reference to refreshDiv (not a string)
</script>