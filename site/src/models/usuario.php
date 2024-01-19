<?php
function cadastrar($dbpath, $username, $email, $senha)
{
    require($dbpath);
    if ($connected) {
        $query = "INSERT INTO usuario (nome, email, senha) VALUES 
        ('$username', '$email', '$senha');
        ";

        try {
            mysqli_query($conn, $query);
            header('Location: login.php');
        } catch (mysqli_sql_exception) {
            $mensagem = '<h2 style="color: red;">Erro no cadastro :(</h2>';
            echo "<script>
                mostrarMensagem(`$mensagem`); 
            </script>";
        };
    };
}
