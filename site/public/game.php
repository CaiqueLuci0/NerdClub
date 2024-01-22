<?php
if (isset($_POST['submit'])) {
    $gObra = $_POST['gObra'];
    $catPersonagem = $_POST['catPersonagem'];
    $gPersonagem = $_POST['gPersonagem'];
    $qtdRodadas = $_POST['qtdRodadas'];

    echo "$gObra , $catPersonagem, $gPersonagem, $qtdRodadas";
}
