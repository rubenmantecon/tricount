<?php

declare(strict_types=1);

function connectToDatabase(string $user = 'exercises', string $pass = 'exercises', string $host = 'localhost', string $dbname = 'tricount')
{
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';';

	try {
		$pdo = new PDO($dsn, $user, $pass);
		return $pdo;
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		return false;
	}
}

function intoColumnsForQuery(array $columns): string
{
	$result = '';
	foreach ($columns as $c) {
		$result .= $c;
		$result .= ', ';
	}
	$result = rtrim($result, ", ");
	return $result;
}

function executeSelect(string $table, string $columns): array
{
	$pdo = connectToDatabase();
	$query = $pdo->prepare('SELECT ' . $columns . ' FROM ' . $table . ';');
	$query->execute();
	$e = $query->errorInfo();
	if ($e[0] != '00000') {
		$errormsg = '';
		$errormsg .= "\nPDO::errorInfo():\n" . "Error accedint a dades: " . $e[2];
		return $errormsg;
	}
	$result = $query->fetchAll();

	return $result;
}

function executeInsert(string $table, array $columnsAndValues): bool
{
	$pdo = connectToDatabase();
	$cols = array_keys($columnsAndValues);
	$columns = intoColumnsForQuery($cols);
	$vals = array_keys(array_flip($columnsAndValues));
	$values = intoColumnsForQuery($vals);

	$query = $pdo->prepare('INSERT INTO ' . $table . ' (' . $columns . ' VALUES(' . $values . 'FROM ' . $table . ';');
	$query->execute();
	$e = $query->errorInfo();
	if ($e[0] != '00000') {
		$errormsg = '';
		$errormsg .= "\nPDO::errorInfo():\n" . "Error accedint a dades: " . $e[2];
		return $errormsg;
	}
	//$result = $query->fetchAll();
	return true;
}

function processEmailInvitations(array $invitationEmails)
{
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$dbEmails = executeSelect("USERS", "email");
	foreach ($invitationEmails as $email) {
		try {
			if (in_array($email, $dbEmails)) {
				mail($email, 'Notificació: Has sigut convidat/da a un viatge', 'Estimat/da usuari/ària de Tricount:\\n V, és a gastar d\'una vegada, òstia!');
				mail($email, 'Aquest via HTML', file_get_contents(__DIR__ . '/common/mail.html',implode("\r\n", $headers)));
			} else if (!(in_array($email, $dbEmails))) {
				mail($email, 'Notificació: Has sigut convidat/da a registrar-te per a un viatge', 'Estimat/da convidat/da:\n Encara no ets usuari/ària de Tricount. Uneix-te a nosaaaaltrresssss... Cereeeebroooos');
				mail($email, 'Aquest via HTML', file_get_contents(__DIR__ . '/common/mail.html',implode("\r\n", $headers)));
			}
		} catch (\Throwable $th) {
			die("Something went wrong: " . $th->getMessage());
		}
	}
}

function classifyEmails(array $invitationEmails): array
{
	$existingEmails = [];
	$nonExistingEmails = [];
	$dbEmails = executeSelect("USERS", "email");
	foreach ($invitationEmails as $email) {
		if (in_array($email, $dbEmails)) {
			$existingEmails[] = $email;
		} else if (!(in_array($email, $dbEmails))) {
			$nonExistingEmails[] = $email;
		}
	}

	return array('inDB' => $existingEmails, 'notInDB' => $nonExistingEmails);
}

function emailExist(string $email)
{
	$pdo = connectToDatabase();
	$query = 'SELECT count(*) from tricount.users where email ="' . $email . '"';
	$execute = $pdo->prepare($query);
	$execute->execute();
	$result = $execute->fetchAll();
	if ($result[0][0] == 0) {
		return (false);
	} else {
		return (true);
	};
}