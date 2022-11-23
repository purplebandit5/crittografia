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
    $result = "";
    $stringa = $_POST['input'];
    $key = $_POST['key']%26;
    if(is_numeric($key)){
        foreach (str_split($stringa) as $char) {
            if (($char >= 'a') && ($char <= 'z')) {
                $result .= chr((((ord($char) - 97) + $key) % 26) + 97);
            }
        }
    }
}
//decrypt
if (!empty($_POST['decrypt'])) {
    $result = "";
    $stringa = $_POST['input'];
    $key = $_POST['key']%26;
    if(is_numeric($key)){
        foreach (str_split($stringa) as $char) {
            if (($char >= 'a') && ($char <= 'z')) {
                if ((ord($char) - 97) - $key < 0) {
                    $result .= chr((((ord($char) - 97) + 26) - $key) + 97);
                } else {
                    $result .= chr(((ord($char) - 97) - $key) + 97);
                }
            }
        }
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
                <form action="cesare.php" method="post">
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
                if (isset($result)) {
                    echo $result;
                } ?></textarea>
            </div>
            <div class="col-md-5">
            <h4 class="text-center">Descrizione</h4>
                <p class="descrizione">
                il cifrario di Cesare è uno dei più antichi algoritmi crittografici di cui si abbia traccia storica. 
                È un cifrario a sostituzione monoalfabetica, in cui ogni lettera del testo in chiaro è sostituita, nel testo cifrato, 
                dalla lettera che si trova un certo numero di posizioni dopo nell'alfabeto. <br> Questi tipi di cifrari sono detti anche cifrari a 
                sostituzione o cifrari a scorrimento a causa del loro modo di operare: la sostituzione avviene lettera per lettera, scorrendo 
                il testo dall'inizio alla fine.
                </p>
        </div>
    </div>
</body>

</html>