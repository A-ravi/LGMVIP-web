<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Student Result Management System</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php">LGM-VIP-Web Task3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <?php 
                        session_start();
                        if($_SESSION["logged_in"] && isset($_SESSION)){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard.php">DashBoard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout.php">Logout</a>
                            </li>
                            <?php
                        }else{?>"
                            <li class="nav-item">
                            <a class="nav-link" href="/signup.php">Sign Up</a>
                            </li>"?>
                            <?php
                            }
                     if(! $_SESSION["logged_in"] && isset($_SESSION)){?>  
                        <li class="nav-item">
                            <a class="nav-link" href="/signin.php">Sign In/Login</a>
                        </li>
                        <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>