<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <section>
        <?php
        include("html/header.html");
        ?>

        <div class="main">
            <div class="card">
                <div class="container">
                    <div class="infoForm">
                        <img class="logo" src="assets/img/logo.png" alt="logo nerdclub">
                        <h2>Cadastro</h2>
                    </div>
                    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <span class="field">UserName:<input type="text" name="username" placeholder="Mangafan"></span>
                        <span class="field">E-mail:<input type="email" name="username" placeholder="usuario@exemplo.com"></span>
                        <span class="field">Senha:<input type="password" name="username" placeholder="********" ></span>
                        <input class="submit" type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
    const botoes = document.getElementsByClassName('botoes');
    botoes[0].innerHTML = '';
</script>