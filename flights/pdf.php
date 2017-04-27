<?php
require_once './vendor/autoload.php';
include './includes/airports.php';

use NumberToWords\NumberToWords;

ob_start();

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
            
            $date_from = new DateTime();
            $date_from->setTimezone($timezone_from);
            $date_from->modify($date);
            $date1 = $date_from->format('d.m.Y H:i:s');
        
            $date_to = new DateTime();
            $date_to -> setTimezone($timezone_to);
            $date_to -> modify($date.'+'.$lenght.' hours');
            $date2 = $date_to->format('d.m.Y H:i:s');
            
            $person = generatePassenger();
            
            // create the number to words "manager" class
            $numberToWords = new NumberToWords();
            // build a new number transformer using the RFC 3066 language identifier
            $currencyTransformer = $numberToWords->getCurrencyTransformer('pl');
            $price_word = $currencyTransformer->toWords($price*100, 'PLN');
    }
}

function generatePassenger() {
    $faker = Faker\Factory:: create();
    $passenger['name']= $faker->firstName;
    $passenger['surname']= $faker->lastName;
    return $passenger;
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
    <title>PDF</title>
</head>
<style>
    table, th, td {
        color: black;
        text-align: center;
        border: 1px solid black;
        }
</style>
<body>
    <table>
        <tr>
            <th colspan="3">Imię pasażera</th>
            <th colspan="3">Nazwisko pasażera</th>
        </tr>  
        <?php echo '
        <tr>
            <td colspan="3">'.$person['name'].'</td><td colspan="3">'.$person['surname'].'</td>
        </tr>';
        ?>   
        <tr>
            <th colspan="3">Lotnisko wylotu</th>
            <th colspan="3">Lotnisko przylotu</th>
        </tr>
        <?php echo '
        <tr>
            <td>'.$from.'</td><td>'.$date1.'</td><td>'.$code_from.'</td>
            <td>'.$to.'</td><td>'.$date2.'</td><td>'.$code_to.'</td>
        </tr>';
        ?>
        <tr>
            <th>Czas lotu</th>
            <th colspan="2">Cena lotu</th>
            <th colspan="3">Cena lotu słownie</th>
        </tr>
        <?php echo '
        <tr>
            <td>'.$lenght.' h</td>
            <td colspan="2">'.$price.' PLN</td>
            <td colspan="3">'.$price_word.'</td>
        </tr>';
        ?>   
    </table>
</body>
</html>

<?php
$mpdf = new mPDF();
$output = file_get_contents('pdf.php');
$output = ob_get_flush();
$mpdf->WriteHTML($output);
$mpdf->Output('flight.pdf', 'D');
?>