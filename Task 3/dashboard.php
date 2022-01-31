<?php include("templates/header.php")?>

<?php
    session_start();
    // session is not set then redirect to index.php
        
    if(! isset($_SESSION) && $_SESSION["logged_in"] = false){
        header("Location: index.php");
        exit();
    }
?>


<h1 class="text-center my-3 ">Hey Welcome - <?php echo $_SESSION['username'] ?></h1>

<!-- use javascript to render different  -->
<div class="container text-center p-4">

<a class="m-3" href="dashboard/add_student.php"><button type="button" class="btn btn-primary">Add Student</button></a>

<a class="m-3" href="dashboard/del_student-get.php"><button type="button" class="btn btn-primary">Delete Students</button></a>

<a class="m-3" href="dashboard/add_subject.php"><button type="button" class="btn btn-primary">Add Subjects</button></a>

<a class="m-3" href="dashboard/add_result.php"><button type="button" class="btn btn-primary">Add Student Result</button></a>

<a class="m-3" href="dashboard/del_result.php"><button type="button" class="btn btn-primary">Delete Student Result</button></a>


</div>



<!--Add a student form  -->
<!-- <a href="dashboard/add_student.php">Add Student</a> -->
<!-- END add student form -->



<!--Delete a student form  -->
<!-- fetech detail from student table and show a delete button -->

<!-- <a href="dashboard/del_student-get.php">Delete Student</a> -->

<!-- END delete student form -->


<!-- Add subject form -->

<!-- take no of subjects
    print that much input form 
    generate using javascript.

    -->


<!-- <a href="dashboard/add_result.php"> Add Student Result.</a> -->



<!-- <a href="dashboard/del_result.php"> Delete Student Result.</a> -->


<?php include("templates/footer.php");?>