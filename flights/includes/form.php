<!doctype html>
<html lang="en">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker" ).datepicker();
} );
</script>
<body>
    <form action="./pdf.php" method="post">
        <legend>Formularz lotu</legend>
        <br><label>Lotnisko wylotu</label>
        <select name="from">
            <?php
            for ($i = 0; $i < count($airports); $i++) {
                echo '<option value="'.$i.'">'.$airports[$i]['name'].'</option>';
            }
            ?>
        </select>
        <br><label>Lotnisko przylotu</label>
        <select name="to">        
            <?php
            for ($i = 0; $i < count($airports); $i++) {
                echo '<option value="'.$i.'">'.$airports[$i]['name'].'</option>';
            }
            ?>
        </select>
        <br><label>Czas startu</label>
        <input type="text" name="date" id="datepicker" placeholder="mm/dd/yyyy">
        <input type="time" name="time" placeholder="hh:mm">
        <br><label>Długość lotu [h]</label>
        <input type="number" name="lenght" min="0" step="1">
        <br><label>Cena lotu [PLN]</label>
        <input type="number" name="price" min="0" step="0.01"><br>
        <button type="submit">Wyślij</button>        
    </form>
</body>
</html>