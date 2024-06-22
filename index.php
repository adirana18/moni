<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lawson</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:image" content="" />
	<!-- Favicon -->
	 <link rel="icon" type="img/png" sizes="32x32" href="assets-login/images/logo.png">

	<link rel="stylesheet" type="text/css" href="assets-login/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="assets-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="assets-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets-login/css/main.css">

</head>
<body>
	<?php  
      if (isset($_COOKIE['emailPos'])) {
        $emailSession = base64_decode($_COOKIE['emailPos']);
      } else {
        $emailSession = "";
      }

      if (isset($_COOKIE['passPos'])) {
        $passSession = base64_decode($_COOKIE['passPos']);
      } else {
        $passSession = "";
      }
  	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="aksi/login" method="post">
					<span class="login100-form-title p-b-43">
						<br>Login</b>
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user_email" value="<?= $emailSession; ?>" placeholder="email">
						<span class="focus-input100"></span>
						<span class="label-input100"></span>
					</div>
					
					
				<div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="user_password" id="passwordField" value="<?= $passSession; ?>" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                   
                </div>
                
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-KsQ2au0aK5qRe6D77p4HtBWmyuSYwqMS/wjf2hDmDBEnmr2prN4xR0aBwDVrMA9JySJo3R6WFddzOH8BsiVVCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                
                <script>
                    function togglePasswordVisibility() {
                        var passwordField = document.getElementById("passwordField");
                        var toggleIcon = document.getElementById("toggleIcon");
                
                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                            toggleIcon.classList.remove("fa-eye");
                            toggleIcon.classList.add("fa-eye-slash");
                        } else {
                            passwordField.type = "password";
                            toggleIcon.classList.remove("fa-eye-slash");
                            toggleIcon.classList.add("fa-eye");
                        }
                    }
                </script>


					
					<div style="float: right;">
					     <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i id="toggleIcon" class="fa fa-eye" aria-hidden="true"></i>
                        </span>
						<a href="aksi/clear-cookie" style="color: #007bff;">
							<small><b>Clear</b></small>
						</a>
					</div><br>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Login
						</button>
					</div>
					
					
				</form>

				<div class="login100-more" style="background-image: url('assets-login/images/logo.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
	<script src="assets-login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets-login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets-login/js/main.js"></script>

</body>
</html>
