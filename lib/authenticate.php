<?php

// Chemin vers la liste des utilisateurs 
define("USER_PATH", "data/users.json");

/**
 * Cette fonction valide un utilisateur
 * @author: Sébastien Maloron
 * @param: $user un tableau associatif représentant un utilisateur
 * @return un tableau ordinal des erreurs
 */
function validateUser($user){
    $errors = [];

    if(empty($user["userName"])){
        $errors[] = "Le nom d'utilisateur est obligatoire";
    } else if (strlen($user["userName"]) < 4){
        $errors[] = "Le nom d'utilisateur doit comporter plus de trois caractères";
    }

    if(empty($user["login"])){
        $errors[] = "L'identifiant est obligatoire";
    } else if (strlen($user["login"]) < 4){
        $errors[] = "L'identifiant doit comporter plus de trois caractères";
    }

    if(empty($user["plainPassword"])){
        $errors[] = "Le mot de passe est requis";
    } else if (strlen($user["plainPassword"]) < 4){
        $errors[] = "Le mot de passe doit comporter plus de trois caractères";
    }

    return $errors;
}

/**
 * lit la source de donnée et retourne un tableau des utilisateurs
 * @author Sébastien Maloron
 * @return un tableau ordinal de users (tableau associatifs)
 */
function getUsers(): array{
    $users = [];
    if(file_exists(USER_PATH)){
        $content = file_get_contents(USER_PATH);
        $users = json_decode($content, true) ?? [];
    }
    return $users;
}

/**
 * @author Sébastien Maloron
 * @param $user un tableau associatif représentant un utilisateur
 * @return booléen indiquant que l'inscription est un succès ou un échec
 */
function register(array $user): bool{
    // Obtention de la liste des utilisateurs
    $userList = getUsers();
    // Ajout d'un nouvel utilisateur
    $userList[] = $user;
    // Sérialisation de $userList
    $content = json_encode($userList);
    // Sauvegarde des données
    $res = file_put_contents(USER_PATH, $content);

    return $res !== false;
}