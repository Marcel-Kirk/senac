<?php
    include 'includes/valida.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="clientes_processa.php?acao=inserir" method="post"
            class="usuarioAddForm">
            <h3 class="tituloForm">Adicionar Cliente</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro">

            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero">

            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep">

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade">
            
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>