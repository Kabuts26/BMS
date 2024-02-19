<?php 
	session_start(); 
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/header.php' ?>
	<title>Login -  Barangay Management System</title>
<style>	
.login-form:before {
	background-image: url(assets/img/magdalena.jpg);
	background-size: 100% 100%;
	content: "";
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
	display: block;
	filter: blur(3px);
}

img {
	border-radius: 50%;;
	height: 200px;
	weight: 300px;
	display: block;
    margin-left: auto;
    margin-right: auto;
}
.logo:hover{
    -webkit-animation: spin 5s infinite;
    animation: spin 5s infinite;	
}
@-webkit-keyframes spin{
      from {
        -webkit-transform: rotateY(0deg);
      }
      to {
        -webkit-transform: rotateY(-360deg);
      }
    }
    
    @keyframes spin{
      from {
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
      }
      
      to {
        -moz-transform: rotateY(-360deg);
        -ms-transform: rotateY(-360deg);
        transform: rotateY(-360deg);
      }
    }
h1{
	color: black;
	font-family: stencil;
	text-align: center;
	font-size: 60px;
	padding: 20px;
    text-shadow: 0 0 5px white, 0 0 5px white,
	0 0 5px white, 0 0 5px white, 0 0 5px white;
	}	
</style>
<body class="login">
<!--HEADING-->
	<h1>Barangay Resident Information Management and Issuance System</h1>
	
	<!--HEADING-->
	<div class="logo">
	<img src="assets/img/logo1.jpg">
	</div>
<?php include 'templates/loading_screen.php' ?>
	
	<div class="wrapper wrapper-login" 	style="padding-bottom:200px">
        
		<div class="container container-login" style="background-color:maroon; color:white">
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']); ?>
            <?php endif ?>
			
			<h3 class="text-center">Sign In Here</h3>
			<div class="login-form">
                <form method="POST" action="model/login.php">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="text" class="form-control " required>
					<label for="username" class="placeholder" >Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control" required>
					<label for="password" class="placeholder">Password</label>
					<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="color:blue"></span>
				</div>
				<div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
                </form>
			</div>
		</div>
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>