<?php
    if(isset($_POST['submit'])){
        include_once '../database/connection.php';

        //get info from the form 
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $catname = mysqli_real_escape_string($conn, $_POST['catname']);
        
        //check whether input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $catname) ) {
            header('Location: ../main/categories.php? invalid');
            exit();
        }
        else
            //check whether name is unique
            $sql= "SELECT * FROM `categories` WHERE cat_name ='$catname'";
            $result= mysqli_query($conn, $sql);
            $resultcheck= mysqli_num_rows($result);

            if($resultcheck > 0){
                echo "Sorry... category already registered"; 
                header('Location: ../main/categories.php?Already registered');
                exit();
            }
        
            else{
                    $sql="INSERT INTO categories(date_added, cat_name ) 
                    VALUES('$date','$catname')";
                    mysqli_query($conn, $sql);
                    echo "saved";
                    header('Location: ../main/categories.php?categories=success');
					exit();
                }
            }
        
    else{
        header('Location: ../main/categories.php');
        exit();
    }
?>