<?php 
declare(strict_types=1);
session_start();
include('../function/p.php');?>

<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript" src="../function/j.js"></script>
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