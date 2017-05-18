<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<html>
<head>
	<title>Scrollr - Log In or Sign Up</title>
	<link rel="stylesheet" type="text/css" href="assets/css/properties.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sections/register.css">
	<link rel="stylesheet" type="text/css" href="assets/css/forms/forms.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<?php

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>

	<section class="sec-Register">
		<div class="sec-Register_Inner">
			<div class="sec-Register_Body">
				<div class="sec-Register_Header">
					<h1 class="sec-Register_Title">Login or Sign Up to scrollr</h1>
					<h2 class="sec-Register_Description">Share the moments that matter</h2>
				</div>

				<div class="sec-Register_Columns">
					<div class="sec-Register_Column">
						<div class="sec_Register_Movie">
							<video width="500" autoplay loop>
							  <source src="assets/images/scrollr_mov.mp4" type="video/mp4">
							</video>
						</div>
					</div>

					<div class="sec-Register_Column sec-Register_ColumnLogin">
						<div class="sec-Register_Content">
							<a class="sec-Register_Logo">
								<img class="sec-Register_Logo-image" src="assets/images/scrollr-logo.png">
							</a>
							<div id="first">
								<form class="frm-Form" action="register.php" method="POST">
									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="email" name="log_email" placeholder="Email Address" value="<?php
										if(isset($_SESSION['log_email'])) {
											echo $_SESSION['log_email'];
										}
										?>" required>
									</div>
									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="password" name="log_password" placeholder="Password">
									</div>
									<div class="frm-Form_Section">
										<input class="frm-Form_Input frm-Form_Button" type="submit" name="login_button" value="Login">
									</div>
									<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
									<div class="frm-Form_Section">
										<span class="frm-Form_Below">Don't have an account? <a class="frm-Form_Link" href="#" id="signup" class="signup">Sign up</a>
									</div>
								</form>
							</div>

							<div id="second">
								<form class="frm-Form" action="register.php" method="POST">
									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="text" name="reg_fname" placeholder="First Name" value="<?php
										if(isset($_SESSION['reg_fname'])) {
											echo $_SESSION['reg_fname'];
										}
										?>" required>
										<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="text" name="reg_lname" placeholder="Last Name" value="<?php
										if(isset($_SESSION['reg_lname'])) {
											echo $_SESSION['reg_lname'];
										}
										?>" required>
										<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="email" name="reg_email" placeholder="Email" value="<?php
										if(isset($_SESSION['reg_email'])) {
											echo $_SESSION['reg_email'];
										}
										?>" required>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
										if(isset($_SESSION['reg_email2'])) {
											echo $_SESSION['reg_email2'];
										}
										?>" required>
										<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
										else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
										else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="password" name="reg_password" placeholder="Password" required>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input" type="password" name="reg_password2" placeholder="Confirm Password" required>
										<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
										else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
										else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
									</div>

									<div class="frm-Form_Section">
										<input class="frm-Form_Input frm-Form_Button" type="submit" name="register_button" value="Register">
									</div>

									<div class="frm-Form_Section">
										<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
									</div>

									<div class="frm-Form_Section">
										<span class="frm-Form_Below">Already have an account? <a class="frm-Form_Link" href="#" id="signin" class="signin">Sign in</a></span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
