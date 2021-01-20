<?php

declare(strict_types=1);
session_start();
include('../function/p.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="../style/invitations.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<title>Invitaciones</title>
</head>
<?php
$correctlyFormattedEmails = [];
$incorrectlyFormattedEmails = [];
if (isset($_POST['invite'])) {
	foreach ($_POST['email'] as $email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$correctlyFormattedEmails[] = $email;
		} else {
			$incorrectlyFormattedEmails[] = $email;
		}
	}
}

if (!empty($incorrectlyFormattedEmails)) {
	foreach ($incorrectlyFormattedEmails as $email => $value) {
		if (!empty($value)) {
			echo '<p>These emails are incorrect</p>';
			echo '<form method="post" id="emailForm">';
			echo "<input type=\"email\" value=\"{$value}\" name=\"email[]\">";
		}
	}
}
$classifiedEmails = classifyEmails($correctlyFormattedEmails);
processEmailInvitations($classifiedEmails['inDB']);
processEmailInvitations($classifiedEmails['notInDB']);

?>

<body>
	<?php require("header.php"); ?>
	<div class="minheight d-flex justify-content-center">
		<div class="text-center ">
			<form method="post" id="emailForm">
				<label> Emails : </label>
				<div id="emailsForm">
					<input type="text" name="email[]" placeholder="email">
				</div>
				<input type="submit" name="invite" id="invite " value="Enviar">
			</form>
			<div>
				<button id="add">+</button>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../function/j.js"></script>
	<?php require("footer.html"); ?>

</body>

</html>