<?php

  $conn = new mysqli('localhost', 'root','123', 'test', '3306');
  if ($conn->connect_error) {
        echo "No sea podido conectar la base de datos" .$conn->connect_error;
  }

 ?>