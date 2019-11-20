
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<?php include_once("../templates/homenav.php") ?>

		<div class="section">
			<div class="info">
			    <h2 style="padding: 10px; font-size: 35px;">Duka Inventory <br>System</h2>
			    <img class="icon" src="../images/logo.png">
			</div>
	<form action="../includes/loginmanage.php" class="form" name="login" onsubmit="return validate()" method="POST" autocomplete="off" >
		<h2>Log In</h2>
		<ul class="list">
				<li>
					<label for="email"></label>
					<input type="email" name="email" class="input" placeholder="Email">
				</li>
				<li><div class = "errormessage" id = "emailerror"></div></li>
				<li>
					<label for="password"></label>
					<input type="password" name="password" class="input" placeholder="Password">
				</li>
				<li><div class = "errormessage" id = "passworderror"></div></li>
				<li>
			        <input type="submit" id="button" name="submit" value="Log In">
			    </li>
				<li class="link"><a href="signup.php" class="link">Not Registered?</a></li>
			</ul>
	</div>
</body>
</html>
<script type="text/javascript">
	//form validation
//getting all inputs from the login form
var email= document.forms["login"]["email"];
var password= document.forms["login"]["password"];

//getting error display objects
var emailerror= document.getElementById('emailerror');
var passworderror= document.getElementById('passworderror');

//setting event listeners
email.addEventListener("blur",emailverify, true);
password.addEventListener("blur",passwordverify, true);

//validation function 
function validate(){
		//email validation
		if(email.value == ""){
			email.style.backgroundColor = "rgba(128,128,128,0.6)";
			email.style.border = "2px groove red";
			emailerror.innerHTML = "Please enter your email";
			email.focus();
			return false;
		}
		//password validation
		if(password.value == ""){
			password.style.backgroundColor = "rgba(128,128,128,0.6)";
			password.style.border = "2px groove red";
			passworderror.innerHTML = "Please enter your password";
			password.focus();
			return false;
		}
	}

	//event handler functions
	function emailverify(){
		if (email.value !="") {
			email.style.border = " 1px solid rgba(10, 180, 180, 1)";
			emailerror.innerHTML = "";
			return true;
		}
		
	}
	function passwordverify(){
		if (password.value !="") {
			password.style.border = " 1px solid rgba(10, 180, 180, 1)";
			passworderror.innerHTML = "";
			return true;
		}
		
	}

</script>