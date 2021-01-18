<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript"src="../function/j.js"></script>
	<title>Invitaciones</title>
</head>
<?php session_start();
include('../function/p.php');
$correctlyFormattedEmails = [];
if (isset($_POST['invite'])) {
	foreach ($_POST['email'] as $email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$correctlyFormattedEmails[] = $email;
		} else {
			echo '<script>newEmailField();</script>';
			echo "\n" . $email . " is not a valid email";
		}
	}
	print_r($correctlyFormattedEmails);
	$classifiedEmails = classifyEmails($correctlyFormattedEmails);
	processEmailInvitations($classifiedEmails['inDB']);
	processEmailInvitations($classifiedEmails['notInDB']);

}
?>
<body>
	<center>
		<form method="post" id="emailForm">
			<input type="text" name="email[]" placeholder="email">
			<input type="submit" name="invite" value="Enviar">
		</form>
		<div>
			<button onclick="newEmailField()">+</button>
		</div>
	</center>
</body>
</html>