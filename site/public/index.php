<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdClub</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/requisicoes.js"></script>
</head>

<body>
    <section> <?php
                include("html\header.html");
                ;?>
        <div class="banner">
            <div class="line-banner">
                <div class="square-banner" style="display: flex; flex-direction: column; align-items: center;">
                    <img style="width: 70%; height:auto;" src="./assets/img/logo.png" alt="logo nerdClub">
                    <h1>Me diz seu personagem favorito?</h1>
                    <button onclick="window.location.href='http:\/\/localhost/NerdClub/site/public/gameConfig.php'">JOGAR</button>
                </div>
                <div style="background-image:url('./assets/img/banner_home/1.png');" class="square-banner"></div>
            </div>
            <div style="height: 42%;" class="line-banner">
                <div style="width: 40%; height: 100%; background-image:url('./assets/img/banner_home/2.png');" class="square-banner"></div>
                <div style="width: 60%; height: 100%; background-image:url('./assets/img/banner_home/3.jpg');" class="square-banner"></div>
            </div>
        </div>
    </section>
    <section>
        <div style="width: 100%; height:90%; display: flex; flex-direction: column; align-items: center; justify-content: space-between">
        <!-- estou reciclando o estilo do título da tabela de ranking -->
            <div class="titulo"><h1 style="color: #fff; background-color:#8C52FF; border: none;">COMO FUNCIONA?</h1></div>
            <div class="como">
                <div style="background-image: url('./assets/img/banner_home/middle_index.gif'); width: 43%; height: calc(95% - 10px); border: solid 5px #8C52FF;" class="containerComo">
                    <!-- <img style="width: auto; height: 100%" src="" alt="gif satoru gojo"> -->
                </div>
                <div class="containerComo"></div>
            </div>
        </div>
    </section>

    <?php
    include("leaderboard.php");
    ;?>

</body>

</html>

<form action=""></form>