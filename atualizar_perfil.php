<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// DADOS
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'] ?? "não informado";
$data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

// SENHAS
$senha_atual = $_POST['senha_atual'];
$nova_senha = $_POST['nova_senha'];
$confirmar_senha = $_POST['confirmar_senha'];

// BUSCAR SENHA ATUAL
$stmt = $conn->prepare("SELECT senha FROM clientes WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$senha_banco = $row['senha'];

// USUÁRIO QUER ALTERAR SENHA?
if (!empty($senha_atual) || !empty($nova_senha) || !empty($confirmar_senha)) {

    // CAMPOS INCOMPLETOS
    if (
        empty($senha_atual) ||
        empty($nova_senha) ||
        empty($confirmar_senha)
    ) {

        header("Location: editar_perfil.php?erro=vazia");
        exit();
    }

    // SENHA ATUAL ERRADA
    if (!password_verify($senha_atual, $senha_banco)) {

        header("Location: editar_perfil.php?erro=senha");
        exit();
    }

    // NOVAS SENHAS DIFERENTES
    if ($nova_senha !== $confirmar_senha) {

        header("Location: editar_perfil.php?erro=confirmacao");
        exit();
    }

    // CRIPTOGRAFAR NOVA SENHA
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    // UPDATE COM SENHA
    $stmt = $conn->prepare("
        UPDATE clientes SET 
            nome=?,
            email=?,
            telefone=?,
            cpf=?,
            genero=?,
            data_nascimento=?,
            cidade=?,
            estado=?,
            endereco=?,
            senha=?
        WHERE usuario=?
    ");

    $stmt->bind_param(
        "sssssssssss",
        $nome,
        $email,
        $telefone,
        $cpf,
        $genero,
        $data_nascimento,
        $cidade,
        $estado,
        $endereco,
        $nova_senha_hash,
        $usuario
    );

} else {

    // UPDATE SEM SENHA
    $stmt = $conn->prepare("
        UPDATE clientes SET 
            nome=?,
            email=?,
            telefone=?,
            cpf=?,
            genero=?,
            data_nascimento=?,
            cidade=?,
            estado=?,
            endereco=?
        WHERE usuario=?
    ");

    $stmt->bind_param(
        "ssssssssss",
        $nome,
        $email,
        $telefone,
        $cpf,
        $genero,
        $data_nascimento,
        $cidade,
        $estado,
        $endereco,
        $usuario
    );
}

// EXECUTAR UPDATE
if ($stmt->execute()) {

    header("Location: editar_perfil.php?sucesso=1");
    exit();

} else {

    header("Location: editar_perfil.php?erro=update");
    exit();
}
?>