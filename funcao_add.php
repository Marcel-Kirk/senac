<?php
    include 'includes/valida.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Usuário - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="col-12 offset-md-2 col-md-8">
        <form action="funcao_processa.php?acao=inserir" method="post"
            class="card p-2 m-3">
            <h3 class="tituloForm">Adicionar Função (Usuário)</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome"
                class="form-control" required>
            <div class="direita mt-10">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>