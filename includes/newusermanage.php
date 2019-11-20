<?php
    if(isset($_POST['submit'])){
        include_once '../database/connection.php';

        //get info from the form 
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
        //check whether input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $sname)) {
            header('Location: ../main/newuser.php?registration=invalid');
            exit();
        }
        else{
            //check whether the email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('Location: ../main/newuser.php?registration=invalidemail');
                exit();
            }else{
                //check whether confirmed password match
                if($password != $cpassword ){
                    header('Location: ../main/newuser.php?registration=passwordunmatch');
                    echo ("Passwords do not match");
                    exit();
                }else
                //check whether email is unique
                $sql= "SELECT * FROM users WHERE email='$email'";
                $result= mysqli_query($conn, $sql);
                $resultcheck= mysqli_num_rows($result);

                if($resultcheck>0){
                    header('Location: ../main/newuser.php?registration=emailinuse');
                    exit();
                }else{
                    //hashing the password
                    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
                    //insert into user table in database
                    $sql="INSERT INTO users(date_added, fname, sname, email, usertype, password) 
                    VALUES('$date','$fname','$sname','$email', '$usertype', '$hashedpassword')";
                    mysqli_query($conn, $sql);
                    header('Location: ../main/user.php?newuser=success');
					exit();
                }
            }
        }
    }else{
        header('Location: ../main/user.php');
        exit();
    }
?>