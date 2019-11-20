<?php
	include_once ('../database/connection.php');

	$sql= "SELECT cat_name FROM `categories`";
	$result= mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	
</head>
<body>
    <?php include_once('../templates/sidenav.php');?>
	<div class="container">
		<div class="section">
			<div class="info">
			    <h2 style="padding: 10px; font-size: 35px;">Duka Inventory <br>System</h2>
			    <img class="icon" src="../images/logo.png">
			</div>
			<form class="form" name="newitem" action="../includes/manageitem.php" onsubmit="return validate()" method="POST" autocomplete="off">
			<h2>New Item</h2>
			<ul class="list">
				<li>
					<label for="date"></label>
					<input type="text" name="date" class="input" value= "<?php echo date('d-m-y');?>" readonly>
				</li>
				<li>
					<label for="itemname"></label>
					<input type="text" name="itemname" class="input" placeholder="Item name">
				</li>
				<li><div class = "errormessage" id = "nameerror"></div></li>
				<li>
					<label for="category"></label>
					<select class="input" name="itemcat" >
						<option value='0'hidden disabled selected value >Select</option>
							 <?php while($row =mysqli_fetch_assoc($result))
							 {
							?>
								<option value='($row['cat_name'])'><?php ($row['cat_name'])?></option>
							<?php
								 }
							?>
					</select>
				</li>
				<li>
					<label for="itemprice"></label>
					<input type="text" name="itemprice" class="input" placeholder="Item price">
				</li>
				<li><div class = "errormessage" id = "priceerror"></div></li>
				<li>
					<label for="quantity"></label>
					<input type="text" name="itemqty" class="input" placeholder="Quantity">
				</li>
				<li><div class = "errormessage" id = "qtyerror"></div></li>
				<li>
			        <input type="submit" id="button" name="submit" value="Add Item">
			    </li>
			</ul>
			</form>
			</div>
	</div>
</body>
</html>

<script type="text/javascript">
//form validation
//get inputs from form
	var date= document.forms["newitem"]["date"];
	var itemname = document.forms["newitem"]["itemname"];
	var itemcat = document.forms["newitem"]["itemcat"];
	var itemprice = document.forms["newitem"]["itemprice"];
	var itemqty = document.forms["newitem"]["itemqty"];

//getting error display objects
	var nameerror = document.getElementById('nameerror');
	var caterror = document.getElementById('caterror');
	var priceerror = document.getElementById('priceerror');
	var qtyerror = document.getElementById('qtyerror');
	
//setting event listeners	
	itemname.addEventListener("blur",itemnameverify, true);
	itemcat.addEventListener("blur",itemcatverify, true);
	itemprice.addEventListener("blur",itempriceverify, true);
	itemqty.addEventListener("blur",itemqtyverify, true);

//validaton function
	function validate(){
		if(itemname.value == ""){
			itemname.style.backgroundColor = "rgba(128,128,128,0.6)";
			itemname.style.border = "2px groove red";
			nameerror.innerHTML = "Enter the item name";
			itemname.focus();
			return false;
		}
		if(itemcat.value == ""){
			itemcat.style.backgroundColor = "rgba(128,128,128,0.6)";
			itemcat.style.border = "2px groove red";
			caterror.innerHTML = "Enter the item category";
			itemcat.focus();
			return false;
		}
		if (itemprice.value == ""){
			itemprice.style.backgroundColor = "rgba(128,128,128,0.6)";
			itemprice.style.border = "2px groove red";
			priceerror.innerHTML = "Enter the item price";
			itemprice.focus();
			return false;
		}
		if (itemqty.value == ""){
			itemqty.style.backgroundXColor = "rgba(128,128,128,0.6)";
			itemqty.style.border = "2px groove red";
			qtyerror.innerHTML = "Enter Item quantity";
			itemqty.focus();
			return false;
		}
	}

//event handler functions
	function nameverify{
		if(itemname.value != ""){
			itemname.style.border= "1px solid rgba(10, 180, 180, 1)";
			nameerror.innerHTML = "";
			return true;
		}
	}
	function itemcatvarify{
		if(itemcat.value != ""){
			itemcat.style.border = "1px solid rgba(10, 180, 180, 1)";
			caterror.innerHTML = "";
			return true;
		}
	}
	function itempriceverify(){
		if (itemprice.value !="") {
			itemprice.style.border = " 1px solid rgba(10, 180, 180, 1)";
			priceerror.innerHTML = "";
			return true;
		}
		
	}
	function itemqtyverify(){
		if (itemqty.value !="") {
			itemqty.style.border = " 1px solid rgba(10, 180, 180, 1)";
			qtyerror.innerHTML = "";
			return true;
		}
		
	}
</script>