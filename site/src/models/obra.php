<?php 

function gerarSelectGeneroObra(){
    require __DIR__ . "/../database/config.php";

    if($connected){
        $query = "SELECT 
        generoObra
        FROM obra 
        GROUP BY generoObra;";

        $select = $conn->query($query);

        if($select->rowCount() > 0){
            echo "<option value=\"geral\">Geral</option>";
            while($linha = $select->fetch()){
                $genero = $linha['generoObra'];
                echo "<option value=\"$genero\">$genero</option>";
            }
        }
    }
}