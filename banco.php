<?php
    const HOST = "localhost";
    const BANCO = "sistema";
    const USER = "root";
    const PASS = "";

    try{
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conexao = mysqli_connect(HOST, USER, PASS, BANCO);
    } catch (Exception $e){
        echo 'Erro: ' . mysqli_connect_error();
    }