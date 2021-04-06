<?php

    include 'db.php';

    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $contraseña = filter_var($_POST['contraseña'], FILTER_SANITIZE_STRING);

    try {
        $stmt = $conn->prepare('SELECT id FROM t_login WHERE Contrasena =? and Usuario=? ');
        $stmt->bind_param('ss', $contraseña,$usuario);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        if ($id) {
            
                $respuesta = array(
                    'mensaje' => 'error',
                    'tipo' => 'password'
                );
                header("location:home.php");

        }
         else {
            $respuesta = array(
               // 'mensaje' => 'error',
               // 'tipo' => 'cedula'
            );
         
            include("index.html");
          
          ?>
          <h1 class="bad">ERROR DE AUTENTICACION</h1>
          <?php
        }}
     
    catch (Exception $e) {
        $respuesta = array(
            'pass' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);
    ?>
