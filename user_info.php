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
    <a href="user_index.php"><button>VOLVER ATRÁS</button></a>';

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
    <!-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> -->
    <style>
        body {
            background-color: rgba(0,0,0,0.95);
            color: white;
        }
        .user{
            margin: 5%;
            height: fit-content;
            border: solid 4px orange;
            box-shadow: grey;
            border-radius:5%;
        }
        .name{
            font-size:40px;
        }
        .image {
            background-color: rgba(50, 50, 200, 0.5);
            border: solid 4px white;
            box-shadow: grey;
            width: 30%;
            margin:5%;
            border-radius:5%;
        }

        .image img{
            width: 50%;
        }

        button {
  color: #090909;
  padding: 0.7em 1.7em;
  font-size: 12px;
  border-radius: 0.5em;
  background: #e8e8e8;
  cursor: pointer;
  border: 1px solid #e8e8e8;
  transition: all 0.3s;
  box-shadow: 3px 3px 6px #c5c5c5, -3px -3px 6px #ffffff;
}

button:hover {
  box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
}

button:active {
  color: #666;
  box-shadow: inset 6px 6px 12px #c5c5c5, inset -6px -6px 12px #ffffff;
}

    </style>

</head>
<body>

    <center>
        <?php echo userMarkup($_GET['user']) ?>
    </center>
    
</body>
</html>