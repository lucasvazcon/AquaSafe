<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login - AquaSafe</title>

    <!-- Fonte igual ao seu site -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-box">
        <!-- seu formulário -->
    </div>
    <div class="login-container">
        <h1>AquaSafe</h1>
        <p>Faça seu login</p>
        <?php
if (isset($_GET['erro'])) {

    if ($_GET['erro'] == 'senha') {
        echo "<div class='mensagem erro'>Senha incorreta!</div>";
    }

    if ($_GET['erro'] == 'usuario') {
        echo "<div class='mensagem erro'>Usuário não encontrado!</div>";
    }
}
?>

        <form action="processa_login.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">entrar</button>
        </form>
        <a href="formulario.php" class="voltar">Não tem conta? Cadastre-se</a>

    </div>

</body>

</html>
