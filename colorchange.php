 <html>
<style type="text/css">
</style>
<?php
  if (isset ($_POST['color'])){
    $color = intval ($_POST['color']);
  } else {
    $color = "";
  }if ($color == 1){
    $fontcolor = "00FF00";
  } elseif ($color == 2){
    $fontcolor = "FF0000";
  } elseif ($color == 3){
    $fontcolor = "0000FF";
  } else {
    $fontcolor = "FFFFFF";
  }
  ?>
<body style="background-color: #<?php echo $fontcolor; ?>;"><?php
  ?>
  <div>
    <h1>Sample Excersise 1</h1>
    <p>sample text</p>
    <form action="" method="POST" ><input type="submit" value="Random"></form>
  </div>
</body>
</html>