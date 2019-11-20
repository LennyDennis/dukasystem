<?php
    if(isset($_POST['submit'])){
        include_once '../database/connection.php';

        //get info from the form 
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $cname = mysqli_real_escape_string($conn, $_POST['cname']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
        //check whether input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $cname) || !preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $sname)) {
            header('Location: ../main/signup.php?registration=invalid');
            exit();
        }
        else{
            //check whether the email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('Location: ../main/signup.php?registration=invalidemail');
                exit();
            }else{
                //check whether confirmed password match
                if($password != $cpassword ){
                    header('Location: ../main/signup.php?registration=passwordunmatch');
                    echo ("Passwords do not match");
                    exit();
                }else
                //check whether email is unique
                $sql= "SELECT * FROM registration WHERE email='$email'";
                $result= mysqli_query($conn, $sql);
                $resultcheck= mysqli_num_rows($result);

                if($resultcheck>0){
                    header('Location: ../main/signup.php?registration=emailinuse');
                    exit();
                }else{
                    //hashing the password
                    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
                    //insert into user table in database
                    $sql="INSERT INTO registration(date, com_name, fname, sname, email, password) 
                    VALUES('$date','$cname','$fname','$sname','$email', '$hashedpassword')";
                    mysqli_query($conn, $sql);
                    header('Location: ../main/login.php?signup=success');
					exit();
                }
            }
        }
    }else{
        header('Location: ../main/signup.php');
        exit();
    }
?>