<?php
$host="localhost";
$user="root";
$password="";
$db="studi-kasus"

mysql_connect($host,$user,$password);

mysql_select_db($db);

if($_POST(isset(['email']))){
    $uname=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from studi-kasus where user='".$uname."'AND Pass='".$password."' limit 1";

    $result=mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo " Tou Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Wrong Password";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="data:image/png;base64,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" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="" action="testing.php">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.html">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; Institut Teknologi Sepuluh Nopember
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
