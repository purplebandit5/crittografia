<?php
$titles = ["Home", "Info Server", "Form get", "Form post", "Gestione xml", "Validatore xml", "Servizio Meteo"];
$files = ["index", "server", "form_get", "form_post", "gestione_xml", "validatore_xml", "servizio_meteo"];
foreach ($titles as $index => $title) {
    echo "<a href=\"" . $files[$index] . ".php\" class=\" menu text-center\"><li>$title</li></a>";
}


?>