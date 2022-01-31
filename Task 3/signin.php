<?php include("templates/header.php");?>

<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        require "config.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT `inst_id`, `username`, `password`, `email` FROM `instructors` WHERE `username`= '$username'; ";

        $result = mysqli_query($conn, $sql);

        //  if in result there is not a user then

        if(mysqli_num_rows($result) > 0){
            
            $row = mysqli_fetch_assoc($result);
            
            $hash_password = $row['password'];

            $check_password = password_verify($password, $hash_password);

            if($check_password){
                echo "login successfull && session started";
                
                session_start();
                $_SESSION["logged_in"] = true;
                $_SESSION["inst_id"] = $row["inst_id"];
                $_SESSION["username"] = $row["username"];

                header("Location: dashboard.php");


            }else{
                ?> 
                <script>alert("Invalid Username of Password!")</script>
            <?php
            }

        }else{
            ?> 
                <script>alert("Invalid Username of Password!")</script>
            <?php
        }
    }

    
?>
<div class=" container w-50 text-center">
    <form action="signin.php" method="post">
        
        <h1 class="h3 mb-3 fw-normal mt-3">Sign In</h1>
        
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
            <label for="username">Username</label>
        </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
    
</form>
</div>


<?php include("templates/footer.php");?>

<!-- 
    take inputs from form 
    query database 
    verify password
    set session and redirect to dashboard.

 -->