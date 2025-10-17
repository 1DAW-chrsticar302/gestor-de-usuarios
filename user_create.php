<?php

/***** Inicialización del entorno ******/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./lib/funciones.php');


/***** Lógica de negocio ******/



//*****Lógica de presentación****MARKUPS*****
$loginMarkup = getLoginMarkup();

function getLoginMarkup() {
    return $output = '<form action="" method="get">
    <div class="login-container">
      <h1>LOGIN</h1>
      
      <div class="input-group">
        <label for="user">USUARIO</label>
        <input type="user" id="user" placeholder="Usuario">
      </div>
  
      <div class="input-group">
          <label for="email">EMAIL</label>
          <input type="email" id="email" placeholder="your@email.com">
      </div>
      
      <div class="input-group">
          <label for="password">ROL</label>
          <input type="password" id="password" placeholder="ROL">
      </div>
      
      <button type="submit">SIGN IN</button>
  </form>';
}

?>