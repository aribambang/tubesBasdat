<?php
  session_start();
  include("functions/functions.php");
 ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flash Registration Form  Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'></head>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<body>
		<!---header--->
		<div class="header">
			<h1>Sistem Informasi Laboratorium Multimedia</h1><br>
      <h2>UPT Laboratorium</h2><br>
      <h2>Institut Teknologi Sumatera</h2>
		</div>
		<!---header--->
		<!---main--->
			<div class="main">
				<div class="main-section">
					<div class="login-section">
						<form action="" method="post">
						<h2>Login</h2>
						<div class="login-middle">
							<p>Log in dengan username dan password anda</p>

								<input type="text" name="username" placeholder="Username">
								<input type="password" name="password" placeholder="Password">

						</div>
            <div class="login-bottom">

							<div class="login-center" style="float:center;">

								<input type="submit" name="login" value="Login">

							</div>
						</div>
						</form>

					</div>
				</div>
			</div>
			<div class="footer">
			<p>&copy 2018 Kelompok 8 Basis Data RC</p>
		</div>
    <?php
        loginlaboran();
     ?>
		<!---main--->
			</body>
</html>
