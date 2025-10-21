<?php

function userMarkup($user_encoded) {
    $user = unserialize(base64_decode($user_encoded));
    $output='';

    $output .='<div class="user">
        <div class="image"><img src="src/img/user.png"></div>
        <div class="name"><p>'.$user[0].'</p></div>
        <div class="email"><p>'.$user[1].'</p></div>
        <div class="rol"><p>Rol '.$user[2].'</p></div>
        <div class="date"><p>Fecha de creación : '.$user[3].'</p></div>
    </div>
    <a href="user_index.php">VOLVER ATRÁS</a>';

    return $output;
}

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VER USER</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <style>
        .user{
            margin: 5%;
            height: 800px;
            border: solid 4px grey;
            box-shadow: grey;
            border-radius:5%;
        }
        .name{
            font-size:40px;
        }
        .image {
            background-color:cyan;
            border: solid 4px grey;
            box-shadow: grey;
            width: 50%;
            margin:10%;
            border-radius:5%;
        }
    </style>

</head>
<body>

    <center>
        <?php echo userMarkup($_GET['user']) ?>
    </center>
    
</body>
</html>