<?php
    include 'includes/valida.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Produto - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="tipos_processa.php?acao=inserir" method="post"
            class="usuarioAddForm">
            <h3 class="tituloForm">Adicionar Tipo de Produto</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>