<?php
session_start();
include_once 'database.php';

if (isset($_POST['loginsubmit'])) {
            # code...
            // echo "asasasa";
            $username = $_POST['user_name'];
            $password = $_POST['password'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            
            $sql = "
            SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'
            ";

            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                # code...
            } else {
                # code...
                echo mysqli_error($conn);
            }
            
            $row = $result ->fetch_assoc();
            // $username = $row['username'];
            // $password = $row['password'];

            if (empty($row['username'])) {
                # code...
                print "user not found";
                $_SESSION['user_not_found'] = 1;
                header("Location: login.php");
            } else {
                # code...
                // user found
                $_SESSION['user_is_logged_in'] = 1;
                header("Location: home.php");
            }
            
        }

?>