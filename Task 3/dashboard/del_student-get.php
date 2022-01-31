<?php include("../templates/header.php");?>
<?php 
    require "../config.php";
    
    $sql = "SELECT * FROM `students`";
    
    $result = mysqli_query($conn, $sql);
    
    ?>

<div class="container w-75 pt-4">
    <h2 class="text-center m-3 fs-3">Delete a student</h2>
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
                    while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <th scope="row"><?php echo $no + 1 ?></th>
                        <td><?php echo $row['f_name'] ?></td>
                        <td><?php echo $row['l_name'] ?></td>
                        <td><?php echo $row['roll_no'] ?></td>
                        <td><a href="delete_student.php?id=<?php echo $row["s_id"];?>"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                <?php
                    $no = $no + 1;
                }
                ?>
            </tbody>
        </table>
    </div>
