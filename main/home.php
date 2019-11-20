<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include_once("../templates/homenav.php")?>
	<div class="content">
		<h1>Inventory management software for <br>all businesses.</h1>
		<p>Duka Management increases your sales and keep track of every unit with our powerful stock management by 
		<br>staying organized, avoiding costly errors and tracking all inventory activities.</p>
		<a href="login.php">Log In</a>
		<a href="signup.php">Sign Up</a>
	</div>
	<footer class="footer">
		<div class="fcontent">
			<div class="fsection about">
				
				<h2>Duka Management</h2>
				<p>Duka Management increases your sales and keep track of every unit with our powerful stock management by 
				staying organized, avoiding costly errors and tracking all inventory activities.</p>
				<div class="contact">
					<span><i class="fa fa-phone"></i>&nbsp; +254792257242</span>
					<span><i class="fa fa-envelope"></i>&nbsp; lennydennis@gmail.com</span>
				</div>
				<div class="socials">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
			<div class="fsection links">
				<h2>Quick Links</h2>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="home.php">About Us</a></li>
					<li><a href="home.php">Contact Us</a></li>
					<li><a href="home.php">Team</a></li>
					<li><a href="home.php">Log In</a></li>
					<li><a href="home.php">Sign Up</a></li>
				</ul>
			</div>
			<div class="fsection email">
				<h2>Email Us</h2>
				<form>
					<input type="email" class="femail" name="email" placeholder="Your email address">
					<textarea name="message" class="fmessage" placeholder="Your message....."></textarea>
					<button type="submit" class="fbutton">
					<i class="fa fa-envelope"></i>
					Send</button>
				</form>
			</div>
		</div>
		<div class="footer-bottom">
			&copy; dukamanagement 2019 | Lenny Dennis Macharia
		</div>
	</footer>
	

</body>
</html>