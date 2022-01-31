<?php include("../templates/header.php");?>

<?php
    // session is not set then redirect to index.php
    session_start();

    if(! isset($_SESSION) && $_SESSION["logged_in"] = false){
        header("Location: ../index.php");
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
       
        require "../config.php";

        $sub_name = $_POST['sn'];
        $sub_code = $_POST['sc'];

        
        $sql = "INSERT INTO `subjects`(`sub_id`, `sub_name`) VALUES ('$sub_code','$sub_name')";
        
        $result = mysqli_query($conn, $sql);
        ?>
        <script>alert("Subject Added Successfully!")</script>
    <?php

        // header("Location: ../dashboard.php");
    }

?>


<div class=" container w-50 text-center">
    <form action="add_subject.php" method="post">
        
        <h1 class="h3 mb-3 fw-normal mt-3">Add Subjects</h1>
        
        <div class="form-floating">
            <input type="text" class="form-control" name="sc" id="sc" placeholder="Subject Code">
            <label for="sc">Enter Subject Code:</label>
        </div>
        <div class="my-3"></div>
        <div class="form-floating">
            <input type="text" class="form-control" name="sn" id="sn" placeholder="Subject Name">
            <label for="sn">Enter Student's Subject Name:</label>
        </div>
        <div class="my-3"></div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Subject</button>
    
</form>
</div>