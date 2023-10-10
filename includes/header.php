<?php
    function montaMenuAcesso($funcoes, $link, $texto) {
        //if ($_SESSION["funcao_usuario"] == 2) {
        if (in_array($_SESSION["funcao_usuario"], $funcoes)) {
            echo "<li class='nav-item'>";
                echo "<a class='nav-link active' href='".$link."'>";
                    echo $texto;
                echo "</a>";
            echo "</li>";
        }
    }
?>
<header>
    <nav style="background-color: firebrick !important;" class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">SISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                        montaMenuAcesso([2, 5], 'usuarios.php',
                            'Usuários');

                        montaMenuAcesso([2, 5], 'tipos.php',
                            'Tipo de Produto');

                        montaMenuAcesso([1, 2, 5], 'produtos.php',
                            'Produtos');

                        montaMenuAcesso([1, 2, 5], 'clientes.php',
                            'Clientes');
                        
                        montaMenuAcesso([1, 2, 5], 'vendas.php',
                            'Vendas');

                        montaMenuAcesso([1], 'usuario_editar.php',
                            'Usuário');
                        
                        montaMenuAcesso([2], 'funcao.php',
                            'Funções');
                        
                        montaMenuAcesso([1, 2, 5], 'logoff.php',
                            'Sair');
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>