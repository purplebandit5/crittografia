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
//ercolifrociostupidogayottusola
if (isset($_POST["crypt"])) {
    if (!empty($_POST["input"]) && !empty($_POST["key"])) { //controllo della presenza della chiave e del testo da cifrare
        $stringa = $_POST["input"];
        $stringa = trim(preg_replace('/\s+/', ' ', $stringa));  //rimozione delle newline
        $stringa = str_replace(" ", "", $stringa);
        $len = strlen($stringa);
        $key = $_POST["key"];
        $n = 2*($key-1);
        $resto = $len%$n;
        if($resto !== 0){
            for($i=$len; $i%$n!==0; $i++){
                
            }
            $strlen = $i;
            for($i=0;$i<$strlen-$len;$i++){
                $stringa .= "s";    //lettera random usata come padding
            }
            $len = $strlen;
        }
        echo $stringa;
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
    }
} else if (isset($_POST["decrypt"])) {
    if (!empty($_POST["input"]) && !empty($_POST["key"])) {
        $stringa = $_POST["input"];
        $stringa = trim(preg_replace('/\s+/', ' ', $stringa));  //rimozione delle newline
        $stringa = str_replace(" ", "", $stringa);
        $stringa = str_split($stringa);
        $len = count($stringa);
        $key = $_POST["key"];;

        $decryptKey = ($len / (2 * ($key - 1))) * 2; //calcolo della chiave per il decript
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
                <form action="staccionata.php" method="post">
                    <textarea class="form-control" name="input" placeholder="Plain text" id="TextAreaDecrypted"
                        rows="4"></textarea>
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
                    if(isset($stringa)){
                        echo $stringa; 
                    }
                    ?></textarea>
            </div>
            <div class="col-md-5">
                <h4 class="text-center">Descrizione</h4>
                <p class="descrizione">
                    Il cifrario a staccionata è un tipo di cifrario a trasposizione che deve il suo
                    nome al modo in cui il testo in chiaro viene cifrato: esso viene trascritto lettera per lettera
                    su righe ideali, diagonalmente verso il basso e poi risalendo una volta arrivati alla riga più
                    bassa e viceversa arrivati alla riga più in alto, disegnando ipotetiche traverse di
                    un'immaginaria staccionata. <br> I cifrari a staccionata non sono molto robusti: il numero di
                    parole chiavi utilizzabili è abbastanza piccolo tanto che un crittanalista le può provare tutte
                    praticamente a mano.
                </p>
            </div>
        </div>
    </div>
</body>

</html>