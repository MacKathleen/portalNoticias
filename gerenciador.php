<?php
session_start();
include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';

$noticia = new noticia($db);
$dados = $noticia->ler();

if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $noticia->deletar($id);
    header('Location: gerenciador.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>

    <header>

        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="gerenciador.php">Noticias</a></li>
            <li><a href="portal.php">Gerenciador Usuario</a></li>
            <li><a href="cadastroNoticia.php">Nova Notícia</a></li>
            <li><a href="registrar.php">Novo Usuario</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </header>

        
    
    <main>
        <h1 style="text-align: center; width: 100%">Gerenciador de notícia</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>titulo</th>
                <th>data</th>
                <th>autor</th>
                <th>noticia</th>
                <th>foto</th>
                <th>ações</th>
            </tr>
            <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo ($row['data']); ?></td>
                    <td><?php echo $row['autor']; ?></td>
                    <td><?php echo $row['noticias']; ?></td>
                    <td>
                        <img width="100px" height="100px" src="<?php echo $row['fotos']; ?>" alt="">
                        
                    </td>
                    <td>
                        <a href="deletarNo  ticia.php?id=<?php echo $row['id']; ?>"><img id="imgalt" src="upload/botao-excluir.png" alt=""></a>
                        <a href="editarNoticia.php?id=<?php echo $row['id']; ?>"><img id="imgalt" src="upload/editar.png" alt=""></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>

</html>