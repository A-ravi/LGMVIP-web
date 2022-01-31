<?php

require '../config.php';

if(isset($_GET['id'])){
    

    $s_id =  $_GET['id'];
    
    
    $sql = "DELETE FROM `results` WHERE `s_id` = $s_id";
    
    $result3 = mysqli_query($conn, $sql);
    echo"success";

    
    // Record delete successfully and redirect to dashborad.php
    
     header('Location: ../dashboard.php');
    
}

?>