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
	foreach ($columns as $col) {
		$result .= $col;
		$result .= ', ';
	}
	$result = rtrim($result, ", ");
	return $result;
}

// function prepareStatement(string $table, array $columns, array $boundParameters) {
// 	$pdo = connectToDatabase();
// 	$cols = intoColumnsForQuery($columns);

// 	$pdo->prepare('SELECT ' . $cols . 'FROM ' . $table . ' WHERE calories < :calories AND colour = :colour');
// }