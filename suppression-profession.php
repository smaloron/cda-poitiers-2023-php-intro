<?php
// Inclusion des utilitaires qui permmetent
// de récupérer les données d'un fichier texte
include "lib/tools.php";

// On enregistre le nom du fichier texte dans une constante
// afin de ne pas avoir à répéter la saisie de ce nom
// et donc éviter d'éventuelles fautes de frappes
define("FILE_NAME", "class-list.txt");

// Récupération du paramètre passé dans l'URL
// La constante FILTER_SANITIZE_STRING est dépréciée mais
// on préfère continuer à l'utiliser car il n'y a pas d'alternatives 
// qui offre la même fonctionnalité
$prof = filter_input(INPUT_GET, "prof", FILTER_SANITIZE_STRING);

// Récupération des données du fichier texte sous la forme d'un tableau ordinal de chaîne de caractère
// Pour ce faire nous utilisons la fonction getArrayFromFile récupéré depuis l'inclusion de tools.php
$data = getArrayFromFile(FILE_NAME);

// On filtre les données pour ne conserver que les profession qui ne correspondent pas à la profession passée en argument. Ceci aura donc pour effet de supprimer cette dernière profession
// La fonction array_filter admet en argument un tableau ordinal à filter et une fonction de callback. Cette fonction sera exécutée pour chaque élément du tableau. Seuls les élements pour lesquels la fonction retourne true seront conservés
$data = array_filter($data, function($item) use($prof){
    return $item != $prof;
});

// Conversion du tableau en chaîne de caractères
$content = implode("\n", $data);

// Enregistrement du contenu dans le fichier
file_put_contents(FILE_NAME, $content);

// Redirection vers la liste des profession
header("location:gestion-profession.php");