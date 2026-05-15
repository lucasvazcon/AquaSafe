<link rel="stylesheet" href="contato.css">
<div class="caixa">

    <h2>Fale Conosco</h2>

    <form action="enviar_contato.php" method="POST">

        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mensagem</label>
        <textarea name="mensagem" rows="5" required></textarea>

        <button type="submit">Enviar Mensagem</button>

    </form>

</div>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color: lightgreen; text-align:center;">
        Mensagem enviada com sucesso!
    </p>
<?php endif; ?>