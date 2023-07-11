<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $acao = $_GET['acao'];

    if ($acao == 'inserir'){
        $nome       = $_POST['nome'];
        $cpf        = $_POST['cpf'];
        $logradouro = $_POST['logradouro'];
        $numero     = $_POST['numero'];
        $cep        = $_POST['cep'];
        $cidade     = $_POST['cidade'];

        $sqlEnde = "INSERT INTO enderecos (logradouro, numero, cep, ".
        "cidade) VALUES ('$logradouro', $numero, '$cep', '$cidade')";
        $resEnde = mysqli_query($conexao, $sqlEnde);
        $enderecoId = mysqli_insert_id($conexao);        
        
        $sql = "INSERT INTO clientes (nome, cpf, endereco_id)" .
        " VALUES ('$nome', '$cpf', $enderecoId)";
        $res = mysqli_query($conexao, $sql);
        header("Location: clientes.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        $sql = "SELECT * FROM clientes WHERE id = $id";
        $res = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($res);
        $idEndereco = $linha['endereco_id'];

        $sqlDelCli = "DELETE FROM clientes WHERE id = $id LIMIT 1";
        $resCli = mysqli_query($conexao, $sqlDelCli);

        $sqlDelEnd = "DELETE FROM enderecos WHERE id = $idEndereco LIMIT 1";
        $resEnd = mysqli_query($conexao, $sqlDelEnd);
        header("Location: clientes.php");
    }

/*
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
*/
?>