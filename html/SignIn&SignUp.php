<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name

if (isset($_POST['SignIn']))
    {
        $user_email = $_POST['emailIn'];
        $user_pw = $_POST['passwordIn'];

        $_SESSION['user_email_s'] = $user_email;


        if ((empty($user_email)) || (empty($user_pw)) ){
            echo '<script type="text/javascript"> alert("Please fill all required fields!") </script>';

        } else {

            $query = "SELECT * FROM user WHERE user_email= '$user_email' && user_pw = '$user_pw'";
            $query_run = mysqli_query($connection, $query);


            if(mysqli_num_rows($query_run) > 0){

                $query2 = "SELECT * FROM user WHERE user_email= '$user_email'";
                $query_run2 = mysqli_query($connection, $query2);
                $row2=mysqli_fetch_array($query_run2);
                $user_id=$row2['user_id'];

                $_SESSION['user_id_s'] = $user_id;

                if($user_email== 'talahamd99@gmail.com' || $user_email== 'farahdilea@gmail.com'){
                    header('location:AdminInfo.php');
                }
                else{
                    header('location:home.php');
                }

            }
            else{
                echo '<script type="text/javascript"> alert("Password and Confirm Password does not match") </script>';

            }
        }

    }

if (isset($_POST['SignUp'])) {

    $user_name = $_POST['username'];
    $user_add = $_POST['address'];
    $user_email = $_POST['email'];
    $user_pw = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];



    $_SESSION['user_email_s'] = $user_email;

    $data = $_POST;
    if (empty($data['username']) ||
        empty($data['address']) ||
        empty($data['email']) ||
        empty($data['password']) ||
        empty($data['password_confirm'])) {
        echo '<script type="text/javascript"> alert("Please fill all required fields!") </script>';
    } else {

        if ($user_pw == $password_confirm) {
            $query = "SELECT * FROM user WHERE user_email= '$user_email'";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {
                echo '<script type="text/javascript"> alert("Email is already exists... try another Email") </script>';
            } else {

                $query = "INSERT INTO `user` (`user_id`, `user_email`, `user_pw`, `user_name`, `user_add`, `user_type`, `visa_id`)
                          VALUES (NULL,'$user_email','$user_pw','$user_name', '$user_add','U',NULL)";
                $query_run = mysqli_query($connection, $query);



                if ($query_run) {
                    $query2 = "SELECT * FROM user WHERE user_email= '$user_email'";
                    $query_run2 = mysqli_query($connection, $query2);
                    $row2=mysqli_fetch_array($query_run2);
                    $user_id=$row2['user_id'];

                    $_SESSION['user_id_s'] = $user_id;


                    $query3 = "INSERT INTO `order` (`order_id`, `order_add`, `order_finaltotal`, `user_id`)
                    VALUES (NULL,NULL,NULL,'$user_id')";
                    $query_run3 = mysqli_query($connection, $query3);


                    echo '<script type="text/javascript"> alert("Your successfully SignUp") </script>';
                    header('location:home.php');
                } else {
                    echo '<script type="text/javascript"> alert("SignUp Failed") </script>';
                }
            }
        } else {
            echo '<script type="text/javascript"> alert("Password and Confirm Password does not match") </script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- title of site -->
    <title>OHS</title>

    <!-- For favicon png for the site -->
    <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon.png"/>

    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="../css/SignCSS/SignIn&SignUp.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="SignIn&SignUp.php" class="sign-in-form" method="post">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" name="emailIn" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="passwordIn" />
                </div>
                <input class="btn solid" type="submit" value="Login" name="SignIn" />

            </form>

            <form action="SignIn&SignUp.php" class="sign-up-form" method="post">
                <h2 class="title">Sign up</h2>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" />
                </div>
                <div class="input-field">
                    <i class="fas fa fa-map-marker"></i>
                    <input type="text" placeholder="Address"  name="address"/>
                </div>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-unlock"></i>
                    <input type="password" placeholder="Password" name="password"/>
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="password_confirm"/>
                </div>

               <input type="submit" class="btn" value="Sign up" name="SignUp" />
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                    You are just one step away from being a member of our amazing Family... Ring the bill below.                </p>
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="../Images/SignIn-SignUp/SignUp.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    Welcome back!you missed our updates, come in and check them out.
                </p>
                <button class="btn transparent" id="sign-in-btn">Sign in</button>
            </div>
            <img src="../Images/SignIn-SignUp/SignIn.svg" class="image" alt="" />
        </div>
    </div>
</div>
<script src="../js/SignJS/SignIn&SignUp.js"></script>
</body>
</html>
