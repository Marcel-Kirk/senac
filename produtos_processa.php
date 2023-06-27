<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $acao = $_GET['acao'];

    if ($acao == 'inserir'){
        $nome           = $_POST['nome'];
        $preco          = formataBanco($_POST['preco']);
        $tipoproduto_id = $_POST['tipoproduto_id'];
        $descricao      = $_POST['descricao'];

        $sql = "INSERT INTO produtos (nome, preco, tipoproduto_id, " .
        "descricao) VALUES ('$nome', $preco, $tipoproduto_id, " .
        " '$descricao')";
        $res = mysqli_query($conexao, $sql);
        header("Location: produtos.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        $sql = "DELETE FROM produtos WHERE id = $id LIMIT 1";
        $res = mysqli_query($conexao, $sql);
        header("Location: produtos.php");
    }

    if ($acao == 'editar'){
        $id             = $_POST['id'];
        $nome           = $_POST['nome'];
        $preco          = $_POST['preco'];
        $tipoproduto    = $_POST['tipoproduto_id'];
        $descricao      = $_POST['descricao'];

        $sql = "UPDATE produtos SET nome = '$nome', ".
            "preco = $preco,".
            "tipoproduto_id = $tipoproduto, ".
            "descricao = '$descricao' ".
            " WHERE id = $id";
        $res = mysqli_query($conexao, $sql);

        header("Location: produtos.php");
    }
?>