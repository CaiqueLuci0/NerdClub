<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="js/bsfuncs.js"></script>
    <script src="js/login.js"></script>
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
                        <h2>Login</h2>
                    </div>
                    
                    <div class="form">
                        <span class="field">
                            E-mail:<input type="email" id="input_email" placeholder="usuario@exemplo.com" value="">
                        </span>
                        <span class="field">
                            Senha:<input type="password" id="input_senha" placeholder="********" value="">
                        </span>
                        <a href="cadastro.php" style="color: #8C52FF; text-decoration: none;">Não tenho uma conta ainda</a>
                        <button class="submit" onclick="login()">Enviar</button>
</div>
                </div>
            </div>
        </div>
        <div id="div_mssg"></div>
    </section>
</body>

</html>

<script>
    const botoes = document.getElementsByClassName('botoes');
    botoes[0].innerHTML = '';
</script>

<!-- 
<div class="banner">
    <div class="banner-p">
        <div></div>
        <div></div>
    </div>
    <div class="banner-p">
        <div style="width: 30%;"></div>
        <div style="width: 70%"></div>
    </div>
</div> -->