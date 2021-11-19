<!DOCTYPE html>
<html lang="en">

<head>
	<?php $title= "kanban & Kalendar"; ?>
	
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- BOOTSTRAP-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" media='all' integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

<!-- CSS STYLE-->
<link rel="stylesheet" href="css/style.css">
<title><?php $title ?></title>
	
</head>


<body>

<!-- -------------------------------------- MENU -------------------------------------------- -->
<header class="m-0 p-0">
	<nav class="navbar navbar-expand-lg pt-3 text-dark">
		<div class="menu container">
			<a href="index.php" class="navbar-brand">
			<!-- Logo Image -->
			<img src="img/logo.png" width="45" alt="Kalendar" class="d-inline-block align-middle mr-2">
			<!-- Logo Text -->
			<span class="logo_text align-middle">Kanban & Kalendar</span>
			</a>

			<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
			<div id="navbarSupportedContent" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li><a href="login.php" class="btn text-primary mr-2"></i>Log in</a></li>				
				</ul>
			</div>
		</div>
	</nav>
</header>


<!-- ----------------------- MAIN CONTENT --------------------------------------- -->
<div class="container">
	<div class="row m-0 p-0">
		<div class="col-6 p-5">
			<img class="img-fluid pl-5" src="img/2.jpg" alt="project_management">		
		</div>	
		<div class="col-6 p-5 justify-content-center">
			<p class="text-center h1 fw-bold m-5">SIGN UP</p>
			<form class="px-5" name="signup" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<div class="mb-4">					
					<div class="input-group">
						<div class="input-group-prepend">
						<span class="btn-sign-up text-light input-group-text"> <small><i class="fas fa-user"></i></small></span>
						</div>					
						<input class="form-control" type="text" name="user" placeholder="Username" required>
					</div>
				</div>
				<div class="mb-4">					
					<div class="input-group">
						<div class="input-group-prepend">
						<span class="btn-sign-up text-light input-group-text"> <small><i class="fas fa-lock"></i></small></span>
						</div>					
						<input class="form-control" type="password" name="password" placeholder="Password" required>
					</div>
				</div>
				<div class="mb-4">					
					<div class="input-group">
						<div class="input-group-prepend">
						<span class="btn-sign-up text-light input-group-text"> <small><i class="fas fa-key"></i></small></span>
						</div>					
						<input class="form-control" type="password" name="password2" placeholder="Confirm password" required>
					</div>
				</div>

				<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
				<button type="button" class="btn btn-primary" onclick="signup.submit()">Register</button>
				</div>

				<?php if(!empty($errors)): ?>
					<div class="err">
						<ul>
							<?php echo $errors; ?>
						</ul>
					</div>
				<?php endif; ?>
			</form>
			<span class="d-flex justify-content-center">Already have an account?<a class="nav-link text-primary m-0 p-0 pl-2" href="login.php">Log in</a></span>			
		</div>

	</div>
</div>

<!-- -------------------------- FOOTER --------------------------- -->
<footer>
	<div class="row m-0 p-0">
		<div class="col-12">
			<div class="container d-flex justify-content-center">
				<ul class="list-unstyled list-inline text-center d-flex justify-content-center align-items-center">				
					<li class="list-inline-item"><a class="btn btn-dark text-light rounded-circle" href="https://github.com/carogaltier"><span class="fab fa-github"></span></a></li>
					<li class="list-inline-item"><a class="btn btn-dark text-light rounded-circle" href="https://www.linkedin.com/in/carogaltier/"><span class="fab fa-linkedin-in"></span></a></li> 
					<small><span class="ml-2">Kanban & Kalendar © 2021 All Rights Reserved. Created by<a class="nav-link d-inline-block text-primary pl-1" href="https://github.com/carogaltier">Carolina Galtier</a></span></small>               
				</ul>
			</div>
		</div>
	</div>
</footer>
  
<!-- --------------------- JS SCRIPTS JQUERY + POPPER + BOOTSTRAP ------------------------- -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>