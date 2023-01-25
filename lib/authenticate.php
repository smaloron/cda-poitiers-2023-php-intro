<?php
session_start();

$publicRoutes = [
    "/login.php",
    "/register.php"
];

// Vérification de l'authetification
if(! isset($_SESSION["userName"]) && 
! in_array($_SERVER["SCRIPT_NAME"], $publicRoutes)){
    $_SESSION["message"] = "Vous devez être authentifié";
    header("location:login.php");
}

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

/**
 * Trouve un utilisateur en fonction de son login
 * @author Sébastien Maloron
 * @param $login l'identifiant
 * @return array tableau représentant un utilisateur
 */
function findUserByLogin(string $login): array{
    $userList = getUsers();
    $users =  array_filter($userList, function($item) use ($login){
        return $item["login"] === $login;
    });
    return $users[0] ?? [];
}

/**
 * Authentification d'un utilisateur
 * @author Sébastien Maloron
 * @param $login l'identifiant
 * @param $password le mot de passe 
 * @return booléen indiquant si l'utilisateur est authentifié ou non
 */
function authenticate(string $login, string $password): bool {
    // chercher un utilisateur possédant le login passé en argument
    $user = findUserByLogin($login);
    $userFound = count($user)>0;
    // vérifier que le mot de passe de cet utilisateur correspond à celui passé en argument
    if($userFound){
        var_dump($user);
        // vérification du mot de passe en clair comparé au mot de passe hashé contenu dans l'utilisateur
        $authenticated =  password_verify($password, $user["password"]);
        if($authenticated){
            $_SESSION["userName"] = $user["userName"];
            return $authenticated;
        }
    }

    return false;
}