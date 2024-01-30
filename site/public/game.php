<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdCLub</title>
    <link rel="stylesheet" href="css/game.css">
    <script src="js/game.js"></script>
</head>

<body>
    <main>
        <div class="container">
            <div class="info" id="div_info">
                <div class="roundCounter">
                    <h1>ROUND 1</h1>
                </div>
                <div class="votacao">
                    <div class="personagem">
                        <div class="containerPerso">
                            <h1 style="background-color: #40e0d0;" class="nmPerso">SATORU GOJO</h1>
                            <img style="border: solid 10px #40e0d0; border-top: none" class="imgPerso" src="./assets/img/c_icons/gojo.jpg" alt="">
                            <img style="border: solid 5px #40e0d0;" class="logoObra" src="./assets/img/logos/Jujutsu_Kaisen_logo.png" alt="">
                        </div>
                    </div>
                    <div class="vs">
                        <img src="./assets/img/vs.png">
                    </div>
                    <div class="personagem">
                        <div class="containerPerso">
                        <h1 style="background-color: #b81414;" class="nmPerso">RYOMEN SUKUNA</h1>
                            <img style="border: solid 10px #b81414; border-top: none" class="imgPerso" src="./assets/img/c_icons/sukuna.jpg" alt="">
                            <img style="border: solid 5px #b81414;" class="logoObra" src="./assets/img/logos/Jujutsu_Kaisen_logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="frase">Selecione seu personagem favorito.</h1>
        </div>
    </main>
    <section class="telaFinal">
            <h1 class="letreiroRanking">
                SEU RANKING 
                <img style="height: 100%; width: auto;" src="./assets/img/podium.png" alt="ícone pódio">
            </h1>
            <div class="cardRanking">
                <div class="cardPersonagem">
                    <div class="posicao"><h1>#1</h1></div>
                </div>
            </div>
    </section>
</body>

</html>

<?php
if (!isset($_POST['submit'])) {
    header('Location: gameConfig.php');
} else {
    $gObra = $_POST['gObra'];
    $catPersonagem = $_POST['catPersonagem'];
    $gPersonagem = $_POST['gPersonagem'];
    $qtdRodadas = $_POST['qtdRodadas'];

    require('../src/models/personagem.php');
    $dbPath = '../src/database/config.php';
    criarVetorParaOJogo($dbPath, $gObra, $catPersonagem, $gPersonagem, $qtdRodadas);
}
?>