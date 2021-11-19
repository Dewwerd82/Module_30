<?php
if (isset($_POST['reset'])){
    $arrFoto[] = [];
    
    array_map('unlink', glob("uploads/*"));

    $mysqli = new mysqli("localhost", "root", "", "db");// Подключается к базе данных
$mysqli->query("TRUNCATE TABLE comments");
//mysqli_query($con,'TRUNCATE TABLE mytable');
    $idNum = 0;
    header("Location: / ");
}



?>