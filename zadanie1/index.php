<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (is_string($_POST['name']) && strlen($_POST['name'])>0) {
        echo 'Cześć, '. $_POST['name'] .'<br>';
    }
}

?>


<!doctype html>
<html lang="en">
    <form action="" method="post" role="form">
                    <label for="Username">Name</label>
                    <input type="text" name="name" id="name" placeholder="Username...">
                <button type="submit">Send!</button>
    </form>
</body>
</html>