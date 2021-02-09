<?php
session_start();
include_once 'database.php';

if (isset($_POST['registersubmit'])) {
            # code...
            // echo "asasasa";
            $rusername = $_POST['username'];
            $rname = $_POST['name'];
            $rpassword = $_POST['password'];
            // $_SESSION['username'] = $username;
            // $_SESSION['name'] = $password;
            // $_SESSION['password'] = $password;
            
            $sql = "
            INSERT INTO `admin`(`name`, `username`, `password`) VALUES ('$rname' , '$rusername', '$rpassword')
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                # code...
                
                header("Location: login.php");
            } else {
                # code...
                $_SESSION['duplicate_user'] = 1;
                // echo mysqli_error($conn);
                header("Location: register.php");
            }
        }

?>