<?php

function userMarkup($user) {
    $output='';

    $output .='<div class="user">
        <div class="image"><img src="" alt=""></div>
        <div class="name"><p>Nombre: '.base64_decode(unserialize($user[0])).'</p></div>
        <div class="email"><p>Email: '.base64_decode(unserialize($user[1])).'</p></div>
        <div class="rol"><p>Rol '.base64_decode(unserialize($user[2])).'</p></div>
        <div class="date"><p>Fecha de creación : '.base64_decode(unserialize($user[3])).'</p></div>
    </div>';

    return $output;
}

function dump($var){
    $des = base64_decode(unserialize($var));
    echo '<pre>'.print_r($des,1).'</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VER USER</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

</head>
<body>

    <?php echo userMarkup($_GET['user']) ?>
    <?php dump($_GET['user']) ?>;
    
</body>
</html>