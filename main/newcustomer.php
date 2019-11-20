<!DOCTYPE html>
<html>
<head>
	<title>New Customer</title>
	<link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body background="../images/signup.jpg">
	<?php include_once("../templates/sidenav.php") ?>
		<div class="section">
			<div class="info">
			    <h2 style="padding: 10px; font-size: 35px;">Duka Inventory <br>System</h2>
			    <img class="icon" src="../images/logo.png">
			</div> 
 			<form class="form" action="../includes/newcustomermanage.php" method="POST" name="newcustomer" onsubmit="return validate()" autocomplete="off" >
			<h2>New Customer</h2>
			<ul class="list">
				<li>
					<label for="date"></label>
					<input type="text" name="date" class="input" value= "<?php echo date('d-m-y');?>" readonly>
				</li>
				<li>
					<label for="firstname"></label>
					<input type="text" name="fname" class="input" placeholder="First name">
				</li>
				<li><div class = "errormessage" id = "fnameerror"></div></li>
				<li>
					<label for="secondname"></label>
					<input type="text" name="sname" class="input" placeholder="Second name">
				</li>
				<li><div class = "errormessage" id = "snameerror"></div></li>
				<li>
					<label for="email"></label>
					<input type="email" name="email" class="input" placeholder="Email">
				</li>
				<li><div class = "errormessage" id = "emailerror"></div></li>
				<li>
			        <input type="submit" id="button" name="submit" value="Register">
			    </li>
			</ul>
			</form>
			</div>
	</div>
</body>
</html>
<script type="text/javascript">
//form validation
//getting all inputs from the newcustomer form
var date= document.forms["newcustomer"]["date"];
var fname= document.forms["newcustomer"]["fname"];
var sname= document.forms["newcustomer"]["sname"];

//getting error display objects
var fnameerror= document.getElementById('fnameerror');
var snameerror= document.getElementById('snameerror');
var emailerror= document.getElementById('emailerror');

//setting event listeners
fname.addEventListener("blur",fnameverify, true);
sname.addEventListener("blur",snameverify, true);
email.addEventListener("blur",emailverify, true);

//validation function 
function validate(){
	//firstname  validation
		if(fname.value == ""){
			fname.style.backgroundColor = "rgba(128,128,128,0.6)";
			fname.style.border = "2px groove red";
			fnameerror.innerHTML = "Please enter your first name";
			fname.focus();
			return false;
		}
		//secondname validation
		if(sname.value == ""){
			sname.style.backgroundColor = "rgba(128,128,128,0.6)";
			sname.style.border = "2px groove red";
			snameerror.innerHTML = "Please enter your second name";
			sname.focus();
			return false;
		}
		//email validation
		if(email.value == ""){
			email.style.backgroundColor = "rgba(128,128,128,0.6)";
			email.style.border = "2px groove red";
			emailerror.innerHTML = "Please enter your email";
			email.focus();
			return false;
		}
	}

	//event handler functions
	function fnameverify(){
		if (fname.value !="") {
			fname.style.border = " 1px solid rgba(10, 180, 180, 1)";
			fnameerror.innerHTML = "";
			return true;
		}

	}
	function snameverify(){
		if (sname.value !="") {
			sname.style.border = " 1px solid rgba(10, 180, 180, 1)";
			snameerror.innerHTML = "";
			return true;
		}
		
	}
	function emailverify(){
		if (email.value !="") {
			email.style.border = " 1px solid rgba(10, 180, 180, 1)";
			emailerror.innerHTML = "";
			return true;
		}
		
	}

</script>
