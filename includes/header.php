<header>
    <nav style="background-color: firebrick !important;" class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">SISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if ($_SESSION["funcao_usuario"] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="usuarios.php">
                            Usuários
                        </a>
                    </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="tipos.php">
                            Tipo de Produto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="produtos.php">
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="clientes.php">
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="vendas.php">
                            Vendas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="usuario_editar.php">
                            Usuário
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="funcao.php">
                            Funções
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logoff.php">
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>