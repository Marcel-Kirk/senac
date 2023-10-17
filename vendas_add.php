<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $sqlCli = "SELECT * FROM clientes";
    $resCli = mysqli_query($conexao, $sqlCli);

    $sqlP = "SELECT * FROM produtos";
    $resP = mysqli_query($conexao, $sqlP);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas - Adicionar</title>
    <?php include 'includes/css.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="col-12 offset-md-2 col-md-8">
        <form action="vendas_processa.php?acao=inserir" method="post"
            class="card p-2 m-3">
            <h3 class="tituloForm">Adicionar Venda</h3>
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" class="form-control" required>
                <option value="">Selecione um Cliente</option>
                <?php
                    while($linhaCli = mysqli_fetch_array($resCli)){
                        echo "<option value='".$linhaCli['id']."'>".$linhaCli['nome']."</option>";
                    }
                ?>
            </select>
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario" class="form-control">
                <option value="<?php echo $_SESSION["usuario_id"];?>" selected>
                    <?php echo $_SESSION["logado"]; ?>
                </option>                
            </select>
            <hr>
            <div style="width: 80%; margin: auto;">
                <label for="produto">Produto:</label>
                <select name="produto" id="produto" class="form-control">
                    <option value="">Selecione um Produto</option>
                    <?php
                    while($linhaP = mysqli_fetch_array($resP)){
                        echo "<option value='".$linhaP['id']."' data-img='".$linhaP['imagem']."'>".$linhaP['nome']."</option>";
                    }
                    ?>
                </select>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control">
                <button type="button" onclick="adiciona()" class="btn btn-info mt-2">
                    Adicionar
                </button>

                <table class="table table-hover table-sm mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody id="lista">
                        <?php
                            if (isset($_SESSION['itens'])) {
                                foreach ($_SESSION['itens'] as $valor) {
                                    echo "<tr>";
                                    echo "<td>" . $valor['id'] . "</td>";
                                    if (isset($valor['img']) && $valor['img'] != 'imagens/'){
                                        echo "<td><img src='" . $valor['img'] . "' style='width:80px;'></td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                    echo "<td>" . $valor['nome'] . "</td>";
                                    echo "<td>" . $valor['qtd'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div style="text-align: right;">
                    <button type="button" onclick="limparProdutos()" class="btn btn-danger">
                        Limpar Produtos
                    </button>
                </div>

            </div>
            <hr>
            <label for="observacao">Observação:</label>
            <textarea name="observacao" id="observacao" rows="5" class="form-control"></textarea>
            <div class="direita mt-10">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script>
        function adiciona() {
            let prod = document.querySelector('#produto');
            let tb = document.querySelector('#lista');
            let qtd = document.querySelector('#quantidade').value;
            let nome = document.querySelector('#produto').options[prod.selectedIndex].text;
            let tr = document.createElement("tr");
            let dtImg = document.querySelector('#produto').options[prod.selectedIndex].getAttribute('data-img');
            let img = 'imagens/' + dtImg;
            let imgTag = '&nbsp;';
            if (dtImg != null && dtImg != '') {
                imgTag = '<img src="'+ img +'" style="width:80px;">';
            }
            tr.innerHTML = '<td>'+ prod.value + '</td>'
                + '<td>'+ imgTag + '</td>'
                + '<td>' + nome + '</td>'
                + '<td>' + qtd +'</td>';
            tb.appendChild(tr);
            
            axios.get('vendas_processa.php?acao=gravaSessao&id=' + prod.value +
                '&nome=' + nome + '&qtd=' + qtd + '&imagem=' + img)
            .then(function (response) {
                //console.log(response);
            })
            .catch(function (error) {
                console.error(error);
            });
        }

        function limparProdutos() {
            axios.get('vendas_processa.php?acao=limpar')
            .then(function (response) {
                let tb = document.querySelector('#lista');
                tb.innerHTML = '';
            })
            .catch(function (error) {
                console.error(error);
            });
        }
    </script>
</body>
</html>