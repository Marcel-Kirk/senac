<?php
    include 'includes/valida.php';
    require_once('banco.php');

    $acao = $_GET['acao'];

    if ($acao == 'inserir'){
        $nome   = $_POST['nome'];
        $login  = $_POST['login'];
        $senha  = $_POST['senha'];

        $sql = "INSERT INTO usuarios (nome, login, senha) " . 
            "VALUES ('$nome', '$login', MD5('$senha') )";
        $res = mysqli_query($conexao, $sql);
        header("Location: usuarios.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        $sql = "DELETE FROM usuarios WHERE id = $id LIMIT 1";
        $res = mysqli_query($conexao, $sql);
        header("Location: usuarios.php");
    }

    if ($acao == 'editar'){
        /*  Caso receba uma senha, deve alterar a senha.
            Se não receber uma nova senha, funciona como está */
        $id     = $_POST['id'];
        $nome   = $_POST['nome'];
        $login  = $_POST['login'];
        $senha  = trim($_POST['senha']);

        $sql = "UPDATE usuarios SET nome = '$nome', login ='$login' ".
            " WHERE id = $id";
        $res = mysqli_query($conexao, $sql);
        //Se receber senha, altera
        if ($senha != ''){
            $sql2 = "UPDATE usuarios SET senha = MD5('$senha') " .
                " WHERE id = $id";
            $res2 = mysqli_query($conexao, $sql2);
        }

        header("Location: usuarios.php");
    }

    if ($acao == 'alterar'){
        $id     = $_SESSION["usuario_id"];
        $nome   = $_POST['nome'];
        $senha  = trim($_POST['senha']);

        $sql = "UPDATE usuarios SET nome = '$nome' ".
            " WHERE id = $id";
        $res = mysqli_query($conexao, $sql);
        //Se receber senha, altera
        if ($senha != ''){
            $sql2 = "UPDATE usuarios SET senha = MD5('$senha') " .
                " WHERE id = $id";
            $res2 = mysqli_query($conexao, $sql2);
        }

        header("Location: usuario_editar.php?msg=ok");
    }
?>