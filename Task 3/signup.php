<?php include("templates/header.php");?>



<?php
    // Handle the form data 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        require "config.php";

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $password = password_hash($password,PASSWORD_DEFAULT);

        


        $sql = "INSERT INTO `instructors` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";

        $result = mysqli_query($conn, $sql);

        // can login now
        ?> 
            <script>alert("You can now Sign In!")</script>
        <?php

        // header("Location: signin.php");

    }
    ?>
<div class=" container w-50 text-center">
    <form action="signup.php" method="post">
        
        <h1 class="h3 mb-3 fw-normal mt-3">Please Sign Up</h1>
        
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
            <label for="username">Username</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    
</form>
</div>




<?php include("templates/footer.php");?>


<!-- 
    sign up main details dalao action hoga signup.php par
    data ko database m dalo 
    done:   
    redirect to instructor dashboard.php


-->