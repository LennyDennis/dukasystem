<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body background="../images/signup.jpg">
	<?php include_once("../templates/homenav.php") ?>
		<div class="section">
			<div class="info">
			    <h2 style="padding: 10px; font-size: 35px;">Duka Inventory <br>System</h2>
			    <img class="icon" src="../images/logo.png">
			</div> 
 			<form class="form" action="../includes/signupmanage.php" method="POST" name="signup" onsubmit="return validate()" autocomplete="off" >
			<h2>Sign Up</h2>
			<ul class="list">
				<li>
					<label for="date"></label>
					<input type="text" name="date" class="input" value= "<?php echo date('d-m-y');?>" readonly>
				</li>
				<li>
					<label for="companyname"></label>
					<input type="text" name="cname" class="input" placeholder="Company name">
				</li>
				<li><div class = "errormessage" id = "cnameerror"></div></li>
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
					<label for="password"></label>
					<input type="password" name="password" class="input" placeholder="Password">
				</li>
				<li><div class = "errormessage" id = "passworderror"></div></li>
				<li>
					<label for="cpassword"></label>
					<input type="password" name="cpassword" class="input" placeholder="Confirm password">
				</li>
				<li><div class = "errormessage" id = "cpassworderror"></div></li>
				<li>
			        <input type="submit" id="button" name="submit" value="Sign Up">
			    </li>
				<li class="link"><a href="login.php" class="link" style="color: aqua;">Already registered?</a></li>
			</ul>
			</form>
			</div>
	</div>
</body>
</html>
<script type="text/javascript">
//form validation
//getting all inputs from the signup form
var date= document.forms["signup"]["date"];
var cname= document.forms["signup"]["cname"];
var fname= document.forms["signup"]["fname"];
var sname= document.forms["signup"]["sname"];
var email= document.forms["signup"]["email"];
var password= document.forms["signup"]["password"];
var cpassword= document.forms["signup"]["cpassword"];

//getting error display objects
var cnameerror= document.getElementById('cnameerror');
var fnameerror= document.getElementById('fnameerror');
var snameerror= document.getElementById('snameerror');
var emailerror= document.getElementById('emailerror');
var passworderror= document.getElementById('passworderror');
var cpassworderror= document.getElementById('cpassworderror');

//setting event listeners
cname.addEventListener("blur",cnameverify, true);
fname.addEventListener("blur",fnameverify, true);
sname.addEventListener("blur",snameverify, true);
email.addEventListener("blur",emailverify, true);
password.addEventListener("blur",passwordverify, true);
cpassword.addEventListener("blur",cpasswordverify, true);

//validation function 
function validate(){
	//companyname  validation
	if(cname.value == ""){
			cname.style.backgroundColor = "rgba(128,128,128,0.6)";
			cname.style.border = "2px groove red";
			cnameerror.innerHTML = "Please enter company's name";
			cname.focus();
			return false;
		}
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
		//password validation
		if(password.value == ""){
			password.style.backgroundColor = "rgba(128,128,128,0.6)";
			password.style.border = "2px groove red";
			passworderror.innerHTML = "Please enter your password";
			password.focus();
			return false;
		}
		//confirm password validation
		if(cpassword.value == ""){
			cpassword.style.backgroundColor = "rgba(128,128,128,0.6)";
			cpassword.style.border = "2px groove red";
			cpassworderror.innerHTML = "Please confirm your password";
			cpassword.focus();
			return false;
		}
	}

	//event handler functions
	function cnameverify(){
		if (cname.value !="") {
			cname.style.border = " 1px solid rgba(10, 180, 180, 1)";
			cnameerror.innerHTML = "";
			return true;
		}

	}
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
	function passwordverify(){
		if (password.value !="") {
			password.style.border = " 1px solid rgba(10, 180, 180, 1)";
			passworderror.innerHTML = "";
			return true;
		}
		
	}
	function cpasswordverify(){
		if (cpassword.value !="") {
			cpassword.style.border = " 1px solid rgba(10, 180, 180, 1)";
			cpassworderror.innerHTML = "";
			return true;
		}
		
	}

</script>
