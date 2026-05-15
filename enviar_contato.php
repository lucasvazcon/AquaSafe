<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$stmt = $conn->prepare("INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $mensagem);

// EXECUTA PRIMEIRO
if ($stmt->execute()) {

    // mensagem de sucesso (opcional)
    $_SESSION['msg'] = "Mensagem enviada com sucesso!";

    // REDIRECIONA PARA HOME
    header("Location: index.php");
    exit;
} else {

    $_SESSION['msg'] = "Erro ao enviar mensagem!";
    header("Location: contato.php");
    exit;
}