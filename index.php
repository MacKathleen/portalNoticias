<?php

include_once './config/config.php';
include_once './classes/noticia.php';
include_once './classes/usuario.php';

$noticia = new noticia($db);

$dados = $noticia->ler();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>portal de noticias</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
<header>
<h1>Noticias</h1>

</header>
    <br>

    <main>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php
            $usuario = new Usuario($db);
            $infoUsu = $usuario->lerPorId($row['autor']);
            echo "<div id='noticia'>";
            echo "<div id='foto'><img src='".$row['fotos']."' alt='imagem da noticia'></div>";
            echo "<div id='info'><h1>" . $row['titulo'] . "</h1>";
            echo "<p>" . $row['noticias'] . "</p><br><br>";
            echo "por: " . $infoUsu['nome'] . "<br><br>";
            echo $row['data'];


            echo "</div></div>"; ?>
        <?php endwhile; ?>

    </main>

    <a href="login.php">Logar</a>
    <a href="gerenciador.php">Voltar</a>
</body>

</html>
