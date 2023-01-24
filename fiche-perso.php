<?php

$traitsList = [
    "Alerte", "Sympathique", "Malicieux", "trop balaize", "Plein de thunes"
];

$isPosted = filter_has_var(INPUT_POST, 'submit');
$data = [];

if($isPosted){
    $data["nom"] = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $data["description"] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    $data["force"] = filter_input(INPUT_POST, 'force', FILTER_VALIDATE_INT);
    $data["endurance"] = filter_input(INPUT_POST, 'endurance', FILTER_VALIDATE_INT);
    $data["agilite"] = filter_input(INPUT_POST, 'agilite', FILTER_VALIDATE_INT);

    $data["intelligence"] = filter_input(INPUT_POST, 'intelligence', FILTER_VALIDATE_INT);
    $data["sagesse"] = filter_input(INPUT_POST, 'sagesse', FILTER_VALIDATE_INT);
    $data["charisme"] = filter_input(INPUT_POST, 'charisme', FILTER_VALIDATE_INT);

    $data["qualites"] = filter_input(INPUT_POST, 'qualites', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];

    $isValid =  strlen($data["nom"]) > 3
                && ! empty($data["force"])
                && $data["force"] > 0
                && ! empty($data["endurance"])
                && $data["endurance"] > 0
                && ! empty($data["agilite"])
                && $data["agilite"] > 0
                && ! empty($data["intelligence"])
                && $data["intelligence"] > 0
                && ! empty($data["sagesse"])
                && $data["sagesse"] > 0
                && ! empty($data["charisme"])
                && $data["charisme"] > 0;
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        padding: 15px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin: 10px auto;
    }

    .form-grid-2-third {
        display: grid;
        grid-template-columns: 1fr 3fr;
        margin: 10px auto;
    }

    label {
        margin-right: 10px;
        text-align: right;
    }

    .qualities label {
        text-align: left;
    }

    .qualities input {
        text-align: right;
    }

    .description-input {
        width: 100%;
        height: 50%;
    }

    .grid-full {
        display: grid;
        grid-template-columns: 1fr;
    }
    </style>
</head>

<body>
    <form method="post">
        <div class="form-grid-2-third">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=isset($data["nom"])? $data["nom"]: "" ?>">
        </div>

        <div class="form-grid">
            <div>
                <div class="form-grid">
                    <label>Force</label>
                    <input type="number" min="1" max="10" name="force"
                        value="<?= isset($data["force"])? $data["force"]: "" ?>">
                </div>
                <div class="form-grid">
                    <label>Endurance</label>
                    <input type="number" min="1" max="10" name="endurance"
                        value="<?= isset($data["endurance"])? $data["endurance"]: "" ?>">
                </div>
                <div class="form-grid">
                    <label>Agilité</label>
                    <input type="number" min="1" max="10" name="agilite"
                        value="<?= isset($data["agilite"])? $data["agilite"]: "" ?>">
                </div>
            </div>
            <div>
                <div class="form-grid">
                    <label>Intelligence</label>
                    <input type="number" min="1" max="10" name="intelligence"
                        value="<?= isset($data["intelligence"])? $data["intelligence"]: "" ?>">
                </div>
                <div class="form-grid">
                    <label>Sagesse</label>
                    <input type="number" min="1" max="10" name="sagesse"
                        value="<?= isset($data["sagesse"])? $data["sagesse"]: "" ?>">
                </div>
                <div class="form-grid">
                    <label>Charisme</label>
                    <input type="number" min="1" max="10" name="charisme"
                        value="<?= isset($data["charisme"])? $data["charisme"]: "" ?>">
                </div>
            </div>
        </div>

        <div class="form-grid">
            <div class="qualities">
                <h4>Qualités</h4>

                <?php foreach($traitsList as $quality): ?>
                <div class="form-grid">
                    <input type="checkbox" name="qualites[]" value="<?=$quality?>"
                        <?= isset($data["qualites"]) && in_array($quality, $data["qualites"])? "checked": ""  ?>>
                    <label><?=$quality?></label>
                </div>
                <?php endforeach; ?>


            </div>

            <div>
                <h4>Description</h4>
                <textarea class="description-input" name="description"></textarea>
            </div>
        </div>

        <div class="grid-full">
            <button name="submit">Valider</button>
        </div>
    </form>

</body>

</html>