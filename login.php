<?php
session_start();

//esse comando e um cokie mais seguro (isso oque o professor falou)
include_once './config/config.php';
include_once './classes/usuario.php';


if (isset($_SESSION['usuario_id'])) {
    header('Location: gerenciador.php');
    exit();
}

//instanciando o obj da class usuario
$usuario = new Usuario($db);

//formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'])) {
        // Processar login
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($dados_usuario = $usuario->login($email, $senha)) {
            //a variavel global session ela cria um acesso (basicamente se nao tiver esse aceso ele nao pode entrar em portal.php 
            //ex:nao da para ir de cadastro para portal porque nao tem essa credencial)
            $_SESSION['usuario_id'] = $dados_usuario['id'];

            //vai pra portal.php
            header('Location: gerenciador.php');

            exit();
        } else {

            $mensagem_erro = "Credenciais inválidas!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> LOGIN </title>
    <link rel="stylesheet" href="styles/login.css">
</head>


<body>

    <main>

        <div class="box">
            <h1>LOGIN</h1>
            <form method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="senha">Senha</label>
                <input type="password" name="senha" required>

                <input id="button" type="submit" name="login" value="Login">
            </form>
            <p style="margin-top: 10px;">Não tem uma conta? <a href="./registrar.php">Registre-se aqui</a></p>
            <div class="mensagem">
                <?php if (isset($mensagem_erro)) echo '<p>' . $mensagem_erro . '</p>'; ?>
            </div>

    </main>

</body>


</html>