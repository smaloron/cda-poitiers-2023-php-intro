<?php

$isPosted = filter_has_var(INPUT_POST, 'submit');
$hasUpload = isset($_FILES["photo"]);

$allowedFileTypes = [
    "image/png" => ".png",
    "image/jpeg" => ".jpg"
];

if($isPosted && $hasUpload){
    $upload = $_FILES["photo"];

    $type = $upload["type"];

var_dump($upload);

    if(isset($allowedFileTypes[$type])){
        $ext = $allowedFileTypes[$type];
    } else {
        die("Type de ficher interdit");
    }

    $fileName = uniqid("photo-", true). ".$ext";
    $filePath = getcwd(). "/upload/". $fileName;
    if(move_uploaded_file($upload["tmp_name"], $filePath)){
        echo "Upload OK";
    } else {
        echo "Upload KO";
    }
    
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>

<body>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo" placeholder="Votre photo">

        <button name="submit">Valider</button>
    </form>

</body>

</html>