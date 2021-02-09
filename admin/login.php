<?php 
    session_start();
    include "login_header.php"; 
    include_once "database.php";

    $_SESSION['user_is_logged_in'] = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../static\css\user.css">
    <link rel="stylesheet" href="../static\css\admin.css">

    <!-- footer -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- footerend -->
</head>

<body>
    <h1 class="display-5">Welcome to Admin Panel Log In</h1>

    <div class="container userpass">


        <form class="g-3 needs-validation" novalidate action="loginvalidation.php" method="post">

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="validationCustom01" name="user_name" placeholder="abcdF342" required>
                <label for="floatingInput"  class="form-label">User Name</label>
                
                <div class="invalid-feedback">
                    Please Provide a User Name
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>


            <div class="form-floating">
                <input type="password" class="form-control" id="validationCustom01" name="password" placeholder="Password" required>
                <label for="floatingPassword"   class="form-label">Password</label>
                <div class="invalid-feedback">
                    Please Provide a Password
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            
            <br>
            <button name='loginsubmit' class="btn btn-primary login_btn" type="submit">Log in</button>

            <a href="register.php">
                <button type="button" class="btn btn-outline login_btn">Register</button>
            </a>
        </form>

    </div>

    

    <?php
        

        if (isset($_SESSION['user_not_found'])) {
            # code...
            if ($_SESSION['user_not_found']) {
                # code...
                
                
            ?>
            <div class="container">
            <div class="alert alert-danger" role="alert">
                In Valid Username or Password
            </div></div>
            <?php
            session_unset();
            // unset($_SESSION['user_not_found']);
            
            }
        }
    ?>

    <script src="validation.js"></script>
</body>
</html>

<?php //include ("Afooter.php"); ?>