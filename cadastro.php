<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro - AquaSafe</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="login-container">
        <h1>AquaSafe</h1>
        <p>Crie sua conta</p>

        <form action="processa_cadastro.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Cadastrar</button>
        </form>

        <a href="login.php" class="voltar">Já tem conta? Login</a>
        <a href="index.php" class="voltar">⬅️ Voltar</a>
    </div>

    <select name="genero" required>
        <option value="">Selecione</option>
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
    </select>

</body>

</html>