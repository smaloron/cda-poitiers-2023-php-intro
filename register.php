<?php
include "lib/authenticate.php";

// Initialisation du tableau des erreurs
$errors = [];

// Récupération de la saisie
$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted){
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $plainPassword = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Création d'un utilisateur
    $user = [
        "userName" => $userName,
        "login" => $login,
        "plainPassword" => $plainPassword
    ];

    // Validation de l'utilisateur
    $errors = validateUser($user);

    // Si je n'ai pas d'erreur
    if(count($errors) === 0){
        // création du mot de pass hashé
        $user["password"] = password_hash($user["plainPassword"], PASSWORD_DEFAULT);
        // Suppression du mot de passe en clair
        unset($user["plainPassword"]);
        // Enregistrement de l'utilisateur
        if(register($user)){

        } else {
            $errors[] = "Impossible d'enregistrer vos données veuillez contacter l'administrateur";
        }
    }

}

include "vues/vue-register.php";