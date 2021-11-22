<?php
session_start();
require 'functions.php';


//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if( $key === hash('sha256', $row['email'])){
		$_SESSION['login'] = true;
	}

 }

if( isset($_SESSION["login"])){
	header("Location: table.php");
	exit; 
}

	if( isset($_POST["login"])){

		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

		// cek email
		if( mysqli_num_rows($result) === 1){
			// cek password
			$row = mysqli_fetch_assoc($result);
			if(password_verify($password, $row["password"])){
				//set session
				$_SESSION["login"] = true;

					

				if ( isset($_POST['remember'])){
					// buat cookie
					setcookie('id',$row['id'], time()+3600);
					setcookie('key',hash('sha256', $row['email']), time()+3600);
				}
				header("Location: table.php");
				exit;
			}
		}

		$error = true;
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

	<?php if(isset($error)) : ?>
		<p style="color: red; font-style: italic">username / password salah</p>
	<?php endif;?>
		<!--php
          if(isset($_GET['pesan'])){
            if($_GET['pesan'] =="gagal"){
              echo "<div class='alert alert-danger' role='alert' align='center'>Email dan Password Tidak Sesuai</div>";
            }elseif($_GET['pesan'] == "logout"){
              echo "<div class='alert alert-success' role='alert' align='center'>Anda Berhasil Logout</div>";
            }
          }
  	    ?>
		-->
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="text-center my-4">
						<img src="https://upload.wikimedia.org/wikipedia/en/0/0e/BWF_Super_Series_Premier.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form action="" method="post" class="my-login-validation" novalidate="">
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
									<button type="submit" name="login" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="registrasi.php">Create One</a>
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
