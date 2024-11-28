<?php
session_start();

include_once './config/config.php';
include_once './classes/usuario.php';
include_once './classes/noticia.php';
$msg = "";

try {
    $usuario = new Usuario($db);
    $usuarios = $usuario->ler();
} catch (Exception $e) {
    die("erro : " . $e->getmessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $noticia = $_POST['noticia'];
    $dataPublicacao = $_POST['data'];
    $imagem = $_FILES['imagem'];
    $destino = ""; 
    $nomeImagem = "";

    // Validação do título
    if (empty($titulo)) {
        die("O título da notícia não pode ser vazio.");
    }

    if ($imagem['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
        $tamanhoMaximo = 10 * 1024 * 1024; // 10 MB

        $tiposPermitidos = ['jpg', 'jpeg', 'png'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Apenas arquivos JPG ou PNG são permitidos.");
        }

        if ($imagem['size'] > $tamanhoMaximo) {
            die("O tamanho do arquivo não pode exceder 10 MB.");
        }

        $nomeImagem = uniqid() . "." . $extensao;
        $destino = "upload/" . $nomeImagem;

        if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
            die("Erro ao salvar a imagem.");
        }
    } else if ($imagem['error'] !== UPLOAD_ERR_NO_FILE) {
        die("Erro ao fazer upload da imagem.");
    }

    $noticiaObj = new noticia($db);

    // Registra a notícia no banco de dados
    $noticiaObj->registrar($titulo, $autor, $dataPublicacao, $noticia, $destino);

    $msg = "Sua notícia foi salva com sucesso!";
    echo '<br><a href="index.php">Voltar</a>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar noticia</title>
    <link rel="stylesheet" href="styles/cadastroN.css">
</head>
<body>
    <main>
        <header>
            <h1>Publicar</h1>
        </header>
        <br>
        <a href="gerenciador.php">Gerenciador de notícias</a>
        <br>
        <form method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>

            <select name="autor" required>
                <option value="" disabled>Autor</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?php echo $usuario['id']; ?>">
                        <?php echo htmlspecialchars($usuario["nome"]); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="data">Data:</label>
            <input type="date" name="data" required>

            <label for="noticia">Informações da notícia:</label>
            <input type="text" name="noticia" required>

            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem" accept="jpg,png" required>
            <span id="file-name">Nenhum arquivo escolhido</span>

            <input id="button" type="submit" value="Adicionar">
            <?php if ($msg) echo "<h1>" . $msg . "</h1>"; ?>
        </form>
    </main>
</body>
</html>
