<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $id = $_GET['id'];

    $sql    = "SELECT * FROM funcoes WHERE id = $id";
    $rs     = mysqli_query($conexao, $sql);
    $dados  = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Usuário - Editar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="col-12 offset-md-2 col-md-8">
        <form action="funcao_processa.php?acao=editar" method="post"
            class="card p-2 m-3">
            <h3 class="tituloForm">Editar Funções (Usuário)</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-required"
                value="<?php echo $dados["nome"]; ?>" required>
            <div class="direita mt-10">
                <input type="hidden" name="id" id="id"
                    value="<?php echo $dados['id']; ?>">
                <button type="submit" class="btn btn-warning">Editar</button>
            </div>
        </form>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>