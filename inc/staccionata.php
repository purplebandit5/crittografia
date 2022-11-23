<?php

$stringa = "ercolifrociostupidogayottusolass";
$stringa = str_replace(" ", "", $stringa);
$key = 5;
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
foreach ($result as $row){
    echo json_encode($row) . "<br>";
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


//decrypt
$stringa = str_split($stringa);
$len = count($stringa);
echo $len;

$decryptKey = ($len / (2 * ($key - 1))) * 2;    //calcolo della chiave per il decript
$cont = 0;
$res = [];

for ($i = 0; $i < $key; $i++) {
    $res[$i] = [];
    for ($j = 0; $j < $decryptKey; $j++) {
        if ($i == 0) {
            if ($j % 2 == 0) {
                $res[$i][$j] = $stringa[$cont];
                $cont++;
            } else {
                $res[$i][$j] = null;
            }

        } else if ($i == ($key - 1)) {
            if ($j % 2 == 1) {
                $res[$i][$j] = $stringa[$cont];
                $cont++;
            } else {
                $res[$i][$j] = null;
            }

        } else {
            $res[$i][$j] = $stringa[$cont];
            $cont++;
        }
    }
}
echo "<br>";
foreach ($res as $row){
    echo json_encode($row) . "<br>";
}
$stringa = "";
for ($i = 0; $i < $decryptKey; $i++) { //scorrimento colonne
    if ($i % 2 == 0) {
        for ($j = 0; $j < $key; $j++) { //scorrimento delle righe
            if ($res[$j][$i] !== null) {
                $stringa .= $res[$j][$i];
            }
        }
    } else {
        for ($j = $key - 1; $j >= 0; $j--) { //scorrimento delle righe

            if ($res[$j][$i] !== null) {
                $stringa .= $res[$j][$i];
            }
        }
    }

}



echo $stringa;
?>