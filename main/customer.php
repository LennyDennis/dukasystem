<?php
    if(isset($_POST['submit'])){
       // include_once ('../database/connection.php');
        $search = $_POST['search'];
        $query = "SELECT * FROM `customers` WHERE `fname` LIKE '%".$search."%'";
        $search_result = searchTable($query);

    }else{
        $query="SELECT * FROM customers";
        $search_result = searchTable($query);
    }
	function searchTable($query){
        include_once ('../database/connection.php');
        $results=mysqli_query($conn, $query);
        return $results;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/table.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Users</title>
    </head>
    <body>
        <?php include_once('../templates/sidenav.php');?>
        <div class="main">
            <form method="POST" action="customer.php" autocomplete="off">
            <h2>Customers</h2>
                <div class="search">
                    <input type="text" name="search"class="find" placeholder="Search first name...">
                    <button type="submit" name="submit" class="searchbutton" ><i class="fa fa-search"></i></button>
                </div>
                <div class="table">
					<table class="table">
						<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</thead>
						<tbody>
							<tr>
							<?php
								while($row=mysqli_fetch_assoc($search_result))
								{
							?>
								<td><?php echo $row['id']?></td>
								<td><?php $fullname=$row['fname'].' '.$row['sname']; echo $fullname?></td>
								<td><?php echo $row['email']?></td>
								<td>Action</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
            </div>
            </form>
           
        </div>
    </body>
</html>

