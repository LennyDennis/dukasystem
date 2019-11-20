<?php
    if(isset($_POST['submit'])){
       // include_once ('../database/connection.php');
        $search = $_POST['search'];
        $query = "SELECT * FROM `categories` WHERE `cat_name` LIKE '%".$search."%'";
        $search_result = searchTable($query);

    }else{
        $query="SELECT * FROM categories";
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
        <link rel="stylesheet" type="text/css" href="../css/newcat.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Categories</title>
    </head>
    <body>
        <?php include_once('../templates/sidenav.php');?>
		<h2>New Category</h2>
        <div class="section">
			
			<div class="info">
			    <img class="icon" src="../images/logo.png">
			</div> 
        <form class="form" action="../includes/newcategorymanage.php" method="POST" name="newcat" onsubmit="return validate()" autocomplete="off" >
			<ul class="list">
				<li>
					<label for="date"></label>
					<input type="text" name="date" class="input" value= "<?php echo date('d-m-y');?>" readonly>
				</li>
				<li>
					<label for="categoryname"></label>
					<input type="text" name="catname" class="input" placeholder="Category name">
				</li>
				<li><div class = "errormessage" id = "catnameerror"></div></li>
				<li>
			        <input type="submit" id="button" name="submit" value="Add">
			    </li>
			</ul>
			</form>
			</div>
	</div> 
            <form method="POST" action="categories.php">   
            <h2>Categories</h2>
                <div class="search">
                    <input type="text" name="search"class="find" placeholder="Search category...">
                    <button type="submit" name="submit" class="searchbutton" ><i class="fa fa-search"></i></button>
                </div>
                <div class="table">
				<table class="table" >
					<thead>
						<tr>
							<th>#</th>
							<th>Category</th>
							<th>Added Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
						while($row=mysqli_fetch_assoc($search_result))
						{
						?>
							<td><?php echo $row['cat_id']?></td>
							<td><?php echo $row['cat_name']?></td>
							<td><?php echo $row['date_added']?></td>
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
<script type="text/javascript">
//form validation
//getting all inputs from the signup form
var date= document.forms["newcat"]["date"];
var catname= document.forms["newcat"]["catname"];

//getting error display objects
var catnameerror= document.getElementById('catnameerror');

//setting event listeners
catname.addEventListener("blur",catnameverify, true);

//validation function 
function validate(){
	//companyname  validation
	if(catname.value == ""){
			catname.style.backgroundColor = "rgba(128,128,128,0.6)";
			catname.style.border = "2px groove red";
			//catnameerror.innerHTML = "Please enter category ";
			catname.focus();
			return false;
		}
	
	}

	//event handler functions
	function catnameverify(){
		if (catname.value !="") {
			catname.style.border = " 1px solid rgba(10, 180, 180, 1)";
			catnameerror.innerHTML = "";
			return true;
		}

	}
	

</script>
