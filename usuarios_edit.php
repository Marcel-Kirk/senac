<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $id = $_GET['id'];

    $sql    = "SELECT * FROM usuarios WHERE id = $id";
    $rs     = mysqli_query($conexao, $sql);
    $dados  = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Editar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="usuarios_processa.php?acao=editar" method="post"
            class="usuarioAddForm" onsubmit="return validaSenha()">
            <h3 class="tituloForm">Editar Usuário</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome"
                value="<?php echo $dados["nome"]; ?>" required>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login"
                value="<?php echo $dados["login"]; ?>" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <label for="senha2">Confirmar Senha:</label>
            <input type="password" name="senha2" id="senha2">
            <div class="direita mt-10">
                <input type="hidden" name="id" id="id"
                    value="<?php echo $dados['id']; ?>">
                <button type="submit">Editar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>