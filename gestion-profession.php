<?php
include "lib/tools.php";

$data = getArrayFromFile('class-list.txt');

$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    $prof = filter_input(INPUT_POST, "profession", FILTER_SANITIZE_STRING);

    $prof = trim($prof);

    if(! empty($prof) && ! in_array($prof, $data)){
        file_put_contents("class-list.txt", "\n $prof", FILE_APPEND | LOCK_EX);

        header("location:gestion-profession.php");
        
    }
}


include "vues/vue-gestion-profession.php";