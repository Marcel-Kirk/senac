<?php
    include 'includes/valida.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <?php
            if (isset($_GET['erro']) && $_GET['erro'] == 'permissao'){
        ?>
            <div class="alert alert-danger mt-3" role="alert">
                Você não tem permissão para acessar este recurso.
            </div>
        <?php
            }
        ?>
        <section style="margin: 50px 0px 150px 0px; padding-left:10px;">
            Bem vindo, <?php echo $_SESSION["logado"]; ?>.
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>