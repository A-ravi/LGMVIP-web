<?php

// get student_id from results and then fetch data for each student using s_id
include "../templates/header.php";

require "../config.php";
$sql = "SELECT DISTINCT(s_id) FROM results";

$result = mysqli_query($conn, $sql);

    ?>


<div class="container w-75 pt-4">
    <h2 class="text-center m-3 fs-3">Delete a Student Result</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sr.no</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Roll Number</th>
                    <th scope="col">Delete ? </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $no = 0;
                while ($rows = mysqli_fetch_assoc($result)) {

                $id = $rows['s_id'];

                $sql1 = "SELECT s_id, f_name, l_name, roll_no from students where s_id = '$id'";

                $result2 = mysqli_query($conn, $sql1);
                

                while ($row = mysqli_fetch_assoc($result2)) { ?>
                        <tr>
                            <th scope="row"><?php echo $no + 1 ?></th>
                        <td><?php echo $row['f_name'] ?></td>
                        <td><?php echo $row['l_name'] ?></td>
                        <td><?php echo $row['roll_no'] ?></td>
                        <td><a href="del_result-get.php?id=<?php echo $row["s_id"];?>"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                <?php
                    $no = $no + 1;
                }
            }
                ?>
            </tbody>
        </table>
    </div>


