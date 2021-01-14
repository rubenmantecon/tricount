<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="../style/reglog.css">
	<link rel="stylesheet" href="../style/main.css">
	<meta name="robots" content="noindex">
	<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
	<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
	<link rel="canonical" href="https://codepen.io/andytran/pen/GJOBZj?limit=all&page=8&q=login" />
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

</head>

<?php
//Sanitizacion de los campos del loguin
session_start();
$errorLog = array();
include '../function/p.php';
$sanitizedData = [];
$dbconection = connectToDatabase();
if (isset($_POST['logearse'])) {
	// Requerimos el email también:
	if (empty($_POST["password"])) {
		//Codigo sergio
		array_push($errorLog, "Tienes que insertar una contraseñaa");
	} else {
		$sanitizedData['password'] = $_POST['password'];
	}
	if (empty($_POST["emailog"])) {
		array_push($errorLog, "Tienes que insertar un correo");
	} else {
		// Queremos que el email tenga un formato adecuado
		if (filter_var($_POST['emailog'], FILTER_VALIDATE_EMAIL)) {
			$sanitizedData['email'] = $_POST['emailog'];
			$emailsquery = executeSelect2("USERS", "email");
			foreach ($emailsquery as $debug) {
				foreach ($debug as $debug2) {
					if ($debug2 == $sanitizedData['email']) {
						$passwordQuery = $dbconection->prepare('SELECT password, username  FROM tricount.USERS where email ="' . $sanitizedData['email'] . '"');
						$passwordQuery->execute();
						$passwordQuery = $passwordQuery->fetchAll();
						if ($passwordQuery[0]["password"] == $sanitizedData["password"]) {
							$errorLog = false;
							$_SESSION['username'] = $passwordQuery[0]["username"];
							header("Location: home.php");
							break;
						} else {
							//Codigo sergio
							array_push($errorLog, "Contraseña incorrecta");
							break;
						}
					}
				};
			}
		} else {
			//Codigo sergio
			array_push($errorLog, "Correo no valido");
		}
	}
}
?>
<?php
//Sanitiizacion del register
$sanitizedDataReg = [];
$errorReg = array();
if (isset($_POST['registrarse'])) {
	// Requerimos el email también:
	if (empty($_POST["passwordreg"])) {
		//Codigo sergio
		array_push($errorReg, "Tienes que insertar una contraseñaa");
	} else {
		if (empty($_POST["passwordreg2"])) {
			array_push($errorReg, "Las contraseñas no coinciden");
		} else {
			if ($_POST["passwordreg"] = $_POST["passwordreg2"]) {
				$sanitizedDataReg['passwordreg'] = $_POST['passwordreg'];
			}
		}
	}

	if (empty($_POST['name'])) {
		array_push($errorReg, "Tienes que insertar un nombre");
	} else {
		$sanitizedDataReg['name'] = $_POST['name'];
	}
	if (empty($_POST['surname'])) {
		array_push($errorReg, "Tienes que insertar un apellido");
	} else {
		$sanitizedDataReg['surname'] = $_POST['surname'];
	}
	if (empty($_POST['username'])) {
		array_push($errorReg, "Tienes que insertar un nombre de usuario");
	} else {
		$sanitizedDataReg['username'] = $_POST['username'];
	}
	if (empty($_POST["emailreg"])) {
		array_push($errorReg, "Tienes que insertar un correo");
	} else {
		// Queremos que el email tenga un formato adecuado
		if (filter_var($_POST['emailreg'], FILTER_VALIDATE_EMAIL)) {
			$sanitizedDataReg['emailreg'] = $_POST['emaire'];
			$emailsqueryreg = executeSelect2("USERS", "email");
			foreach ($emailsqueryreg as $debug) {
				foreach ($debug as $debug2) {
					if ($debug2 == $sanitizedData['emailreg']) {
						array_push($errorReg, "Ese correo ya existe");
					} else {
						$userInsert = $dbconection->prepare('INSERT INTO 
						users(name,surname,email,username,password)
					VALUES
						("' . $sanitizedDataReg['name'] . '","' . $sanitizedDataReg['surname'] . '","' . $sanitizedDataReg['emailreg'] . '","' . $sanitizedDataReg['username'] . '","' . $sanitizedDataReg['passwordreg'] . '");');
						$userInsert->execute();
						$userInsert = $userInsert->fetchAll();
					}
				};
			}
		} else {
			//Codigo sergio
			array_push($errorLog, "Correo no valido");
		}
	}
}
?>

<body>
	<?php require("header.php"); ?>
	<div id="warningSpace"></div>
	<div class="container">
		<div class="info">
			<h1>Bienvenidos a tricount </h1>
		</div>
	</div>
	<div class="form">
		<div class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Tux_Mono.svg" /></div>
		<form class="register-form">
			<input type="text" placeholder="name" name="name" />
			<input type="text" placeholder="surname" name="surname" />
			<input type="text" placeholder="username" name="username" />
			<input type="password" placeholder="password" name="passwordreg" id="passwordreg" />
			<input type="password" placeholder="password" name="passwordreg2" id="passwordreg2" />
			<input type="text" placeholder="email address" name="emailreg" id="emailreg" />
			<button type="submit" nanme="registrarse">create</button>
			<p class="message">Ya estas registrado? <a href="#">Sign In</a></p>
		</form>
		<form class="login-form" action="login.php" method="post">
			<input type="text" placeholder="email" name="emailog" id="emailog" />
			<input type="password" placeholder="password" name="password" id="password" />
			<input type="submit" name="logearse"></button>
			<?php
			echo "<div class='errorColor'>";
			foreach ($errorLog as $x) {
				echo "<p>" . $x . "</p>";
			}
			echo "</div>";
			?>
			<p class="message">Not registered? <a href="#">Create an account</a></p>
		</form>
	</div>

	<script src="../function/reglog.js"></script>
	<script src="../function/j.js"></script>
	<?php require("footer.html") ?>
</body>

</html>