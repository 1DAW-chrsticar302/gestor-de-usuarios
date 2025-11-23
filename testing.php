<?php


include_once('./libraries/functions.php');

boot();
$visitas = 0;

if (!isset($_COOKIE['visitas'])) {    
    setcookie('visitas',$visitas);
}else{
    $visitas = $_COOKIE['visitas'];
    setcookie('visitas',$visitas+1);
}
echo 'Hay '. $_COOKIE['visitas'] . ' visitas en esta página';

?>  