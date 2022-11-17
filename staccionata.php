<?php

$stringa = "la passione che ci lega";
$stringa = str_replace(" ", "", $stringa);
$key = 4;
$result = [];
for ($i = 0; $i < $key; $i++) {
    $result[$i] = [];
}
$cont = 0;
$col = 0;
$len = strlen($stringa);

while ($cont < $len) {

    for ($j = 0; $j < $key; $j++) {
        if ($cont < $len) {
            if ($col % 2 === 0) {
                if ($j !== $key - 1) {
                    $result[$j][$col] = $stringa[$cont];
                    $cont++;
                } else {
                    $result[$j][$col] = null;
                }
            } else {
                if (($key - 1 - $j) !== 0) {
                    $result[$key - 1 - $j][$col] = $stringa[$cont];
                    $cont++;
                } else {
                    $result[$key - 1 - $j][$col] = null;
                }
            }
        }
    }

    $col++;
}
$stringa = "";
foreach ($result as $row) {
    foreach ($row as $char) {
        if ($char !== null) {
            $stringa = $stringa . $char;
        }

    }

}

echo $stringa;
?>