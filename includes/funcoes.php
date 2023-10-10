<?php

/*  Recebe a data em formato de banco (2023-05-16 11:00:00)
    e retorna a data formatada para o padrao brasileiro
    (16/05/2023 11:00:00)
*/
function reData($data){
    $arr = explode(' ', $data);
    $dt = $arr[0];
    $h  = $arr[1];
    $arrDt = explode('-', $dt);
    $dataHora = $arrDt[2]."/".$arrDt[1]."/".$arrDt[0]." ".$h;
    return $dataHora;
}

/* Recebe valor / preco no formato americano
e retorna o mesmo, no formato brasileiro.
Ex: Recebe 1.99 retorna 1,99
*/
function formataValor($valor){
    return number_format($valor, 2, ',', '');
}

/* Funcao que recebe o valor no formato Brasileiro
e retorna o mesmo, no formato do Banco de Dados
*/
function formataBanco($valor){
    $valorSemVirgula = str_replace(',', '', $valor);
    if ($valor == $valorSemVirgula){
        return $valor;
    }
    $valorSemPonto = str_replace('.', '', $valor);
    $valorSemPonto = str_replace(',', '.', $valorSemPonto);
    return $valorSemPonto;
}

function permissaoUsuario($conexao, $permissoes) {//[1, 2, 5]
    $userId = $_SESSION["usuario_id"];
    $sql = "SELECT funcao_id FROM usuarios WHERE id = $userId";
    $rs = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($rs);
    if (!in_array($linha['funcao_id'], $permissoes)) {
        header("Location: home.php?erro=permissao");
        exit;
    }
}