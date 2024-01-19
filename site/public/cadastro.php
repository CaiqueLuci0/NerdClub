<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="js/form.js"></script>
</head>

<body>
    <section>
        <?php
        include("html/header.html");
        ?>

        <div class="main">
            <div class="card">
                <div class="container">
                    <div class="infoForm">
                        <img class="logo" src="assets/img/logo.png" alt="logo nerdclub">
                        <h2>Cadastro</h2>
                    </div>
                    <?php
                    //o if verifica se o botão de enviar já foi clicado
                    if (isset($_POST['enviado'])) {
                        //a função trim() remove o primeiro e o último espaço
                        $username = trim($_POST['username'], " ");
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <span class="field">
                            UserName:<input type="text" name="username" placeholder="Mangafan" value="<?php if (isset($username) && !empty($username)) {
                                                                                                            echo $username;
                                                                                                        } ?>">
                        </span>
                        <span class="field">
                            E-mail:<input type="email" name="email" placeholder="usuario@exemplo.com" value="<?php if (isset($email) && !empty($email)) {
                                                                                                                    echo $email;
                                                                                                                } ?>">
                        </span>
                        <span class="field">
                            Senha:<input type="password" name="senha" placeholder="********" value="<?php if (isset($senha) && !empty($senha)) {
                                                                                                        echo $senha;
                                                                                                    } ?>">
                        </span>
                        <a href="login.php" style="color: #8C52FF; text-decoration: none;">já tenho uma conta</a>
                        <input class="submit" name="enviado" type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
        <div id="div_mssg"></div>
    </section>
</body>

</html>

<?php
if (isset($_POST['enviado'])) {
    if (empty($username) || empty($senha) || empty($email)) {
        $mensagem = '<h2 style="color: red;">Os campos não podem estar vazios!</h2>';
        echo "<script>
                mostrarMensagem(`$mensagem`);
            </script>";
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $mensagem = '<h2 style="color: red;">E-mail inválido.</h2>';
        echo "<script>
                mostrarMensagem(`$mensagem`);
            </script>";
    } else if (strlen($senha) < 8) {
        $mensagem = '<h2 style="color: red;">A senha deve ter mais que 8 caracteres.</h2>';
        echo "<script>
                mostrarMensagem(`$mensagem`);
            </script>";
    } else if (filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS) != $senha) {
        $mensagem = '<h2 style="color: red;">A senha não pode conter caracteres especiais.</h2>';
        echo "<script>
                mostrarMensagem(`$mensagem`);
            </script>";
    } else if (str_replace(" ", "", $username) != $username) {
        $mensagem = '<h2 style="color: red";> O nome não pode ter espaços.</h2>';
        echo "<script>
                mostrarMensagem(`$mensagem`);
            </script>";
    } else {
        require('../src/models/usuario.php');
        $dbpath = '../src/database/config.php';
        cadastrar($dbpath, strtoupper($username), strtoupper($email), $senha);
    }
}
?>

<script>
    removerBotoesHeader();
</script>