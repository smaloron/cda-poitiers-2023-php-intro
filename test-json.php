<?php
include "lib/tools.php";

define("FILE_PATH", "data/persons.json");

// Lecture d'un fichier
$content = file_get_contents(FILE_PATH);

// Transformation de la chaîne de caractère en un tableau d'objets
$data = json_decode($content, true);

include "vues/vue-test-json.php";