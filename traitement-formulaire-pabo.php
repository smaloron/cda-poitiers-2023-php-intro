<?php
$isPosted = isset($_POST["submit"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire âge</title>
</head>
<body>
    <?php if ($isPosted): ?>
        <?php  
        $age = $_POST["age"] ?? null;
        if(isset($age)): 
        ?>
            <h2>Vous avez <?=$age?></h2>
        <?php else: ?>
            <h2>Vous devez saisir un âge</h2>
        <?php endif ?>
    <?php else: ?>
        <h2>Vous devez remplir le formulaire</h2>
    <?php endif;?>
</body>
</html>