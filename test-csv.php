<?php
include "lib/tools.php";

// Lecture du fichier csv
$content = file("data/employes.csv");



$data = array_map(
    function($item){
        return str_getcsv($item,";");
    },
    $content
);

$fieldNames = str_getcsv($content[0], ";");

$data2 = array_map(
    function($item) use ($fieldNames){
        return array_combine($fieldNames, str_getcsv($item,";")) ;
    },
    $content
);

array_shift($data2);



var_dump(
    parseCsvFile("data/employes.csv")
);

var_dump(
    parseCsvFile("data/perso.csv", ",")
);