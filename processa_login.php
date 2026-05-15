<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// BUSCAR USUÁRIO
$stmt = $conn->prepare("SELECT * FROM clientes WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();

// USUÁRIO EXISTE?
if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    // VERIFICAR SENHA
    if (password_verify($senha, $row['senha'])) {

        $_SESSION['usuario'] = $usuario;

        // DEFINIR ADMIN
        if ($usuario === "admin") {
            $_SESSION['admin'] = true;
        }

        header("Location: index.php");
        exit();

    } else {

        // SENHA INCORRETA
        header("Location: login.php?erro=senha");
        exit();
    }

} else {

    // USUÁRIO NÃO ENCONTRADO
    header("Location: login.php?erro=usuario");
    exit();
}

$conn->close();
?>