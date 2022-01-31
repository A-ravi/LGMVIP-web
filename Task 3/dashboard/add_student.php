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

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $roll_no = $_POST['rollno'];

        //print_r($_POST);

        
        $sql = "INSERT INTO `students`(`f_name`, `l_name`, `roll_no`) VALUES ('$f_name','$l_name','$roll_no')";
        
        $result = mysqli_query($conn, $sql);
        ?>
            <script>alert("Student Added Successfully!")</script>
        <?php

        //header("Location: ../dashboard.php");
    }

?>
<div class=" container w-50 text-center">
    <form action="add_student.php" method="post">
        
        <h1 class="h3 mb-3 fw-normal mt-3">Add Student</h1>
        
        <div class="form-floating">
            <input type="text" class="form-control" name="f_name" id="f_name" placeholder="First Name">
            <label for="f_name">Enter Student's First name:</label>
        </div>
        <div class="my-3"></div>
        <div class="form-floating">
            <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last Name">
            <label for="l_name">Enter Student's Last name:</label>
        </div>
        <div class="my-3"></div>
        <div class="form-floating">
            <input type="text" class="form-control" name="rollno" id="rollno" placeholder="Roll number">
            <label for="rollno">Enter Student's Roll number:</label>
        </div>
        <div class="my-3"></div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Student</button>
    
</form>
</div>