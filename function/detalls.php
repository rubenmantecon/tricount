<?php
include "p.php";
$id = $_GET['id'];
$sanitizedData = [];
$dbconection = connectToDatabase();
$detalles = $dbconection->prepare('SELECT name, depart, depart_date, arrival_date FROM tricount.travels where id="' . $id . '"');
$detalles->execute();
$detalles = $detalles->fetchAll();
print_r($detalles);
$sanitizedData['name'] = $detalles[0]['name'];
$sanitizedData['depart'] = [$detalles[0]['depart']];
$sanitizedData['depart_date'] = [$detalles[0]['depart_date']];
$sanitizedData['arrival_date'] = [$detalles[0]['arrival_date']];
$sanitizedData['depart'] = $sanitizedData['depart'][0];
$sanitizedData['depart_date'] = $sanitizedData['depart_date'][0];
$sanitizedData['arrival_date'] = $sanitizedData['arrival_date'][0];
echo json_encode($sanitizedData);
