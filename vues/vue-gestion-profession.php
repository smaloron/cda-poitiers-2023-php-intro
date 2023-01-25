<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des professions</title>
    <link rel="stylesheet" href="/node_modules/sakura.css/css/sakura-pink.css">
</head>

<body>
    <h1>Gestion des professions</h1>

    <div>
        <form method="post">
            <input type="text" name="profession" placeholder="Votre profession">
            <button type="submit" name="submit">
                Valider
            </button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Profession</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item): ?>
            <tr>
                <td><?=$item?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>



</html>