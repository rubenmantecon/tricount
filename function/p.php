<?php
declare(strict_types=1);

function connectToDatabase(string $user = 'root', string $pass = '', string $host = 'localhost', string $dbname = 'tricount')
{
	$username = $user;
	$password = $pass;
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';';

	try {
		$pdo = new PDO($dsn, $username, $password);
		return $pdo;
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		return false;
	}
}

function intoColumnsForQuery(array $columns):string {
	$result = '';
	foreach ($columns as $c => $value) {
		$result .= $c;
		$result .= ', ';
	}
	$result = rtrim($result, ", ");
	return $result;
}

function executeSelect(string $table, array $columns): array {
	$pdo = connectToDatabase();
	$cols = intoColumnsForQuery($columns);
	$query = $pdo->prepare('SELECT ' . $cols . 'FROM ' . $table . ';');
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

function executeInsert(string $table, array $columnsAndValues): array{
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

	$result = $query->fetchAll();
	return $result;
}