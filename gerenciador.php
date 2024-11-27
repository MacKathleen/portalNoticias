<?php
session_start();
include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

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
    <link rel="stylesheet" href="styles/gerenciador.css">
</head>
<body>
    <header>
<h1>Adicionar um nova notícia</h1>
    </header>
<div id="links">
    
    <a href="cadastroNoticia.php">Nova Noticía</a>
    <a href="portal.php"> Usuario </a>
    <a href="logout.php">Sair</a>

    </div><main>
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
                <td><?php echo ($row['data']);?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['noticias']; ?></td>
                <td><?php echo $row['fotos']; ?></td>
                <td>
                    <a href="deletarNoticia.php?id=<?php echo $row['id']; ?>"><img id="imgalt"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcx1AupvWZqkA2_GijfJIDCsc1xCNXVNOkDQ&s" alt=""></a>
                    <a href="editarNoticia.php?id=<?php echo $row['id']; ?>"><img id="imgex" src="https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_640.png" alt=""></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </main>
</body>
</html>

