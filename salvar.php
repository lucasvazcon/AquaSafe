<?php

include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // VERIFICAR SENHAS
    if ($senha != $confirmar_senha) {
        echo "As senhas não coincidem!";
        exit;
    }

    // CRIPTOGRAFAR SENHA
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    // DADOS
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];

    // INSERIR NO BANCO
    $sql = "INSERT INTO clientes 
    (nome, email, telefone, genero, data_nascimento, cidade, estado, endereco, cpf, usuario, senha)
    
    VALUES 
    
    ('$nome', '$email', '$telefone', '$genero', '$data_nascimento', '$cidade', '$estado', '$endereco', '$cpf', '$usuario', '$senha')";

    if ($conn->query($sql) === TRUE) {

        header("Location: login.php");
        exit;

    } else {

        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>