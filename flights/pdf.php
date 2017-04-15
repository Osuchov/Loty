<?php
include './includes/airports.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['date']) && 
        isset($_POST['time']) && isset($_POST['lenght']) && isset($_POST['price']) &&
        $_POST['price'] > 0 && $_POST['from'] !== $_POST['to']) {
            $from = $airports[$_POST['from']]['name'];
            $to = $airports[$_POST['to']]['name'];
            $date = $_POST['date'].' '.$_POST['time'];
            $lenght = $_POST['lenght'];
            $price = $_POST['price'];
            $timezone_from = new DateTimeZone ($airports[$_POST['from']]['timezone']);
            $timezone_to = new DateTimeZone ($airports[$_POST['to']]['timezone']);
            $code_from = $airports[$_POST['from']]['code'];
            $code_to = $airports[$_POST['to']]['code'];
            
            $date_from = new DateTime ($date);
            $date_from->setTimezone($timezone_from);
            $date_from->format('DD.MM.RRRR GG:MM:SS');
            $date_to = $date_from->modify('+'.$lenght.' hours');
            $date_to -> setTimezone($timezone_to); 
    }
    var_dump($date_to);
}
?>

<!doctype html>
<link rel="stylesheet" href="includes/style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF flight creator</title>
</head>
<body>
    <table>
        <tr>
            <th colspan="3">Lotnisko wylotu</th>
            <th colspan="3">Lotnisko przylotu</th>
            <th>Czas lotu</th>
            <th>Cena lotu</th>            
        </tr>
        <?php echo '
        <tr>
            <td>'.$from.'</td><td>'.$date_from->date.'</td><td>'.$code_from.'</td>
            <td>'.$to.'</td><td>'.$date_to->date.'</td><td>'.$code_to.'</td>
            <td>'.$lenght.'</td>
            <td>'.$price.'</td>
        </tr>';
        ?>
        
    </table>
</body>
</html>