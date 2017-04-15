<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) &&
        isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6'])) {
        if ((is_numeric($_POST['1']) && is_numeric($_POST['2']) && is_numeric($_POST['3']) &&
            is_numeric($_POST['4']) && is_numeric($_POST['5']) && is_numeric($_POST['6']))) {
            $wybrane=[];
            for ($i = 1; $i < 7; $i++) {
                $wybrane[]=$_POST[$i];
            }
            if (count(array_unique($wybrane)) < 6){
                echo 'Wybrane przez Ciebie liczby się powtarzają.';
            }
            else {
                $wylosowane = losuj();
                $trafienie = 0;
                echo 'Wybrałeś: <br>';
                echo wyswietl($wybrane);
                for ($i = 0; $i < count($wybrane); $i++) {
                    if (in_array($wybrane[$i], $wylosowane)) {
                        echo $wybrane[$i] . ' została wylosowana!<br>';
                        $trafienie++;
                    }
                }
                echo 'Wylosowano: <br>';
                echo wyswietl($wylosowane);                
                echo 'Gratulacje! Trafiłeś liczb: '.$trafienie.'<br>';
                echo '<br><br>';
            }
    }
    }
}

function losuj() {
    $wylosowane = [];
    while (count($wylosowane)<6) {
        $liczba = mt_rand(1, 49);
        if (!in_array($liczba, $wylosowane)) {
            $wylosowane[]= $liczba;
        }
    }
    return $wylosowane;
}

function wyswietl($array) {
    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i].' ';
    }
    echo '<br>';
}

?>

<!doctype html>
<html lang="en">
<body>
<hr>
<form action="" method="post" role="form">
                    <legend>Kupon lotto</legend>
                    <label>Wybierz 6 liczb (bez powtórzeń!) z przedziału 1-49:</label><br>
                    <input type="number" name="1" min="1" max="49" step="1"><br>
                    <input type="number" name="2" min="1" max="49" step="1"><br>
                    <input type="number" name="3" min="1" max="49" step="1"><br>
                    <input type="number" name="4" min="1" max="49" step="1"><br>
                    <input type="number" name="5" min="1" max="49" step="1"><br>
                    <input type="number" name="6" min="1" max="49" step="1"><br>
                    <button type="submit" class="btn btn-primary">Prześlij</button>
</form><br>
</body>
</html>