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
include "function/p.php"
$dbconection = connectToDatabase();
if (isset($_POST['logearse'])) {
    // Requerimos el email también:
    if (empty($_POST["emailog"])) {
        //Codigo sergio
    } else {
        // Queremos que el email tenga un formato adecuado
        if (filter_var($_POST['emailog'], FILTER_VALIDATE_EMAIL)) {
            $sanitizedData = array("email" => $_POST['emailog']);
        } else {
            //Codigo sergio
            echo "correo no valido";
        }
    }
    if (empty($_POST["password"])) {
        //Codigo sergio
        echo "contraseña no valdia";
    } else {
        $sanitizedData = array("password" => $_POST['password']);
    }
}
$x = false; /* Funcion ruben */
if ($x) {
    header("Location: home.php");
} else {
    //Codigo sergio
}
?>

<body>
    <div class="container">
        <div class="info">
            <h1>Bienvenidos a tricount </h1>
        </div>
    </div>
    <div class="form">
        <div class="thumbnail"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Tux_Mono.svg" /></div>
        <form class="register-form">
            <input type="text" placeholder="name" name="name" />
            <input type="password" placeholder="password" name="passwordreg" id="passwordreg" />
            <input type="text" placeholder="email address" name="emailreg" id="emailreg" />
            <button>create</button>
            <p class="message">Ya estas registrado? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="login.php" method="post">
            <input type="text" placeholder="email" name="emailog" id="emailog" />
            <input type="password" placeholder="password" name="password" id="password" />
            <input type="submit" name="logearse"></button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>

    <script src="../function/reglog.js"></script>
</body>

</html>