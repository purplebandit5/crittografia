<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Crittografia</title>
</head>
<?php

if (!empty($_POST['crypt'])) {
    $testo = $_POST['input'];
    $testo = str_replace(" ", "", $testo); //rimozione degli spazi
    $testo = strtolower($testo); //trasformazione dei caratteri della stringa in minuscoli
    $key = $_POST['key'];
    $key = str_replace(" ", "", $key); //rimozione degli spazi
    $key = strtolower($key); //trasformazione dei caratteri della chiave in minuscolo
    
    $res = "";
    if (strlen($testo) === strlen($key)) {
        foreach (str_split($testo) as $index => $char) {
            $res = $res . chr(((ord($char) - 97) + (ord($key[$index]) - 97)) % 26 + 97);
        }
    } else {
            echo "Chiave non valida!";
    }   
}

if (!empty($_POST['decrypt'])) {
    $testo = $_POST['input'];
    $testo = str_replace(" ", "", $testo); //rimozione degli spazi
    $testo = strtolower($testo); //trasformazione dei caratteri della stringa in minuscoli
    $key = $_POST['key'];
    $key = str_replace(" ", "", $key); //rimozione degli spazi
    $key = strtolower($key); //trasformazione dei caratteri della chiave in minuscolo
    $res = "";
    if (strlen($testo) === strlen($key)) {
        foreach (str_split($testo) as $index => $char) {
            $cryptchar = (ord($char) - 97);
            $keychar = (ord($key[$index]) - 97);
            if($cryptchar-$keychar<0){
                $res = $res . chr((($cryptchar-$keychar) + 26) + 97);
            }else{
                $res = $res . chr(( $cryptchar- $keychar) % 26 + 97);
            }
            
        }
    } else {
        echo "Chiave non valida!";
    }
}
?>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-20 align-items-center primary-custom">
            <!--Header della pagina-->
            <div class="col-md-12 text-center">
                <h1>Crittografia</h1>
            </div>
        </div>
        <div class="row overflow-auto pt-1 pb-1 h-80">
            <div class="col-md-7 border-end">
                <div class="dropdown">
                    <button class="btn dropdown-toggle purple" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Scegli il metodo
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="staccionata.php">Cifrario a staccionata</a></li>
                        <li><a class="dropdown-item" href="cesare.php">Cifrario di Cesare</a></li>
                        <li><a class="dropdown-item" href="otp.php">Cifrario OTP</a></li>
                        <li><a class="dropdown-item" href="des.php">Cifrario DES</a></li>
                    </ul>
                </div>
                <br>
                <h4>Testo input</h4>
                <form action="otp.php" method="post">
                    <textarea class="form-control" name="input" placeholder="Plain text" id="TextAreaDecrypted" rows="4"
                        required></textarea>
                    <br>
                    <h4>Key</h4>
                    <input class="form-control" type="text" name="key" placeholder="Enter Key" required><br>
                    <input type="submit" value="Crypt" name="crypt" class="btn btn-outline purple width">
                    <input type="submit" value="Decrypt" name="decrypt" class="btn btn-outline purple width">
                    <input type="reset" value="Reset" class="btn btn-outline purple width">
                </form>
                <br>
                <h4>Testo Output</h4>
                <textarea readonly class="form-control" placeholder="Visualizzazione del testo finale"
                    id="TextAreaCrypted" rows="4"><?php
                if (isset($res)) {
                    echo $res;
                } ?></textarea>
            </div>
            <div class="col-md-5">
            <h4 class="text-center">Descrizione</h4>
                <p class="descrizione">
                Il One-Time Pad è un sistema crittografico basato sul cifrario di Vigenère, 
                al quale aggiunge il requisito che la chiave di cifratura sia lunga quanto il testo e non riutilizzabile.
                <br>In questa tecnica, un testo in chiaro è abbinato a una chiave segreta casuale (nota anche come one-time pad). 
                Quindi, ogni bit o carattere del testo in chiaro viene crittografato combinandolo con il corrispondente bit o 
                carattere del pad utilizzando l'addizione modulare.
                </p>
            </div>
        </div>
    </div>
</body>

</html>