<?php
function validateCharacteristic(array $data, string $key): bool{
    return (
        ! empty($data[$key])
        && $data[$key] >0
    );
}

function getCombo(array $data, string $name, string $val = ""): string{
    $html = "<select name=\"$name\">";

    foreach($data as $item){
        $select = $item === $val? "selected": "";
        $html .= "<option value=\"$item\" $select >$item</option>";
    }

    $html .= "</select>";

    return $html;
}

function getArrayFromFile($fileName){
    if(! file_exists($fileName)){
        return [];
    }

    $content = file_get_contents($fileName);
    $data = explode("\n", $content);

    return $data;
}

function varDump($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

/**
 * Cette fonction va lire un fichier csv et retourner un tableau ordinal de tableaux associatifs où les clefs sont déterminées par la première lige du fichier csv
 * @author Sébastien Maloron
 * @param string le chemin du fichier csv
 * @param string le caractère séparateur de colonne
 * @param string le caractère séparateur de donnée 
 */
function parseCsvFile(
    string $fileName, 
    string $separator = ";", 
    string $enclosure= '"'): array 
{
    // convertir le fichier csv en un tableau ordinal
    // où chaque élément représentera une ligne du fichier
    // équivalent à fair un explode avec le retour de ligne comme séparateur
    $lines = file($fileName);
    // Récupération des noms des colonnes sous la forme d'un tableau ordinal
    $fieldNames = str_getcsv($lines[0], $separator, $enclosure);

    // Transformation du tableau ordinal des données
    // chaque chaîne de caractère sera trasnformée en un tableau associatif
    // avec en clef les noms des colonnes et en valeur les données de chaque ligne
    $data = array_map(
        function($item) use ($fieldNames, $separator, $enclosure){
            // array_combine transforme deux tableaux ordinaux en un tableau assciatif 
            return array_combine($fieldNames, str_getcsv($item,$separator, $enclosure)) ;
        },
        $lines
    );

    // Suppression de la première ligne qui ne sert plus à rien
    // puisqu'elle contient les noms des colonnes
    // qui ont été intégrées dans les tableaux associatifs
    array_shift($data);

    return $data;
}