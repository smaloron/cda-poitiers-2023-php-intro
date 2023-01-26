<?php
$content = scandir(".");
$path = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fichiers et dossiers</title>
    <link rel="stylesheet" href="node_modules/sakura.css/css/sakura-dark.css">
    <style>
    .folder-list {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        list-style: none;
    }

    .folder {
        color: yellow;
        background: #554455;
    }

    .file,
    a.file:visited {
        color: yellow;
    }



    .folder-list a {
        display: block;
    }
    </style>
</head>

<body>
    <h1>Liste des fichiers et dossiers de : <?= empty($path)? "racine": $path ?></h1>

    <ul class="folder-list">
        <?php foreach($content as $item): ?>
        <?php if(! in_array($item, [".", ".."])): ?>
        <li>
            <a href="<?="$path/".$item?>" class="<?= is_file($item)? 'file':'folder' ?>">
                <?=$item?>
            </a>
        </li>
        <?php endif ?>

        <?php endforeach ?>
    </ul>

</body>

</html>