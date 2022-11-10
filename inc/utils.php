<?php
function getImg($wCode)
{
    switch ($wCode) {

        case 0:
            $str = "sun-fill.svg";
            break;
        case 1:
        case 2:
            $str = "cloud-sun.svg";
            break;
        case 3:
            $str = "overcast.svg";
            break;
        case 45:
            $str = "cloud-fog.svg";
            break;
        case 48:
            $str = "depositing-rime-fog.svg";
            break;
        case 51:
        case 53:
            $str = "cloud-drizzle.svg";
            break;
        case 55:
        case 61:
        case 63:
            $str = "cloud-rain.svg";
        case 56:
        case 57:
        case 66:
        case 67:
            $str = "drizzle-snow.svg";
            break;
        case 65:
        case 80:
        case 81:
        case 82:
            $str = "cloud-rain-heavy.svg";
            break;
        case 71:
        case 73:
        case 75:
        case 77:
        case 85:
        case 86:
            $str = "clous-snow.svg";
            break;
        case 95:
            $str = "cloud-lightning.svg";
            break;
        case 96:
        case 99:
            $str = "cloud-lightning-rain.svg";
            break;
    }

    return $str;
}

?>