<?php
require_once dirname(__FILE__) . '/../config.php';

$v1 = $_REQUEST ['v1'];
$v2 = $_REQUEST ['v2'];
$amp = $_REQUEST ['amp'];

if (!(isset($v1) && isset($v2) && isset($amp))) {
    $info [] = 'Brakuje jednego lub kilku parametrów!';
}
if ($v1 == "") {
    $info [] = 'Nie podano napięcia zasilania!';
}
if ($v2 == "") {
    $info [] = 'Nie podano napięcia przewodzenia!';
}
if ($amp == "") {
    $info [] = 'Nie podano prądu przewodzenia!';
}


if (empty($info)) {
    if (!is_numeric($v1)) {
        $info [] = 'Błędny zapis napięcia zasilania!';
    }
    if (!is_numeric($v2)) {
        $info [] = 'Błędny zapis napięcia przewodzenia!';
    }
    if (!is_numeric($amp)) {
        $info [] = 'Błędny zapis prądu przewodzenia!';
    }
}


if(empty($info)){
    if($v1 <= $v2){
        $info [] = 'Wartość napięcia zasilania musi być większa od wartości napięcia przewodzenia!';
    }
}

if (empty($info)) {
    $v1 = (double)$v1;
    $v2 = (double)$v2;
    $amp = (double)$amp;
    
    $resistor = ($v1-$v2)/$amp;
}

include 'calc_view.php';
