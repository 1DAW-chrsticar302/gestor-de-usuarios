<?php 

$cookie = 'login';

if(isset($_COOKIE[$cookie])) {
    $visitas = (int) $_COOKIE[$cookie] +1;
}else{
    $visitas = 1;
}

setcookie($cookie, (string)$visitas, time() + (60 * 60 * 24 * 1));

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title>
</head>
<body>
    
    <?php echo "Numero de visitas de la página: " . $visitas; ?>

</body>
</html>