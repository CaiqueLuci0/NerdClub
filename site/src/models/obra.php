<?php 

function gerarSelectGeneroObra($dbPath){
    require($dbPath);

    if($connected){
        $query = "SELECT 
        generoObra
        FROM obra 
        GROUP BY generoObra;";

        $select = mysqli_query($conn, $query);

        if(mysqli_num_rows($select) > 0){
            echo "<option value=\"geral\">Geral</option>";
            while($linha = mysqli_fetch_assoc($select)){
                $genero = $linha['generoObra'];
                echo "<option value=\"$genero\">$genero</option>";
            }
        }
    }
}

?>