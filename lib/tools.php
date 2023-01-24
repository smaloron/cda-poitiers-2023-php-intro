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