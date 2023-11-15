<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  
<head>
    <meta charset="utf-8" />
    <title>
        How to trigger HTML button after hitting
        enter button in textbox using JavaScript?
    </title>
</head>
  
<body>
   <!--  <input id="edValue" type="text"  name="edValue"><br> -->
<!--     <input id="amount" type="text" name="amount" class="form-control form-control-sm" required >
 -->
    <input id="psum" type="text" name="psum" class="form-control form-control-sm" required onInput="edValueKeyPress()" >

<input id="amount" type="text" name="amount" class="form-control form-control-sm" required >

<!--      <input id="lblValue" type="text" name="lblValue">
 -->
<!-- <span id="lblValue"># </span>
 -->  
    <script>
      function edValueKeyPress() {
       let amount = document.getElementById('psum').value;
  
    $("#amount").val(amount * (7.5/100));
    console.log("The amount is "+amount);
}
    </script>
</body>
</html>