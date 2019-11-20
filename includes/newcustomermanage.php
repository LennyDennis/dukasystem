<?php
    if(isset($_POST['submit'])){
        include_once '../database/connection.php';

        //get info from the form 
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        
        //check whether input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $sname)) {
            header('Location: ../main/newcustomer.php?registration=invalid');
            exit();
        }
        else{
            //check whether the email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('Location: ../main/newcustomer.php?registration=invalidemail');
                exit();
            }else{
                //check whether email is unique
                $sql= "SELECT * FROM customers WHERE email='$email'";
                $result= mysqli_query($conn, $sql);
                $resultcheck= mysqli_num_rows($result);

                if($resultcheck>0){
                    header('Location: ../main/newcustomer.php?registration=emailinuse');
                    exit();
                }else{
                    //insert into user table in database
                    $sql="INSERT INTO customers(date_added, fname, sname, email) 
                    VALUES('$date','$fname','$sname','$email')";
                    mysqli_query($conn, $sql);
                    header('Location: ../main/customer.php?registration=success');
					exit();
                }
            }
        }
    }else{
        header('Location: ../main/newcustomer.php');
        exit();
    }
?>