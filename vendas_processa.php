<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    permissaoUsuario($conexao, [1, 2, 5]);

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
    
    if ($acao == 'inserir'){
        $cliente    = $_POST['cliente'];
        $usuario    = $_POST['usuario'];
        $observacao = $_POST['observacao'];

        $sql = "INSERT INTO vendas (cliente_id, usuario_id, observacao)".
            " VALUES ($cliente, $usuario, '$observacao')";
        $res = mysqli_query($conexao, $sql);
        $id = mysqli_insert_id($conexao);

        $total = 0;
        foreach ($_SESSION['itens'] as $item){
            $prodId = $item['id'];
            $qtd = $item['qtd'];
            $valor = getPrecoProduto($prodId, $conexao);
            $total += $valor * $qtd;
            $sqlItem = "INSERT INTO itens_venda ".
                "(venda_id, produto_id, quantidade, valor_item)".
                " VALUES ($id, $prodId, $qtd, $valor)";
            $res2 = mysqli_query($conexao, $sqlItem);
        }
        $sqlTotal = "UPDATE vendas SET valor = $total ".
            "WHERE id = $id";
        $resTotal = mysqli_query($conexao, $sqlTotal);
        unset($_SESSION['itens']);
        header("Location: vendas.php");
    }
    
    if ($acao == 'cancelar'){
        $id = $_GET['id'];
        $sql = "UPDATE vendas SET status = 'C' WHERE id = $id";
        $res = mysqli_query($conexao, $sql);
        header("Location: vendas.php");
    }

    function getPrecoProduto($id, $conexao) {
        $sql = "SELECT preco FROM produtos WHERE id = $id";
        $res = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_array($res);
        return $linha['preco'];
    }

?>