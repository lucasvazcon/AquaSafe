<?php
session_start();
include("conexao.php");

// VERIFICAR LOGIN
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// VERIFICAR ADMIN
if ($_SESSION['admin'] != 1) {
    echo "Acesso negado!";
    exit();
}

// BUSCAR DADOS
$sql = "SELECT nome, email, telefone, cpf FROM clientes";
$result = $conn->query($sql);

$totalUsuarios = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório - AquaSafe</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


</head>

<body>

    <div class="topo">

        <div class="titulo">
            <h1>Relatório de Usuários</h1>
            <p>Painel administrativo AquaSafe</p>
        </div>

        <a href="index.php" class="btn-voltar">
            Voltar
        </a>

    </div>
    <link rel="stylesheet" href="relatorio.css">
    <div class="cards">

        <div class="card">
            <h2>Total de Usuários</h2>
            <span><?= $totalUsuarios ?></span>
        </div>

    </div>

    <div class="tabela-container">

        <table>

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                </tr>
            </thead>

            <tbody>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>
                        <td><?= htmlspecialchars($row['nome']) ?></td>

                        <td class="email">
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td><?= htmlspecialchars($row['telefone']) ?></td>

                        <td><?= htmlspecialchars($row['cpf']) ?></td>
                    </tr>

                <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</body>

</html>