<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

$stmt = $conn->prepare("DELETE FROM clientes WHERE usuario = ?");
$stmt->bind_param("s", $usuario);

if ($stmt->execute()) {
    session_destroy();
    header("Location: login.php");
} else {
    echo "Erro ao excluir conta";
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
?>