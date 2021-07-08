<?php
session_start();
    include ("config.php");
    include ("functions.php");

 
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_email'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;

        }else
        {
            echo "Please enter some valid information!";
        }


    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>

<link rel="stylesheet" href="style.css">



</head>
<body>

    <div class="container">

        <div class="main">

        <div class="main-left">

            <p class="facebook-logo">facebook</p>

            <p class="facebook-status">Facebook helps you connect and share with the people in your life.</p>
        

        </div>
        <form action="facebook_login.php" method="post">
            <div class="main-right">
                <div class="main-right-login">

                <div class="main-right-email">
                    <input type="email" placeholder="Email address or phone number" name="user_email">
                </div>

                <div class="main-right-password">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="main-right-button">
                    <button type="submit">Log In</button> 
                </div>

                <div class="main-right-link">
                    <a href="">Forgotten account?</a>
                </div>

                <div class="main-right-line">

                </div>

                <div class="main-right-account">
                    <button type="submit">Create New Account</button>

                </div>
                <div class="main-right-page-link">
                    <a href="">create a page</a><p>for a celebrity, band or business.</p>

                </div>

            </div>
        </form>
        

      
        </div>

    </div>

    <div>
    

    </div>
    <div class="footer">
            <?php include('footer.php'); ?>
       
        </div>
    
        <div class="modal">
            <div class="modal-signup">
                <div class="modal-close">
                    <!-- <button class="close-button" aria-label="Close alert" type="button" data-close> -->
                        <!-- <span aria-hidden="true">&times;</span> -->
                        X
                    <!-- </button> -->
                </div>
                
                <div class="modal-signup-heading">
                    <p class="modal-signup-name">Sign Up</p>
                    <p class="modal-signup-child-name">It's quick and easy.</p>
            </div>
            <div class="modal-signup-name">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Surname">
            </div>

            <div class="modal-signup-email">
                <input type="email" placeholder="Email address or phone number">
            </div>

            <div class="modal-signup-password">
                <input type="password" placeholder="Password">
            </div>
                <div class="modal-date-birth">
                    <label for="">Date of birth</label>
                    <div class="modal-date-alert">
                        <a>&#63;</a>
                    </div>   
                </div>

                <div class="modal-date-selection">
                    <?php include('date_birth.php'); ?>

            
                </div>

            </div>
        </div>
    <script>
        $(document).ready(function(){
            $('#signup-account').click(function(){
                $('.modal').show();
            });
            $('.modal-close').click(function(){
                $('.modal').hide();
            });
        });
    </script>
</body>
</html>