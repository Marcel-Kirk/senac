<?php
    include 'includes/valida.php';
    require_once('banco.php');

    $sql    = "SELECT * FROM funcoes";
    $rs     = mysqli_query($conexao, $sql);
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
        <div class="col-12 offset-md-2 col-md-8">
        <form action="usuarios_processa.php?acao=inserir" method="post"
            class="card p-2 m-3" onsubmit="return validaSenha()">
            <h3 class="tituloForm">Adicionar Usuário</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" class="form-control" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
            <label for="senha2">Confirmar Senha:</label>
            <input type="password" name="senha2" id="senha2" class="form-control" required>
            <label for="funcao">Função</label>
            <select name="funcao" id="funcao" class="form-control" required>
                <option value="">Selecione...</option>
                <?php
                    while ($linha = mysqli_fetch_array($rs)) {
                        $idF = $linha["id"];
                        $nF  = $linha["nome"];
                        echo "<option value='$idF'>$nF</option>";
                    }
                ?>
            </select>
            <div class="direita mt-10">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>