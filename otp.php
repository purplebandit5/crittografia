<?php
$testo = "La Passione Che Ci Piace";
$testo = str_replace(" ", "", $testo); //rimozione degli spazi
$testo = strtolower($testo); //trasformazione dei caratteri della stringa in minuscoli
$key = "Al nessiopa hec ic acepi";
$key = str_replace(" ", "", $key); //rimozione degli spazi
$key = strtolower($key); //trasformazione dei caratteri della chiave in minuscolo
$res = "";


if (strlen($testo) === strlen($key)) {
    foreach (str_split($testo) as $index => $char) {
        $res = $res . chr((ord($char) - 97 + ord($key[$index]) - 97) % 26 + 97);
    }
    echo "Criptato: ".$res;

} else {
    echo "Chiave non valida!";
}

$testo = "";
if (strlen($testo) === strlen($key)) {
    foreach (str_split($res) as $index => $char) {
        $testo = $testo . chr((ord($char) - 97 - ord($key[$index]) - 97) % 26 + 97);
    }
    echo "Decriptato: ".$testo;

} else {
    echo "Chiave non valida!";
}



?>