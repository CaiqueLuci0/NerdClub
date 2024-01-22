<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurando Jogo</title>
    <link rel="stylesheet" href="css/gameConfig.css">
</head>

<body>
    <main>
        <form class="form" action="game.php" method="post">
            <div class="container">
                <h1>Agora só falta configurar sua partida...</h1>
                <div class="fields">
                    <div class="field">
                        <h3>Gênero da obra</h3>
                        <select name="gObra">
                            <?php
                            require('../src/models/obra.php');
                            $dbPath = "../src/database/config.php";
                            gerarSelectGeneroObra($dbPath);
                            ?>
                        </select>
                    </div>
                    <div class="field">
                        <h3>Categoria do personagem</h3>
                        <select name="catPersonagem">
                            <?php
                            require('../src/models/personagem.php');
                            gerarSelectCatPersonagem($dbPath);
                            ?>
                        </select>
                    </div>
                    <div class="field">
                        <h3>Gênero do personagem</h3>
                        <select name="gPersonagem">
                            <option value="geral">Geral</option>
                            <option value="m">Masculino</option>
                            <option value="f">Feminino</option>
                        </select>
                    </div>
                    <div class="field">
                        <h3>Quantidade máxima de rodadas</h3>
                        <select name="qtdRodadas">
                            <option value="max">MAX</option>
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                            <option value="32">32</option>
                            <option value="64">64</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="COMEÇAR !">

                    <!-- preciso enviar o formulário para um outro arquivo php e consultar o banco de dados de acordo com o que foi preenchido. e depois armazenar em um array com varios json -->
                </div>

            </div>
        </form>


    </main>
</body>

</html>