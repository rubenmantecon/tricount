<?php 
    declare(strict_types=1);
    include '../function/p.php';
    $dbconection = connectToDatabase();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

    <?php require("header.php");?>
    <div class="minheight">
        <div id="warningSpace" class="d-flex justify-content-center buttons text-center">

        </div>
        <div class="d-flex justify-content-center buttons">
            <button type="button" class="btn btn-primary btn-lg sortCreate" disabled="true">Por fecha de creacion</a>
            <button type="button" class="btn btn-primary btn-lg sortUpdate">Por fecha de actualizacion</a>
        </div>
        <div class="d-flex justify-content-center">
        <table id="createdTable">
           <?php
                $creacionQuery = $dbconection->prepare('SELECT name,depart,arrival,depart_date,arrival_date FROM tricount.travels order by depart_date;');
                $creacionQuery->execute();
                $creacionQuery=$creacionQuery->fetchAll();
                echo "<tr>";
                echo "  <th> Nombre  </th>";
                echo "  <th> Ciudad </th>";
                echo "  <th> Fecha de salida </th>";
                echo "  <th> Ultima actualizacion </th>";
                echo "</tr>";
                foreach ($creacionQuery as $viaje){
                    echo "<tr>";
                    echo "  <td> ". $viaje['name'] ."  </td>";
                    echo "  <td> ". $viaje['depart'] ."  </td>";
                    echo "  <td> ". $viaje['depart_date'] ."  </td>";
                    echo "  <td> ". $viaje['arrival_date'] ."  </td>";
                    echo "</tr>";
                }
           ?>
            
        </table>
        <table id=updateTable>
            <?php
                $actualizacionQuery = $dbconection->prepare('SELECT name,depart,arrival,depart_date,arrival_date FROM tricount.travels order by arrival_date;');
                $actualizacionQuery->execute();
                $actualizacionQuery=$actualizacionQuery->fetchAll();
                echo "<tr>";
                echo "  <th> Nombre  </th>";
                echo "  <th> Ciudad </th>";
                echo "  <th> Fecha de salida </th>";
                echo "  <th> Ultima actualizacion </th>";
                echo "</tr>";
                foreach ($actualizacionQuery as $viaje){
                    echo "<tr>";
                    echo "  <td> ". $viaje['name'] ."  </td>";
                    echo "  <td> ". $viaje['depart'] ."  </td>";
                    echo "  <td> ". $viaje['depart_date'] ."  </td>";
                    echo "  <td> ". $viaje['arrival_date'] ."  </td>";
                    echo "</tr>";
                }
           ?>
        </table>
        </div>
        <div class="d-flex justify-content-center">
            <a href="../src/invitations.html" type="button" class="btn btn-secondary btn-lg">Añadir viaje</a>
        </div>
    </div>
    <script src="../function/j.js"></script>
    <script src="../function/home.js"></script>
    <?php require("footer.html")?>
</body>

</html>