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
                    <button class="btn dropdown-toggle purple" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Scegli il metodo
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="staccionata.php">Cifrario a staccionata</a></li>
                        <li><a class="dropdown-item" href="#">Cifrario di Cesare</a></li>
                        <li><a class="dropdown-item" href="#">Cifrario OTP</a></li>
                        <li><a class="dropdown-item" href="#">Cifrario DES</a></li>
                    </ul>
                </div>
                <br>
                <h4>Testo input</h4>
                <form action="index.html" method="post">
                    <textarea class="form-control" placeholder="Plain text" id="TextAreaDecrypted" rows="4"></textarea> <br>
                    <h4>Key</h4>
                    <input class="form-control" type="text" name="Key" placeholder="Enter Key" required><br>
                    <input type="submit" value="Crypt" class="btn btn-outline purple width">
                    <input type="submit" value="Decrypt" class="btn btn-outline purple width">
                    <input type="reset" value="Reset" class="btn btn-outline purple width">
                </form>
                <br>
                <h4>Testo Output</h4>
                <textarea readonly class="form-control" placeholder="Visualizzazione del testo finale" id="TextAreaCrypted" rows="4"><?php echo $stringa;?></textarea>
            </div>
            <div class="col-md-5">
                <h4 class="text-center">Descrizione</h4>
                <p class="color"> Il cifrario a staccionata è un tipo di cifrario a trasposizione  che deve il suo nome al modo in cui il testo in chiaro viene cifrato: esso viene trascritto lettera per lettera su righe ideali, diagonalmente verso il basso e poi risalendo una volta arrivati alla riga più bassa e viceversa arrivati alla riga più in alto, disegnando ipotetiche traverse di un'immaginaria staccionata. <br> I cifrari a staccionata non sono molto robusti: il numero di parole chiavi utilizzabili è abbastanza piccolo tanto che un crittanalista le può provare tutte praticamente a mano. </p>
            </div>
        </div>
    </div>
</body>
</html>