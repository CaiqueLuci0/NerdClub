<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/perfil.css">
    <script src="js/bsfuncs.js"></script>
</head>

<body>
    <main>
        <?php 
        if(isset($_GET['personagem'])){
            include('html/header.html');
            $id = $_GET['personagem'];
            $dbPath = '../src/database/config.php';
            require('../src/models/personagem.php');
            buscarDadosPersonagem($id);
        }
        ;?>
    </main>
</body>

</html>

<script>
    removerBotoesHeader();
</script>