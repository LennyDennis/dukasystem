<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body background="../images/signup.jpg">
	<?php include_once("../templates/homenav.php") ?>
		<div class="section">
			<div class="info">
			    <h2 style="padding: 10px; font-size: 35px;">Duka Inventory <br>System</h2>
			    <img class="icon" src="../images/logo.png">
			</div> 
 			<form class="form" action="../includes/newusermanage.php" method="POST" name="newuser" onsubmit="return validate()" autocomplete="off" >
			<h2>Add User</h2>
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
					<select name="usertype" class="input" >
		              <option value="" hidden disabled selected value>Choose User Type</option>
		              <option value="Admin">Admin</option>
		              <option value="Other">Other</option>
		            </select>
				</li>
				<li><div class = "errormessage" id = "usertypeerror"></div></li>
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
			        <input type="submit" id="button" name="submit" value="Add User">
			    </li>
			</ul>
			</form>
			</div>
	</div>
</body>
</html>
<script type="text/javascript">
//form validation
//getting all inputs from the newuser form
var date= document.forms["newuser"]["date"];
var fname= document.forms["newuser"]["fname"];
var sname= document.forms["newuser"]["sname"];
var email= document.forms["newuser"]["email"];
var usertype= document.forms["newuser"]["usertype"];
var password= document.forms["newuser"]["password"];
var cpassword= document.forms["newuser"]["cpassword"];

//getting error display objects
var fnameerror= document.getElementById('fnameerror');
var snameerror= document.getElementById('snameerror');
var emailerror= document.getElementById('emailerror');
var usertypeerror= document.getElementById('usertypeerror');
var passworderror= document.getElementById('passworderror');
var cpassworderror= document.getElementById('cpassworderror');

//setting event listeners
fname.addEventListener("blur",fnameverify, true);
sname.addEventListener("blur",snameverify, true);
email.addEventListener("blur",emailverify, true);
usertype.addEventListener("blur",usertypeverify, true);
password.addEventListener("blur",passwordverify, true);
cpassword.addEventListener("blur",cpasswordverify, true);

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
		//usertype validation
		if(usertype.value == ""){
			usertype.style.backgroundColor = "rgba(128,128,128,0.6)";
			usertype.style.border = "2px groove red";
			usertypeerror.innerHTML = "Please select usertype";
			usertype.focus();
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
	function usertypeverify(){
		if (usertype.value !="") {
			usertype.style.border = " 1px solid rgba(10, 180, 180, 1)";
			usertypeerror.innerHTML = "";
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
