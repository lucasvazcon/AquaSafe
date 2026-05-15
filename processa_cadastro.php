<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

// verificar se as senhas são iguais
if($senha != $confirmar_senha){
    echo "As senhas não coincidem!";
    exit;
}

// criptografar senha
$senha = password_hash($senha, PASSWORD_DEFAULT);

// verificar se usuário já existe
$sql_verifica = "SELECT * FROM clientes WHERE usuario = '$usuario'";
$result = $conn->query($sql_verifica);

if($result->num_rows > 0){
    echo "Usuário já existe!";
    exit;
}

// inserir no banco
$sql = "INSERT INTO clientes (usuario, senha)
VALUES ('$usuario', '$senha')";

if($conn->query($sql) === TRUE){

    echo "Cadastro realizado com sucesso!";
    echo "<br><a href='login.php'>Ir para login</a>";

} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
