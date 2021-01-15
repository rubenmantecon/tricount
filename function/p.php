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

function intoColumnsForQuery(array $columns):string {
	$result = '';
	foreach ($columns as $c) {
		$result .= $c;
		$result .= ', ';
	}
	$result = rtrim($result, ", ");
	return $result;
}

function executeSelect(string $table, string $columns): array {
	$pdo = connectToDatabase();
	$query = $pdo->prepare('SELECT ' . $columns . ' FROM ' . $table . ';');
	$query->execute();
	$e= $query->errorInfo();
  if ($e[0]!='00000') {
		$errormsg = '';
		$errormsg .= "\nPDO::errorInfo():\n" . "Error accedint a dades: " . $e[2];
		return $errormsg;
  }
	$result = $query->fetchAll();
	return $result;
}

function executeInsert(string $table, array $columnsAndValues): bool{
	$pdo = connectToDatabase();
	$cols = array_keys($columnsAndValues);
	$columns = intoColumnsForQuery($cols);
	$vals = array_keys(array_flip($columnsAndValues));
	$values = intoColumnsForQuery($vals);

	$query = $pdo->prepare('INSERT INTO ' . $table . ' (' . $columns .' VALUES(' . $values . 'FROM ' . $table . ';');
	$query->execute();
	$e= $query->errorInfo();
  if ($e[0]!='00000') {
		$errormsg = '';
		$errormsg .= "\nPDO::errorInfo():\n" . "Error accedint a dades: " . $e[2];
		return $errormsg;
	}	
	//$result = $query->fetchAll();
	return true;
}

function processEmailInvitations(array $invitationEmails) {
	$dbEmails = executeSelect("USERS", "email");
	foreach ($invitationEmails as $email) {
		if (in_array($email, $dbEmails)) {
			mail($email, 'Notificació: Has sigut convidat/da a un viatge', 'Estimat/da usuari/ària de Tricount:\\n Vés a gastar d\'una vegada, òstia!');
		} else if (!(in_array($email, $dbEmails))) {
			mail($email, 'Notificació: Has sigut convidat/da a registrar-te per a un viatge', 'Estimat/da convidat/da:\n Encara no ets usuari/ària de Tricount. Uneix-te a nosaaaaltrresssss... Cereeeebroooos');
		}
	}
}