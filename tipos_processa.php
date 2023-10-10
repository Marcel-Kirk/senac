<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    permissaoUsuario($conexao, [2, 5]);

    $acao = $_GET['acao'];

    if ($acao == 'inserir'){
        $nome   = $_POST['nome'];

        $sql = "INSERT INTO tipos_produto (nome) " . 
            "VALUES ('$nome')";
        $res = mysqli_query($conexao, $sql);
        header("Location: tipos.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        $sql = "DELETE FROM tipos_produto WHERE id = $id LIMIT 1";
        $res = mysqli_query($conexao, $sql);
        header("Location: tipos.php");
    }

    if ($acao == 'editar'){
        $id     = $_POST['id'];
        $nome   = $_POST['nome'];

        $sql = "UPDATE tipos_produto SET nome = '$nome' ".
            " WHERE id = $id";
        $res = mysqli_query($conexao, $sql);

        header("Location: tipos.php");
    }
?>