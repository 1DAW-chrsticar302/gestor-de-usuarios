<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
//Lee CSV
$usuarios = getDataFromCSV('./data/users.csv', 'id');
dump($usuarios);
//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/index_users.tpl.php');
?>