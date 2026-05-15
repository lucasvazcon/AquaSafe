<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

$stmt = $conn->prepare("SELECT * FROM clientes WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>

    <link rel="stylesheet" href="editar_perfil.css">

</head>

<body>

    <div class="caixa">

        <h2>Editar Perfil</h2>
        <?php
        if (isset($_GET['erro'])) {

            if ($_GET['erro'] == 'senha') {
                echo "<div class='mensagem erro'>Senha atual incorreta!</div>";
            }

            if ($_GET['erro'] == 'confirmacao') {
                echo "<div class='mensagem erro'>As novas senhas não coincidem!</div>";
            }

            if ($_GET['erro'] == 'vazia') {
                echo "<div class='mensagem erro'>Preencha todos os campos da senha!</div>";
            }
        }

        if (isset($_GET['sucesso'])) {
            echo "<div class='mensagem sucesso'>Perfil atualizado com sucesso!</div>";
        }
        ?>

        <form action="atualizar_perfil.php" method="POST">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= $dados['nome'] ?>">

            <label>Email</label>
            <input type="email" name="email" value="<?= $dados['email'] ?>">

            <label>Telefone</label>
            <input type="text" name="telefone" value="<?= $dados['telefone'] ?>">

            <label>CPF</label>
            <input type="text" name="cpf" value="<?= $dados['cpf'] ?>">

            <label>Gênero</label>
            <div class="radio-group">
                <input type="radio" name="genero" value="feminino" <?= ($dados['genero'] == 'feminino') ? 'checked' : '' ?>> Feminino
                <input type="radio" name="genero" value="masculino" <?= ($dados['genero'] == 'masculino') ? 'checked' : '' ?>> Masculino
                <input type="radio" name="genero" value="outro" <?= ($dados['genero'] == 'outro') ? 'checked' : '' ?>> Outro
            </div>

            <label>Data de nascimento</label>
            <input type="date" name="data_nascimento" value="<?= $dados['data_nascimento'] ?>">

            <label>Cidade</label>
            <input type="text" name="cidade" value="<?= $dados['cidade'] ?>">

            <label>Estado</label>
            <input type="text" name="estado" value="<?= $dados['estado'] ?>">

            <label>Endereço</label>
            <input type="text" name="endereco" value="<?= $dados['endereco'] ?>">

            <h3>Alterar Senha</h3>

            <input type="password" name="senha_atual" placeholder="Senha atual">
            <input type="password" name="nova_senha" placeholder="Nova senha">
            <input type="password" name="confirmar_senha" placeholder="Confirmar nova senha">

            <button type="submit">Salvar Alterações</button>

        </form>

        <!-- EXCLUIR CONTA -->
        <form action="excluir_conta.php" method="POST"
            onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');">

            <button type="submit" class="btn-delete">
                Excluir Conta
            </button>

        </form>

    </div>

</body>

</html>