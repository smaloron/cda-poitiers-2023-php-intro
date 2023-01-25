<?php
include "lib/authenticate.php";

// Récupération de la saisie
$isPosted = filter_has_var(INPUT_POST, "submit");
$errors = [];

if ($isPosted){
    $login = filter_input(INPUT_POST, "login", FILTER_DEFAULT);
    $pass = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

    if (authenticate($login, $pass)){
        header("location:gestion-profession.php");
    } else {
        $errors[] = "Vos infos de connexion sont incorrects";
    }
}

// Gestion du message flash
$message = $_SESSION["message"] ?? "";
unset($_SESSION["message"]);


include "vues/vue-login.php";