<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/sakura.css/css/sakura-dark.css">
</head>

<body>

    <?php include "fragments/show-errors.php"; ?>

    <p><?=$message?></p>

    <form method="post">
        <label>Identifiant</label>
        <input type="text" name="login">
        <label>Mot de passe</label>
        <input type="password" name="password">
        <div>
            <button name="submit" type="submit">
                Valider
            </button>
        </div>
    </form>

</body>

</html>