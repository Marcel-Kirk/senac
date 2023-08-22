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
        <form action="vendas_processa.php?acao=inserir" method="post"
            class="usuarioAddForm">
            <h3 class="tituloForm">Adicionar Venda</h3>
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" required>
                <option value="">Selecione um Cliente</option>
                <?php
                    while($linhaCli = mysqli_fetch_array($resCli)){
                        echo "<option value='".$linhaCli['id']."'>".$linhaCli['nome']."</option>";
                    }
                ?>
            </select>
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario">
                <option value="<?php echo $_SESSION["usuario_id"];?>" selected>
                    <?php echo $_SESSION["logado"]; ?>
                </option>                
            </select>
            <hr>
            <div style="width: 80%; margin: auto;">
                <label for="produto">Produto:</label>
                <select name="produto" id="produto">
                    <option value="">Selecione um Produto</option>
                    <?php
                    while($linhaP = mysqli_fetch_array($resP)){
                        echo "<option value='".$linhaP['id']."'>".$linhaP['nome']."</option>";
                    }
                    ?>
                </select>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade">
                <button type="button" onclick="adiciona()">
                    Adicionar
                </button>

                <table border="1" style="width: 100%; margin-top: 15px;">
                    <tr>
                        <td>#</td>
                        <td>Nome</td>
                        <td>Quantidade</td>
                    </tr>
                    <tbody id="lista">
                        <?php
                            if (isset($_SESSION['itens'])) {
                                foreach ($_SESSION['itens'] as $valor) {
                                    echo "<tr>";
                                    echo "<td>" . $valor['id'] . "</td>";
                                    echo "<td>" . $valor['nome'] . "</td>";
                                    echo "<td>" . $valor['qtd'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div style="text-align: right;">
                    <button type="button" onclick="limparProdutos()">
                        Limpar Produtos
                    </button>
                </div>

            </div>
            <hr>
            <label for="observacao">Observação:</label>
            <textarea name="observacao" id="observacao" rows="5"></textarea>
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script>
        function adiciona() {
            let prod = document.querySelector('#produto');
            let tb = document.querySelector('#lista');
            let qtd = document.querySelector('#quantidade').value;
            let nome = document.querySelector('#produto').options[prod.selectedIndex].text;
            let tr = document.createElement("tr");
            tr.innerHTML = '<td>'+ prod.value + '</td><td>'
                + nome + '</td><td>' + qtd +'</td>';
            tb.appendChild(tr);
            
            axios.get('vendas_processa.php?acao=gravaSessao&id=' + prod.value +
                '&nome=' + nome + '&qtd=' + qtd)
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