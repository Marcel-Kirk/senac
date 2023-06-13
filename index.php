<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body class="fundoPaginaLogin">
    <div id="fundo">
        <form id="formLogin" action="valida.php" method="post">
            <?php
                if (isset($_GET['erro']) && $_GET['erro'] == 1){
                    echo "<div class='msgErro'>";
                    echo "Login/Senha Inválido!";
                    echo "</div>";
                }
                if (isset($_GET['erro']) && $_GET['erro'] == 2){
                    echo "<div class='msgErro'>";
                    echo "Acesso Negado";
                    echo "</div>";
                }
            ?>
            <label>Login:</label>
            <input type="text" name="login" id="login" required>
            <label>Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <div class="direita mt-10">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>