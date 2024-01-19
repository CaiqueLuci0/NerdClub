<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section> <?php
                include("html\header.html")
                ?>
        <div class="banner">
            <div class="banner-p">
                <div class="banner-a"><img src="assets/img/logo.png ">
                    <h1>Me diz seu personagem favorito?</h1> <button><a href="">Jogar</a></button>
                </div>
                <div></div>

            </div>
            <div class="banner-p">
                <div></div>
                <div></div>

            </div>
        </div>
    </section>

    <?php
    include("leaderboard.php")
    ?>

</body>

</html>