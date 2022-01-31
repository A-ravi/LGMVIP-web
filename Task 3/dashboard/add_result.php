<?php
include "../templates/header.php";

require "../config.php";

session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        

        $sql = "SELECT * FROM subjects";

        $result = mysqli_query($conn, $sql);
        
        // resutl database column values:
        $s_id = $_POST['add_result'];
        $inst_id = $_SESSION["inst_id"];
        
        // print_r("student " .$s_id) ;

        while($row = mysqli_fetch_assoc($result)){

            $sub_id = $row["sub_id"]; // 
            $sub_name = $row["sub_name"];
            $marks = $_POST[$sub_name]; // stored in $post variable

            $sql = "INSERT INTO `results`(`s_id`, `sub_id`, `inst_id`, `sub_name`, `sub_marks`) VALUES ('$s_id','$sub_id','$inst_id','$sub_name','$marks')";

            $result2 = mysqli_query($conn, $sql);

            echo mysqli_error($conn);


        }

        ?>
            <script>alert("Result added successfully")</script>
        <?php
        // echo "result added successfully!";
        
    }

?>



<?php

// query student data
$sql = "SELECT s_id FROM students WHERE s_id NOT IN (SELECT s_id from results); ";

$result = mysqli_query($conn, $sql);

// check for number of rows 
//  if rows are less than 0 don't show add result form.

?>
<div class=" container w-50 text-center">
    <form action="add_result.php" method="post">
        
        <h1 class="h3 mb-3 fw-normal mt-3">Add Student Result</h1>
        <label for="student" class="fs-4 m-2 text-bold">Choose a Student to enter result:</label>
        <select class="form-select" id="student" name="add_result" aria-label="Default select example">
        <option selected>---- Choose a Student here ----</option>
        <?php
        while ($data = mysqli_fetch_assoc($result)) {

            $id = $data['s_id'];

            $sql = "SELECT * FROM students WHERE s_id = '$id'";

            $result1 = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result1)) {
                $value = $row['roll_no'] . ' - ' . $row['f_name'] . ' ' . $row['l_name'];
        ?>
                <option value="<?php echo $row['s_id']; ?>"><?php echo $value; ?></option>
        <?php
            }
        }
        ?>
    </select>
    <div class="my-3"></div>
    <?php

$sql = "SELECT * FROM subjects";

$result2 = mysqli_query($conn, $sql);

while ($rows = mysqli_fetch_assoc($result2)) {
    ?>

<div class="form-floating">
    <input type="text" class="form-control" name="<?php echo $rows['sub_name']?>" id="<?php echo $rows['sub_id']?>" placeholder="Marks for <?php echo $rows['sub_name']?>">
    <label for="<?php echo $rows['sub_id']?>">Enter Marks for <?php echo $rows['sub_name']?> :</label>
</div>
<div class="my-3"></div>

        <?php    
    }

    ?>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Student Result</button>
    
</form>
</div>






<?php

// echo $student_data['s_id'];

// var_dump($student_data);


?>