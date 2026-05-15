<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>AquaSafe</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<p style='color:lightgreen; text-align:center;'>" . $_SESSION['msg'] . "</p>";
        unset($_SESSION['msg']);
    }
    ?>

    <header> <!--  Bloco superior da pagina  -->
        <Nav>
            <a href="">Home</a>

            <?php if (isset($_SESSION['usuario'])): ?>
                <span style="margin-right:30px;">
                    Olá, <?php echo $_SESSION['usuario']; ?>
                </span>

                <a href="editar_perfil.php" class="btn-login">Editar Perfil</a>

                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="relatorio.php" class="btn-login">Relatório</a>
                <?php endif; ?>

            <?php else: ?>
                <a href="login.php" class="btn-login">Login</a>
            <?php endif; ?>

            <a href="contato.php">Fale Conosco</a>

            <a href="logout.php" class="btn-login">Logout</a>

        </Nav>
    </header>

    <main class="container"> <!--  / div principal-->
        <div class="list"> <!-- div: lista de itens -->
            <div class="list-item">
                <img src="./IMG/Employment-Law-Solicitor.jpg" alt="frente-empresa"> <!-- pega uma imagem da nossa pasta-->
                <div class="content"> <!-- conteúdo -->
                    <h2 class="title">AQUASAFE</h2>
                    <p class="description">Fundada em 2025 por 7 alunos da UNINOVE, a AquaSafe surgiu com a missão de
                        prevenir alagamentos urbanos por meio de sensores inteligentes em bueiros. A empresa aposta em
                        tecnologia e inovação para ajudar cidades a se tornarem mais seguras e resilientes.</p>
                    <div class="buttons"> <!--div é apenas uma caixa vazia-->
                        <button class="btn-saiba-mais" data-link="aquasafe.php">Saiba Mais</button>
                        <!--<button>Acessar</button> -->
                    </div>
                </div>
            </div>
            <div class="list-item">
                <img src="./IMG/NB-IOT-technologie-avantages-definition (1).avif" alt="projeto"> <!-- pega uma imagem da nossa pasta-->
                <div class="content"> <!-- conteúdo -->
                    <h2 class="title">PRODUTO</h2>
                    <p class="description">Durante fortes chuvas, cada segundo conta. Nosso sensor IoT identifica
                        rapidamente o aumento do nível da água e envia alertas imediatos às autoridades, ajudando a
                        prevenir alagamentos, proteger famílias e reduzir danos.</p>
                    <div class="buttons"> <!--div é apenas uma caixa vazia-->
                        <button class="btn-saiba-mais"
                            data-link="https://www.tinkercad.com/things/kspdgaL0FfJ-produtos-iot">Saiba
                            Mais</button>
                        <!--<button>Acessar</button> -->
                    </div>
                </div>
            </div>

            <div class="list-item">
                <img src="./IMG/PESSOAS (1).webp" alt="foto-galera"> <!-- pega uma imagem da nossa pasta-->
                <div class="content"> <!-- conteúdo -->
                    <h2 class="title">DESENVOLVEDORES</h2>
                    <p class="description">Somos os desenvolvedores de um sensor inteligente para bueiros, criado para
                        monitorar o nível da água em tempo real e prevenir alagamentos.
                        Mais do que tecnologia, entregamos soluções que protegem vidas e tornam as cidades mais
                        seguras e preparadas.</p>
                    <div class="buttons"> <!--div é apenas uma caixa vazia-->
                        <button class="btn-saiba-mais"
                            data-link="desenvolvedores.php">
                            Saiba Mais</button>
                        <!--<button>Acessar</button> -->
                    </div>
                </div>
            </div>

            <div class="list-item">
                <img src="./IMG/futuro-tecnologia-teceirizacao-de-ti.webp" alt="esgoto"> <!-- pega uma imagem da nossa pasta-->
                <div class="content"> <!-- conteúdo -->
                    <h2 class="title"> BEM-VINDO</h2>

                    <p class="description"> Somos uma empresa inovadora dedicada a tornar as cidades mais seguras e
                        inteligentes. Desenvolvemos soluções tecnológicas de monitoramento preventivo contra
                        alagamentos, utilizando sensores instalados em bueiros para medir o nível da água em tempo real,
                        protegendo vidas e reduzindo danos causados por enchentes. Juntos, construímos um futuro mais
                        resiliente para todos.
                    </p>
                    <div class="buttons"> <!--div é apenas uma caixa vazia-->
                        <!--  <button class="btn-saiba-mais" data-link="LINK_AQUI">Saiba Mais</button> -->
                        <!--<button>Acessar</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="thumb">

            <div class="thumb-item">
                <img src="./IMG/mmm.png" alt="frente-empresa">
                <div class="content">
                    <h3>AquaSafe</h3>

                </div>
            </div>

            <div class="thumb-item">
                <img src="./IMG/ChatGPT Image 30 de mai. de 2025, 00_30_10.png" alt="frente-empresa">
                <div class="content">
                    <h3>Produto IOT</h3>

                </div>
            </div>

            <div class="thumb-item">
                <img src="./IMG/Desenho 2.jpg" alt="frente-empresa">
                <div class="content">
                    <h3>Desenvolvedores</h3>


                </div>
            </div>

            <div class="thumb-item">
                <img src="./IMG/bem=vindo 4.0.jpg" alt="frente-empresa">
                <div class="content">
                    <h3>Bem-vindo</h3>

                </div>
            </div>
        </div>

        <div class="arrows">
            <button class="back">
                < </button>
                    <button class="next"> > </button>
        </div>
    </main>


    <script src="script.js"></script>
</body>

</html>