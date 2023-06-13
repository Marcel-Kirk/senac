<?php
    session_start();
    require_once('banco.php');
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(id) AS quantidade FROM usuarios WHERE login = '$login' AND senha = MD5('$senha')";
    $res = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_array($res);

    if ($resultado['quantidade'] != 1){
        //Erro
        //echo "Login/Senha Invalidos";
        header('Location: index.php?erro=1');
    } else {
        //Logado
        //echo "Logado com Sucesso";
        $_SESSION["logado"] = $login;
        header('Location: home.php');
    }


