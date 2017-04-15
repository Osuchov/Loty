<?php

if(isset($_COOKIE['visits'])){
    $hits = $_COOKIE['visits'];
    $hits++;
    echo 'Witaj, odwiedziłeś nas już '. $hits .' razy.<br><br>';
}
else {
    $hits = 1;
    echo 'Witaj pierwszy raz na stronie!<br><br>';
}
setcookie('visits', $hits, time() + strtotime('1 year'));
?>