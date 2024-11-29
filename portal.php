<?php
session_start();
include_once './config/config.php';
include_once './classes/usuario.php';


if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
$usuario = new Usuario($db);

if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];

$dados = $usuario->ler();

function saudacao()
{
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Portal</title>
    <link rel="stylesheet" href="styles/portal.css">
</head>

    <body>
       
        <header>
            <h1>Gerenciamento de Usuarios</h1>
        </header>

        <h1 id="msg"> <?php echo saudacao() . ", <b>" . $nome_usuario . "</b>"; ?>!</h1>

        <br>

        <main>
            <!-- Tabela com dados do usuário -->
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Fone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo ($row['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                        <td><?php echo $row['fone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="deletar.php?id=<?php echo $row['id']; ?>"><img id="imgalt" src="upload/botao-excluir.png" alt=""></a>
                            <a href="editar.php?id=<?php echo $row['id']; ?>"><img id="imgalt" src="upload/editar.png" alt=""></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </main>

    </body>

</html>