<?php
var_dump($_POST);

$isPosted = isset($_POST["submit"]);
$message = "";

if($isPosted){
    $age = $_POST["age"] ?? null;
    if(empty($age)){
        $message = "Vous devez saisir un âge";
    } else {
        $message = "Vous avez $age ans";
    }
} else {
    $message = "Vous devez remplir le formulaire";
}
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
    <h2><?= $message ?></h2>
</body>
</html>