<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>"
*/
$isPosted = isset($_POST["submit"]);

$contact = $_POST["contact"] ?? [];
$address = $_POST["adresse"] ?? [];

$isValid = $isPosted && (
    ! empty($_POST["contact"]["nom"]) &&
    ! empty($_POST["contact"]["civilite"]) &&
    ! empty($_POST["adresse"]["voie"]) &&
    ! empty($_POST["adresse"]["code_postal"]) &&
    ! empty($_POST["adresse"]["ville"])
);



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire contact</title>
</head>

<body>

    <?php if(!$isPosted || !$isValid): ?>
    <form method="post">
        <fieldset>
            <legend>Contact</legend> <label>Civilité</label><br>
            <input type="radio" id="civF" name="contact[civilite]" value="madame"
                <?=$contact["civilite"]=="madame"?"checked":"" ?>>
            <label for="civF">Madame</label>
            <br>
            <input type="radio" id="civM" name="contact[civilite]" value="monsieur"
                <?=$contact["civilite"]=="monsieur"?"checked":"" ?>>
            <label for="civM">Monsieur</label><br> <label for="nom">Nom</label>
            <input type="text" id="nom" name="contact[nom]" value="<?= $contact["nom"] ?? "" ?>"><br>
        </fieldset>
        <fieldset>
            <legend>Adresse</legend> <label for="voie">Adresse</label>
            <input type="text" id="voie" name="adresse[voie]" value="<?= $address["voie"] ?? "" ?>"><br> <label
                for="code_postal">Code postal</label> <input type="text" id="code_postal"
                name="adresse[code_postal]"><br> <label for="ville">Ville</label> <input type="text" id="ville"
                name="adresse[ville]"><br>
        </fieldset>
        <button type="submit" name="submit">
            Valider
        </button>
    </form>
    <?php else: ?>
    <h3>Bravo</h3>
    <pre>
            <?php var_dump($_POST) ?>
        </pre>
    <?php endif ?>
</body>

</html>