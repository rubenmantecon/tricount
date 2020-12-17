<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tricount</title>
</head>
<header>
		<link rel="stylesheet" href="../style/home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<!-- Image and text -->
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
			<?php 
					if(isset($_SESSION["username"])){
						echo '<a class="navbar-brand" href="home.php">
						<img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Tux_Mono.svg" alt="" width="30" height="24" class="d-inline-block align-top">
						Tricount
						</a> <p class="navbar-brand">'.$_SESSION["username"].'</p>';
					}else {
						echo '<a class="navbar-brand" href="login.php">
						<img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Tux_Mono.svg" alt="" width="30" height="24" class="d-inline-block align-top">
						Tricount
						</a> <p class="navbar-brand">No has inicado sesion</p>';
					}
				?>
		</div>
		</nav>
</header>
