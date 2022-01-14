<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDOR ELIMINANDO</title>
    <style>
body {
    background-color: #DFE6EC;
}
</style>
</head>
<body >
    <?php
    include "../conectar.php";
    $codi=$_GET['id'];
    $sql_d="DELETE FROM `proveedor` WHERE codigo='$codi'";
    $delete = $db_connect -> query($sql_d);
    ?>    
    Eliminando ... <img src='../img/delete.gif' width='25'>
    <meta http-equiv='refresh' content='3.5,URl=proveedor.php'>
</body>
</html>