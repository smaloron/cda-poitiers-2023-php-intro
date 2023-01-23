<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date du jour</title>
</head>
<body>

<h1>
    Bonjour 
    <?php echo $_GET["nom"]; ?>
    nous sommes le 
    <?php echo date("d/m/Y"); ?>
</h1>

<ul>
<?php
 for ($i = 1; $i <= 15; $i++):
?>
    <li>item <?php echo $i;?></li>
<?php endfor; ?>
 </ul>  
</body>
</html>