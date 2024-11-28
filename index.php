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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Notícias</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>

    <header>
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="cadastroNoticia.php">Nova Notícia</a></li>
            <li><a href="registrar.php">Novo Usuario</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <h1>Notícias</h1>
    </header>
    
    <main>
        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php
        
            $usuario = new Usuario($db);
            $infoUsu = $usuario->lerPorId($row['autor']);
            ?>

           
            <div id="noticia">
                <div id="foto">
                    <img src="<?php echo $row['fotos']; ?>" alt="Imagem da notícia">
                </div>
                <div id="info">
                    <h1><?php echo $row['titulo']; ?></h1>
                    <p><?php echo $row['noticias']; ?></p>
                    <br><br>
                    <p><strong>Por:</strong> <?php echo $infoUsu['nome']; ?></p>
                    <p><strong>Data:</strong> <?php echo $row['data']; ?></p>
                </div>
            </div>

        <?php endwhile; ?>
    </main>


    <div class="links">
        <a href="login.php">Logar</a>
        <a href="gerenciador.php">Voltar</a>
    </div>

</body>

</html>
