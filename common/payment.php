<?php

declare(strict_types=1);
include '../function/p.php';
$dbconection = connectToDatabase();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/home.css">
	<link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<title>Home</title>
</head>

<body>
	<?php require("header.php");
	$users = executeSelect("USERS", "name, surname");

	//Validation
	if ((isset($_POST['payment'])) && (isset($_POST['debtor']))) {
		//Ejecutar un insert de los datos 
	}

	?>
	<h1>Advanced Payment</h1>
	<!-- //Falta mostrar info a través de la sesión -->

	<form method="post" enctype="multipart/form">
		<input name="payment" id="payment" type="number">
		<select name="debtor" id="debtor">
			<?php
			foreach ($users as $user => $nameAndSurname) {
				echo "<option name=\"amount\">{$nameAndSurname["name"]} {$nameAndSurname["surname"]}</option>";
			}
			?>
		</select>
		<button type="submit">Posa el que deus</button>

	</form>
</body>