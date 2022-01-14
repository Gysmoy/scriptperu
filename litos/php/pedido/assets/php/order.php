<?php

include 'connect.php';

$sql = "SELECT * FROM `carta` ORDER BY `carta`.`id` ASC";
$result = $db_connect -> query($sql);

// Variables iniciales
$suma = 0.00;
$numero = '999413711';
$mensaje = '';

if ($result -> num_rows > 0) {
    while ( $rows = $result -> fetch_assoc() ) {
        $id = $rows['id'];
        $cant = $_POST['select' . $id];
        if ($cant > 0) {
            $name = $rows['description'];
            $price = $rows['price'] * $cant;
            $suma = $suma + $price;
            $mensaje .= $cant . '%20' . $name . '%20-%20S%2f' . number_format($price, 2) . '%0d%0a';
        }
    }
    $mensaje .= '%0d%0aTotal+a+pagar+S%2f' . number_format($suma, 2);
    header('location: https://api.whatsapp.com/send?phone=051' . $numero . '&text=' . $mensaje);
}

?>