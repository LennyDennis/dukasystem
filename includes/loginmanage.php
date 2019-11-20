<?php
    session_start();

    //check whether the submit button was clicked
    if (isset($_POST['submit'])) {
        include_once '../database/connection.php';

        //get data from the form
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //check whether the user exits in the system
        $sql = "SELECT * FROM registration WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

            if($resultCheck<1){
                header('Location: ../main/login.php?Login=userdoesntexist');
                exit();
            }else{
                if($userinfo = mysqli_fetch_assoc($result)){
                    //dehashing password
                    $passworddehash = password_verify($password, $userinfo['password']);
                    if($passworddehash == false){
                        header('Location: ..main/login.php?Login=pwderror');
                        exit();
                    }elseif ($passworddehash == true) {
                        //login user
                        $_SESSION['id'] = $userinfo['id'];
                        $_SESSION['fname'] = $userinfo['fname'];
                        $_SESSION['sname'] = $userinfo['sname'];
                        $_SESSION['email'] = $userinfo['email'];
                        $_SESSION['usertype'] = $userinfo['usertype'];

                        header('Location: ../main/home.php?Login=success');
                        exit();
                    }
                }

            
            }
    }else{
        header('Location: ../main/login.php?Login=error');
        exit();
    }

?>