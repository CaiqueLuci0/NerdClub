<?php
$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados['requisicao'])){
    $requisicao = $dados['requisicao'];

    if($requisicao == 'login'){
        login($dados['email'], $dados['senha']);
    }
}
    

function login($email, $senha){
    require("../database/config.php");
    if($connected){
        $query = "SELECT idUsuario, nome FROM usuario WHERE email = '$email' AND senha = '$senha';";

        try{
            $select = mysqli_query($conn,$query);

            //DESCOMENTE A LINHA ABAIXO E TODO O "TRY-CATCH" PARA VER O QUE DEU ERRADO NA QUERY!
            // echo json_encode($select);

            if(mysqli_num_rows($select) < 1){
                $mensagem = 'Senha ou email incorreto.';
                echo json_encode(array(
                    "mensagem" => $mensagem
                ));
            } else{
                $linha = mysqli_fetch_assoc($select);
                setcookie('userName', $linha['nome'], time() + (86400*2), "/");
                setcookie('id', $linha['idUsuario'], time() + (86400*2), "/");
                echo json_encode($linha);
            }
        }catch(mysqli_sql_exception){
            $mensagem = 'Ocorreu um erro. Tente novamente mais tarde.';
            
            echo json_encode(array(
                "mensagem" => $mensagem
            ));
        }
    }
}

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
