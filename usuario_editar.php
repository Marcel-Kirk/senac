<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $id = $_SESSION["usuario_id"];

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
    <title>Usuário - Editar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <?php
            if (isset($_GET['msg']) && $_GET['msg'] == 'ok') {
        ?>
            <div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
                Dados alterados com sucesso !!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function(){
                    const alert = bootstrap.Alert.getOrCreateInstance('#alerta');
                    if (document.querySelector("#alerta") != undefined){
                        alert.close();
                    }
                }, 2000);                
            </script>
        <?php } ?>
        <div class="col-12 offset-md-2 col-md-8">
        <form action="usuarios_processa.php?acao=alterar" method="post"
            class="card p-2 m-3" onsubmit="return validaSenha()">
            <h3 class="tituloForm">Editar Usuário</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control"
                value="<?php echo $dados["nome"]; ?>" required>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" class="form-control"
                value="<?php echo $dados["login"]; ?>" disabled>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <label for="senha2">Confirmar Senha:</label>
            <input type="password" name="senha2" id="senha2" class="form-control">
            <div class="direita mt-10">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>