<?php include("../templates/header.php");?>
<?php

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $id =  $_GET['id'];
        //echo $id;

        require '../config.php';

        $sql = "DELETE FROM `students` WHERE `s_id` = $id";

        $result = mysqli_query($conn, $sql);

        // Record delete successfully and redirect to dashborad.php

        ?>
            <script>alert("Student record deleted successfully!")</script>
        <?php
        //header('Location: ../dashboard.php');

    }

?>