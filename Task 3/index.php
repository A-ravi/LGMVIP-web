<?php include("templates/header.php"); ?>


<h2 class="text-center mt-3">Search student results here:</h2>

<form action="index.php" method="POST" class="container w-50">
    <div class="mb-3">
        <label for="search" class="form-label text-bold fs-4">Enter Roll number: </label>
        <input type="text" name="search" class="form-control" id="search" placeholder="Roll no">
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "config.php";

    $roll_no = $_POST['search'];

    $sql = "select * from students WHERE roll_no = '$roll_no'";
    $result = mysqli_query($conn, $sql);

    $student_data = mysqli_fetch_assoc($result); // this contains name, roll s_id

    // echo $student_data['f_name'] . "<br>";
    $s_id = $student_data['s_id'];
    // echo $s_id  . "<br>";

    $sql2 = "SELECT * FROM results where s_id = '$s_id'";
    $result2 = mysqli_query($conn, $sql2);

    // echo var_dump(mysqli_fetch_assoc($result2));
    // result variables

    $obt_marks = 0;
    $no = 0;
?>

    <div class="container w-75 pt-4">
        <p class="fs-4 text-bold">Student Name: <?php echo $student_data["f_name"] ." ". $student_data["l_name"]?></p>
        <p class="fs-4 text-bold">Student Roll no: <?php echo $student_data["roll_no"] ?></p>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sr.no</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Subject name</th>
                    <th scope="col">Obtained Marks</th>
                    <th scope="col">Out off</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result2)) { ?>
                    <tr>
                        <th scope="row"><?php echo $no + 1 ?></th>
                        <td><?php echo $row['sub_id'] ?></td>
                        <td><?php echo $row['sub_name'] ?></td>
                        <td><?php echo $row['sub_marks'] ?></td>
                        <td>100</td>
                    </tr>
                <?php
                    $no = $no + 1;
                    $obt_marks = $row['sub_marks'] + $obt_marks;
                }
                ?>
            </tbody>
            <tfoot>
                <td colspan="3" class="text-bold fs-4 text-center">Percentage(%): <?php echo ($obt_marks / (100 * $no) * 100) ?> </td>
                <td colspan="2" class="text-bold fs-5 text-center">Total Obtained Marks: <?php echo ($obt_marks) ?></td>
            </tfoot>
        </table>
    </div>
<?php
}
?>

<?php include("templates/footer.php"); ?>