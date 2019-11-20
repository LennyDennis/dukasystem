<?php
    if(isset($_POST['submit'])){
        include_once '../database/connection.php';

        //get info from the form
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $name = mysqli_real_escape_string($conn, $_POST['itemname']);
        $category = mysqli_real_escape_string($conn, $_POST['itemcat']);
        $price = mysqli_real_escape_string($conn, $_POST['itemprice']);
        $quantity = mysqli_real_escape_string($conn, $_POST['itemqty']);

        //check whether item exists
        $sql = "SELECT * FROM items where item_name = '$name'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);

        if($resultcheck>0){
            echo 'Item already exists';
            header('Location: ../main/newitem.php?itemexits');
            exit();
        } else{
            //insert data into the form
            $sql = "INSERT INTO items (date_added, item_name, item_category, item_price, item_quantity) 
            VALUES ('$date', '$name', '$category', '$price', '$quantity')";
            mysqli_query($conn, $sql);
            header('Location: ../main/item.php?itemadded');
            
        }
    }
?>