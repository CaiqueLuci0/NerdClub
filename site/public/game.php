<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdCLub</title>
</head>
<body>
    
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
