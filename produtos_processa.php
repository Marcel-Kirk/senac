<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    permissaoUsuario($conexao, [1, 2, 5]);

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
        $id = mysqli_insert_id($conexao);

        if (isset($_FILES["imagem"]) && $_FILES["imagem"] != null) {
            $tmpNome = $_FILES['imagem']['tmp_name'];
            $arr = explode('.', $_FILES['imagem']['name']);
            $ext = $arr[count($arr)-1];
            $novoNome = $id . '.' . $ext;
            move_uploaded_file($tmpNome, 'imagens/'. $novoNome);
            $sql2 = "UPDATE produtos SET imagem = '$novoNome' WHERE id = $id";
            $res2 = mysqli_query($conexao, $sql2);
        }
        header("Location: produtos.php");
    }

    if ($acao == 'excluir'){
        $id = $_GET['id'];
        
        $sql2 = "SELECT imagem FROM produtos WHERE id = $id";
        $res2 = mysqli_query($conexao, $sql2);
        $linha = mysqli_fetch_array($res2);
        if (isset($linha["imagem"]) && $linha["imagem"] != null){
            unlink('imagens/' . $linha['imagem']);
        }
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