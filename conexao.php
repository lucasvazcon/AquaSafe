<?php
$host = "db"; // MUITO IMPORTANTE
$user = "root";
$pass = "root";
$db = "formulario_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>