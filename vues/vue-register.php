<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/node_modules/sakura.css/css/sakura-dark.css">

</head>

<body>

    <?php if(count($errors) > 0): ?>
    <ul>
        <?php foreach($errors as $message): ?>
        <li><?= $message ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <form method="post">
        <h3>Inscription</h3>
        <label>Nom</label>
        <input type="text" name="userName">
        <label>Identifiant</label>
        <input type="text" name="login">
        <label>Mot de passe</label>
        <input type="password" name="pass">
        <div>
            <button name="submit" type="submit">
                Valider</button>
        </div>

    </form>



</body>

</html>