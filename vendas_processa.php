<?php
    include 'includes/valida.php';
    require_once('banco.php');

    $acao = $_GET['acao'];

    if ($acao == 'gravaSessao') {
        $id   = $_GET['id'];
        $nome = $_GET['nome'];
        $qtd  = $_GET['qtd'];
        
        $arr = array('id' => $id,
                'nome' => $nome,
                'qtd' => $qtd);

        $_SESSION["itens"][] = $arr;
        return true;
    }

    if ($acao == 'limpar') {
        unset($_SESSION["itens"]);
        return true;
    }

    /*
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
    */
?>