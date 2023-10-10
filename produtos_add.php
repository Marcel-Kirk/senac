<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $sql = "SELECT * FROM tipos_produto";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="produtos_processa.php?acao=inserir" method="post"
            class="usuarioAddForm" enctype="multipart/form-data">
            <h3 class="tituloForm">Adicionar Produto</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" required>
            
            <label for="tipoproduto_id">Tipo Produto</label>
            <select name="tipoproduto_id" id="tipoproduto_id" required>
                <option value="">Selecione o Tipo</option>
            <?php
                while($linha = mysqli_fetch_array($res)){
                    $id     = $linha['id'];
                    $nome   = $linha['nome'];
                    echo "<option value='$id'>$nome</option>";
                }
            ?>
            </select>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="5"></textarea>
            
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">

            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>