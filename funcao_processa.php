<?php
    include 'includes/valida.php';
    require_once('banco.php');

    $acao = $_GET['acao'];

    if ($acao == 'inserir'){
        $nome   = $_POST['nome'];

        $sql = "INSERT INTO funcoes (nome) " . 
            "VALUES ('$nome')";
        $res = mysqli_query($conexao, $sql);
        header("Location: funcao.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        $sql = "DELETE FROM funcoes WHERE id = $id LIMIT 1";
        $res = mysqli_query($conexao, $sql);
        header("Location: funcao.php");
    }

    if ($acao == 'editar'){
        $id     = $_POST['id'];
        $nome   = $_POST['nome'];

        $sql = "UPDATE funcoes SET nome = '$nome' ".
            " WHERE id = $id";
        $res = mysqli_query($conexao, $sql);

        header("Location: funcao.php");
    }
?>