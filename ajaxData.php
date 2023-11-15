<?php
// include 'dbConfig.php';

include('db_connect.php');


if(isset($_POST["head_id"]) && !empty($_POST["head_id"])){
 


        $query = $conn->query("SELECT DISTINCT subhead FROM subhead where head = '".$_POST['head_id']."' ORDER BY subhead ASC");

    $rowCount = $query->num_rows;
    
    if($rowCount > 0){
        echo '<option value="">Select Sub Head</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['subhead'].'">'.$row['subhead'].'</option>';
        }
    }else{
        echo '<option value="">subhead Not Available</option>';
    }
}
if(isset($_POST["subhead_id"]) && !empty($_POST["subhead_id"])){
    
    // if(isset($_POST["lga"]) && !empty($_POST["lga"])){

    $lg_escape = mysqli_real_escape_string($conn, $_POST["subhead_id"]);
    $query = $conn->query("SELECT DISTINCT subhead_desc FROM subhead where subhead = '".$lg_escape."' ORDER BY subhead_desc ASC");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
             while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['subhead_desc'].'">'.$row['subhead_desc'].'</option>';
        }
    }else{
        echo '<option value="">Description Not Available</option>';
    }
 
}




?>