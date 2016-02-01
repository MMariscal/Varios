<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
?>
<form action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>" method="post" >¿Cuál es tu nombre?<input type="text" name="first_name" />
<input type="submit" value="Di hola" /></form>
<?php } else {
        echo 'Hola, '.$_POST['first_name'].'!';
    }
?>
