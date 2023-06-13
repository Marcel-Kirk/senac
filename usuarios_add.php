<?php
    include 'includes/valida.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="usuarios_processa.php?acao=inserir" method="post"
            class="usuarioAddForm" onsubmit="return validaSenha()">
            <h3 class="tituloForm">Adicionar Usuário</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <label for="senha2">Confirmar Senha:</label>
            <input type="password" name="senha2" id="senha2" required>
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>